<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ReferenciaController extends Controller
{
    /**
     * Show the form for creating the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store the newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->input('opcion') == 'agregar'){
        if($request->input('session') == 'true') {
          $size = 1;
          $array = $request->session()->get('referencias');

          if ($request->session()->has('referencias')) {
            end($array);
            $size = key($array) + 1;
          }

          $array = Arr::add($array,
            $size,
            [
              'id' => $size,
              'primer_nom_ref' => $request->input('primer_nom_ref'),
              'segundo_nom_ref' => $request->input('segundo_nom_ref'),
              'tercer_nom_ref' => $request->input('tercer_nom_ref'),
              'primer_ape_ref' => $request->input('primer_ape_ref'),
              'segundo_ape_ref' => $request->input('segundo_ape_ref'),
              'dir_ref' => $request->input('dir_ref'),
              'ocupacion_ref' => $request->input('ocupacion_ref'),
              'parentesco_ref' => $request->input('parentesco_ref')
            ]
          );

          $request->session()->put('referencias', $array);
        }

      }else if($request->input('opcion') == 'eliminar'){
        if($request->input('session') == 'true') {
          $array = $request->session()->get('referencias');
          $array = Arr::except($array, $request->input('id'));
          $request->session()->put('referencias', $array);
        }
      }else if($request->input('opcion') == 'obtener'){
        if($request->input('session') == 'true') {
          $array = $request->session()->get('referencias');
          return Arr::get($array, $request->input('id'));
        }
      }else if($request->input('opcion') == 'actualizar') {
        if ($request->input('session') == 'true') {
          $array = $request->session()->get('referencias');
          /* Actualizar elemento del array session */
          $array[$request->input('id')] = [
            'id' => $request->input('id'),
            'primer_nom_ref' => $request->input('primer_nom_ref'),
            'segundo_nom_ref' => $request->input('segundo_nom_ref'),
            'tercer_nom_ref' => $request->input('tercer_nom_ref'),
            'primer_ape_ref' => $request->input('primer_ape_ref'),
            'segundo_ape_ref' => $request->input('segundo_ape_ref'),
            'dir_ref' => $request->input('dir_ref'),
            'ocupacion_ref' => $request->input('ocupacion_ref'),
            'parentesco_ref' => $request->input('parentesco_ref')
          ];

          $request->session()->put('referencias', $array);
        }
      }

      return $request->session()->get('referencias');
    }

    /**
     * Display the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

    }
}
