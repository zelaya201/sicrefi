<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Cliente;
use App\Models\Credito;
use App\Models\CreditoBien;
use App\Models\CreditoReferencia;
use App\Models\Cuota;
use App\Models\Negocio;
use App\Models\Referencia;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response(view('content.creditos.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
      $clientes = Cliente::query()
        ->select('dui_cliente','primer_nom_cliente', 'segundo_nom_cliente', 'tercer_nom_cliente', 'primer_ape_cliente', 'segundo_ape_cliente', 'id_cliente', 'estado_cliente')
        ->where(['estado_cliente' => 'Activo'])
        ->orderBy('primer_nom_cliente', 'ASC')
        ->get();

      $clientes = $clientes->map(function ($cliente) {
        $cliente->nombre_completo = $cliente->primer_nom_cliente . ' ' . $cliente->segundo_nom_cliente .' ' . $cliente->tercer_nom_cliente . ' ' . $cliente->primer_ape_cliente . ' ' . $cliente->segundo_ape_cliente;
        $bienes = Bien::query()
          ->select('id_bien', 'nom_bien')
          ->where(['id_cliente' => $cliente->id_cliente])
          ->where('estado_bien', 'Activo')
          ->get();

        $credito = Credito::query()
          ->select('id_credito', 'monto_neto_credito', 'tasa_interes_credito', 'n_cuotas_credito', 'frecuencia_credito', 'tipo_credito', 'monto_credito', 'estado_credito', 'id_negocio')
          ->where(['id_cliente' => $cliente->id_cliente, 'estado_credito' => 'Vigente'])
          ->first();

        $cliente->credito = null;

        if($credito){
          $deudaCredito = Cuota::query()
            ->where(['id_credito' => $credito->id_credito, 'estado_cuota' => 'Pendiente'])
            ->sum('total_cuota');

          $cuotasMora = Cuota::query()
            ->where(['id_credito' => $credito->id_credito, 'estado_cuota' => 'Pendiente'])
            ->where('fecha_pago_cuota', '<', date('Y-m-d'))
            ->sum('total_cuota');

          if ($cuotasMora > 0) {
            $deudaCredito += ($cuotasMora * 0.05);
            $credito->estado_credito = 'Mora';
          }

          $cuotasPagadas = Cuota::query()
            ->where(['id_credito' => $credito->id_credito, 'estado_cuota' => 'Pagada'])
            ->sum('total_cuota');

          $porcentajePagado = ($cuotasPagadas * 100) / $credito->monto_credito;

          $credito->renovacion = false;

          if($porcentajePagado >= 75){ // Si el cliente ha pagado al menos el 75% del crédito
            $credito->renovacion = true;

            if($credito->estado_credito == 'Mora'){
              $credito->renovacion = false;
            }
          }

          $credito->porcentaje_pagado = $porcentajePagado;

          $credito->deuda_credito = $deudaCredito;

          $bienesCredito = CreditoBien::query()
            ->select('id_bien')
            ->where(['id_credito' => $credito->id_credito])
            ->get();

          $credito->bienes = $bienesCredito;

          $refCredito = CreditoReferencia::query()
            ->select('id_ref')
            ->where(['id_credito' => $credito->id_credito])
            ->get();

          $credito->referencias = $refCredito;

          $cliente->credito = $credito;
        }

        $referencias = Referencia::query()
          ->select('primer_nom_ref', 'segundo_nom_ref', 'primer_ape_ref', 'segundo_ape_ref', 'id_ref')
          ->where(['id_cliente' => $cliente->id_cliente])
          ->where('estado_ref', 'Activo')
          ->get();

        $negocios = Negocio::query()
          ->select('nom_negocio', 'id_negocio')
          ->where(['id_cliente' => $cliente->id_cliente])
          ->where('estado_negocio', 'Activo')
          ->get();

        $cliente->referencias = $referencias;
        $cliente->negocios = $negocios;
        $cliente->bienes = $bienes;

        return $cliente;
      });

      return response(view('content.creditos.create', compact('clientes')));
    }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return Response
   * @throws \Exception
   */
    public function store(Request $request)
    {
      /* Validaciones */
      /* Enviar validaciones como JSON */
      $this->validate($request, Credito::$rules, Credito::$messages);

      /* Si el crédito es renovació o refinanciamiento */
      if($request->input('tipo_credito') != 'Nuevo'){
        $credito = Credito::query()->where(
          ['id_cliente' => $request->input('id_cliente'), 'estado_credito' => 'Vigente']
        )->first();

        if($credito) {
          $credito->estado_credito = 'Renovado';

          if ($request->input('tipo_credito') == 'Refinanciamiento') {
            $credito->estado_credito = 'Refinanciado';
          }

          if ($credito->save()) {
            $cuotas = Cuota::query()->where(['id_credito' => $credito->id_credito])
              ->where('estado_cuota', 'Pendiente')
              ->get();

            foreach ($cuotas as $cuota) {
              $cuota->estado_cuota = 'Pagada';
              $cuota->save();
            }
          }
        }
      }

      /* Registro del nuevo crédito */
      $credito = new Credito();
      $credito->fecha_emision_credito = date('Y-m-d');
      $credito->estado_credito = 'Vigente';
      $credito->id_coop = 1;
      $credito->fill($request->all());

      $cuotas = $this->generarFechasCuotas(
        $credito->frecuencia_credito,
        $request->input('fech_primer_cuota'),
        $credito->n_cuotas_credito
      );

      $credito->fecha_vencimiento_credito = $cuotas[count($cuotas) - 1]->format('Y-m-d');

      if($credito->save()){
        $bienes = $request->input('bienes');
        $bienes = explode(',', $bienes);

        foreach ($bienes as $id_bien) {
          $credito_bien = new CreditoBien();
          $credito_bien->id_credito = $credito->id_credito;
          $credito_bien->id_bien = $id_bien;
          $credito_bien->save();
        }

        $referencias = $request->input('referencias');
        $referencias = explode(',', $referencias);

        foreach ($referencias as $id_ref) {
          $credito_ref = new CreditoReferencia();
          $credito_ref->id_credito = $credito->id_credito;
          $credito_ref->id_ref = $id_ref;
          $credito_ref->save();
        }

        $capital_cuota = $request->input('monto_neto_credito') / $request->input('n_cuotas_credito');
        $interes_cuota = ($request->input('monto_neto_credito') * ($request->input('tasa_interes_credito') / 100)) / $request->input('n_cuotas_credito');

        foreach ($cuotas as $cuota) {
          $credito_cuota = new Cuota();

          $credito_cuota->fecha_pago_cuota = $cuota->format('Y-m-d');
          $credito_cuota->capital_cuota = $capital_cuota;
          $credito_cuota->interes_cuota = $interes_cuota;
          $credito_cuota->total_cuota = $capital_cuota + $interes_cuota;
          $credito_cuota->mora_cuota = 0;
          $credito_cuota->estado_cuota = 'Pendiente';
          $credito_cuota->id_credito = $credito->id_credito;
          $credito_cuota->save();
        }

        Session::flash('success', '');
        Session::flash('mensaje', 'Crédito registrado correctamente');
        return response(['success' => true]);
      }

      return response(['success' => false], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

  /**
   * Remove the specified resource from storage.
   *
   * @param Request $request
   * @return Response
   * @throws \Exception
   */

  public function calcularFechasCuotas(Request $request): Response
  {
    $frecuencia_pago = $request->input('frecuencia_credito');
    $fecha_primer_pago = $request->input('fech_primer_cuota');
    $n_cuotas = $request->input('n_cuotas_credito');

    $cuotas = $this->generarFechasCuotas($frecuencia_pago, $fecha_primer_pago, $n_cuotas);

    return response($cuotas);
  }

  /**
   * @throws \Exception
   */
  protected function generarFechasCuotas(string $frecuencia_pago, string $fecha_primer_pago, int $n_cuotas): array
  {
    $fechas_cuotas = [];

    $i = 0;
    while ($i < $n_cuotas){
      $fecha = new DateTime($fecha_primer_pago);

      if($frecuencia_pago == 'Quincenal'){
        $dias = 14 * $i;
        $fecha->modify('+' . $dias . ' day');
      }else{
        $fecha->modify('+' . $i . ' ' . $this->obtenerFrecuencia($frecuencia_pago));
      }

      if($fecha->format('N') == 6){
        if($frecuencia_pago == 'Diario'){
          $n_cuotas += 2;
          $i += 2;
        }

        $fecha->modify('+2 day');
      }else if($fecha->format('N') == 7){
        if($frecuencia_pago == 'Diario'){
          $n_cuotas++;
          $i++;
        }

        $fecha->modify('+1 day');
      }

      $fechas_cuotas[] = $fecha;
      $i++;
    }

    return $fechas_cuotas;
  }

  protected function obtenerFrecuencia(string $frecuencia_pago): string
  {
    $frecuencia = '';
    switch ($frecuencia_pago){
      case 'Diario':
        $frecuencia = 'day';
        break;
      case 'Semanal':
        $frecuencia = 'week';
        break;
      case 'Mensual':
        $frecuencia = 'month';
        break;
    }
    return $frecuencia;
  }

}
