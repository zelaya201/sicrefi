@php
  $container = 'container-fluid';
  $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')
@section('title', 'Cuotas')
@section('content')
  <div class=" flex-grow-1 py-3">
    <div
      class="d-flex align-items-center justify-content-md-between justify-content-start flex-md-row flex-column mb-1">
      <div class="user-profile-info py-1">
        <h4 class="fw-bold m-0"><span class="text-muted fw-light">Créditos /</span> @if($cuotaAPagar->id_cuota > 0)
            Pago de cuotas
          @else
            Resumen de pagos
          @endif </h4>
      </div>
      <ul
        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
        <li class="list-inline-item fw-semibold">
          <button type="button" class="btn rounded-pill btn-icon btn-warning"
                  data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd"
                  data-bs-offset="0,4"
                  data-bs-placement="top" data-bs-html="true" title="Ayuda">
            <span class="tf-icons bx bx-question-mark"></span>
          </button>
        </li>
        @if($cuotaAPagar->id_cuota > 0)
          <li class="list-inline-item fw-semibold">
            <button class="nav-link btn btn-primary" type="button" id="btn_pagar_credito_total"
                    data-bs-toggle="modal"
                    data-bs-target="#modal_pagar_credito">
              <span class="tf-icons bx bx-credit-card-front me-1"></span> Pagar crédito
            </button>
          </li>
        @endif
        <li class="list-inline-item fw-semibold">
          <a class="nav-link btn btn-secondary load" type="button" href="{{ route('creditos.index') }}"><i
              class="bx bx-arrow-back me-1"></i>Atrás
          </a>
        </li>
      </ul>
    </div>

    <div class="mb-2">
      <h4 class="mb-1">
        N° de Crédito #{{ $credito->id_credito }}
      </h4>
      <p class="mb-0">
        Fecha emisión: {{ date('d-m-Y', strtotime($credito->fecha_emision_credito)) }}
      </p>
    </div>

    @if(Session::has('success'))
      <div class="alert alert-primary d-flex m-0 mt-3 mb-3" role="alert">
          <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
              class="bx bx-user fs-6"></i></span>
        <div class="d-flex flex-column ps-1">
          <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Mensaje de éxito</h6>
          <span>{{ Session::get('success') }}</span>
        </div>
      </div>
    @endif

    <div class="card mb-2">
      <div class="card-header pb-0">
        <span class="fw-bold">Datos generales</span>
        <hr class="my-2">
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <span class="fw-bold">Monto a pagar:</span>
            <span>${{ number_format($credito->monto_credito, 2) }}</span>
          </div>

          <div class="col-md-3">
            <span class="fw-bold">Monto pagado:</span>
            <span>${{ number_format($total_pagado, 2) }}</span>
          </div>

          <div class="col-md-3">
            <span class="fw-bold">Monto pendiente:</span>
            <span>${{ number_format($total_pendiente, 2) }}</span>
          </div>

          <div class="col-md-3">
            <span class="fw-bold">Cliente:</span>
            <span>{{ $cliente->nom_completo }}</span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <span class="fw-bold">Cuotas:</span>
            <span>{{ $credito->n_cuotas_credito }}</span>
          </div>

          <div class="col-md-3">
            <span class="fw-bold">Cuotas pagadas:</span>
            <span>{{ $cuotas_pagadas }}</span>
          </div>

          <div class="col-md-3">
            <span class="fw-bold">Cuotas pendientes:</span>
            <span>{{ $cuotas_pendientes }}</span>
          </div>

          <div class="col-md-3">
            <span class="fw-bold">Estado:</span>
            <span>
              @if($credito->estado_credito == 'Vigente')
                <span class="badge rounded-pill bg-label-success">{{ $credito->estado_credito }}</span>

              @elseif($credito->estado_credito == 'Finalizado' || $credito->estado_credito == 'Refinanciado' || $credito->estado_credito == 'Renovado')
                <span class="badge rounded-pill bg-label-info">{{ $credito->estado_credito }}</span>

              @else
                <span class="badge rounded-pill bg-label-danger">{{ $credito->estado_credito }}</span>
              @endif
            </span>
          </div>
        </div>
      </div>
    </div>

    @if($cuotaAPagar->id_cuota > 0)
      <div class="card mb-2 my-4">
        <div class="card-header pb-0">
          <span class="fw-bold">Pago</span>
          <hr class="my-2">
        </div>
        <div class="card-body">
          <form action="{{ route('cuotas.update', $cuotaAPagar->id_cuota) }}" method="POST" id="form_pagar_cuota">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-2">
                <label for="">N° de cuota</label>
                <p class="form-control">
                  {{ $cuotas_pagadas + 1 }}
                </p>
              </div>

              <!-- Fecha de Pago -->
              <div class="col-md-2">
                <label for="">Fecha de pago</label>
                <p class="form-control">{{ date('d-m-Y', strtotime($cuotaAPagar->fecha_pago_cuota)) }}</p>
              </div>

              <div class="col-md-2">
                <label for="">Monto cuota</label>
                <p class="form-control"> {{ number_format($cuotaAPagar->total_cuota, 2) }}</p>
              </div>

              <div class="col-md-2">
                <label for="">Mora</label>
                <p class="form-control">{{ number_format($cuotaAPagar->mora_cuota, 2) }}</p>
              </div>

              <div class="col-md-2">
                <label for="">Total a pagar</label>
                <p class="form-control">{{ number_format($cuotaAPagar->total_pagar, 2) }}</p>
              </div>

              <!-- Estado Cuota -->
              <div class="col-md-2">
                <label for="">Estado</label>
                <p class="form-control border border-0">
                  @if($cuotaAPagar->estado_cuota == 'Pagada')
                    <span class="badge rounded-pill bg-label-success">{{ $cuotaAPagar->estado_cuota }}</span>
                  @elseif($cuotaAPagar->estado_cuota == 'Pendiente')
                    <span class="badge rounded-pill bg-label-info">{{ $cuotaAPagar->estado_cuota }}</span>
                  @else
                    <span class="badge rounded-pill bg-label-danger">{{ $cuotaAPagar->estado_cuota }}</span>
                  @endif
                </p>
              </div>

              {{--            <div class="col-md-2">--}}
              {{--              <label for="extra_cuota">Extra</label>--}}
              {{--              <input type="text" class="form-control" name="extra_cuota" id="extra_cuota"--}}
              {{--                     value="{{ number_format($cuotaAPagar->extra_cuota, 2) }}" placeholder="0.00">--}}
              {{--            </div>--}}
            </div>

            <div class="row">
              <div class="col-md-12 text-center">
                <button type="button" class="btn btn-outline-primary mt-sm-0 mt-4"
                        data-bs-toggle="modal"
                        data-bs-target="#modal"
                        id="btn_pagar_cuota">
                  <i class="bx bx-coin me-1"></i>
                  Realizar pago
                </button>
              </div>
            </div>

            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header border-bottom">
                    <h4 class="modal-title" id="modal_title">
                      <i class="bx bx-check-circle bx-lg text-success"></i> <b>Confirmar acción</b>
                    </h4>
                  </div>
                  <div class="modal-body text-center">
                    <p id="modal_body">
                      ¿Estás seguro que deseas pagar la cuota n° {{ $cuotas_pagadas+1 }} con los siguientes datos?
                      <ul class="text-start">
                        <li>Fecha de pago: <b>{{ date('d-m-Y', strtotime($cuotaAPagar->fecha_pago_cuota)) }}</b></li>
                        <li>Monto: <b>{{ number_format($cuotaAPagar->total_cuota, 2) }}</b></li>
                        <li>Mora: <b>{{ number_format($cuotaAPagar->mora_cuota, 2) }}</b></li>
                        <li>Total: <b>{{ number_format($cuotaAPagar->total_pagar, 2) }}</b></li>
                      </ul>
                    </p>
                  </div>
                  <div class="modal-footer border-top">
                    <button type="button" class="btn btn-secondary load" data-bs-dismiss="modal">Cancelar</button>
                    <button id="modal_submit" type="submit" class="btn btn-success">Si, pagar</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    @endif

  </div>

  <div class="card mb-4">
    <div class="card-header pb-0">
      <span class="fw-bold">Cuotas</span>
      <hr class="my-2">
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-responsive">
          <thead>
          <th>#</th>
          <th>Fecha de pago</th>
          <th>Monto</th>
          <th>Interes</th>
          <th>Mora</th>
          {{--          <th>Extra</th>--}}
          <th>Total</th>
          <th>Estado</th>
          <th>Comprobante</th>
          </thead>

          <tbody>
          @foreach($cuotas as $cuota)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ date('d-m-Y', strtotime($cuota->fecha_pago_cuota)) }}</td>
              <td>${{ number_format($cuota->monto_cuota, 2) }}</td>
              <td>${{ number_format($cuota->interes_cuota, 2) }}</td>
              <td>${{ number_format($cuota->mora_cuota, 2) }}</td>
              {{--              <td>${{ number_format($cuota->extra_cuota, 2) }}</td>--}}
              <td>${{ number_format($cuota->total_cuota, 2) }}</td>
              <td>
                @if($cuota->estado_cuota == 'Pagada')
                  <span class="badge rounded-pill bg-label-success">{{ $cuota->estado_cuota }}</span>
                @elseif($cuota->estado_cuota == 'Pendiente')
                  <span class="badge rounded-pill bg-label-info">{{ $cuota->estado_cuota }}</span>
                @else
                  <span class="badge rounded-pill bg-label-danger">{{ $cuota->estado_cuota }}</span>
                @endif
              </td>
              <td>
                @if($cuota->estado_cuota == 'Pagada')
                  <a href="{{ route('generar-ticket', $cuota->id_cuota) }}" target="_blank" class="btn btn-sm m-0">
                    <i class="bx bx-file"></i>
                  </a>
                @else
                  <a href="#" class="btn btn-sm disabled">
                    <i class="bx bx-file"></i>
                  </a>
                @endif
              </td>
            </tr>
          @endforeach
          </tbody>

        </table>
      </div>
    </div>
  </div>

  <form action="{{ route('cuotas.pagarCredito', $credito->id_credito) }}" method="get" autocomplete="off"
        enctype="multipart/form-data"
        id="form_pagar_credito">
    @csrf

    <div class="modal fade" id="modal_pagar_credito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header border-bottom">
            <h4 class="modal-title" id="modal_title">
              <i class="bx bx-check-circle bx-lg text-success"></i> <b>Confirmar acción</b>
            </h4>
          </div>
          <div class="modal-body text-center">
            <p id="modal_body">
              ¿Estás seguro que deseas pagar el crédito n° {{ $credito->id_credito }} en su totalidad?
            </p>
          </div>
          <div class="modal-footer border-top">
            <button type="button" class="btn btn-secondary load" data-bs-dismiss="modal">Cancelar</button>
            <button id="modal_submit" type="submit" class="btn btn-success">Si, pagar</button>
          </div>
        </div>
      </div>
    </div>

  </form>

@endsection

@section('scripts')
  <script>
    const btn_pagar_credito = $('#btn_pagar_credito');
    const btn_pagar_cuota = $('#btn_pagar_cuota');

    const form_pagar_credito = $('#form_pagar_credito');
    const form_pagar_cuota = $('#form_pagar_cuota');

    const modal = $('#modal');
    const modal_title = $('#modal_title');
    const modal_body = $('#modal_body');
    const modal_submit = $('#modal_submit');

    $(document).ready(function () {

      btn_pagar_credito.addEventListener('click', function (e) {
        // Ejecutar submit
        form_pagar_credito.submit();
      });

      btn_pagar_cuota.on('click', pagarCuota());
    });

    function pagarCuota() {
      modal_title.html('<i class="bx bx-check-circle bx-lg text-success"></i> <b>Confirmar acción</b>');
      modal_body.html(
        `<p>
            ¿Estás seguro que deseas pagar la cuota n° {{ $cuotaAPagar->n_cuota }} con los siguientes datos?
            <ul class="text-start">
                <li>Fecha de pago: <b>${$('#fecha_pago_cuota').val()}</b></li>
                <li>Monto: <b>${$('#monto_cuota').val()}</b></li>
                <li>Interes: <b>${$('#interes_cuota').val()}</b></li>
                <li>Mora: <b>${$('#mora_cuota').val()}</b></li>
                <li>Total: <b>${$('#total_cuota').val()}</b></li>
            </ul>
        </p>`
      );
      modal_submit.html('Si, pagar');
      modal_submit.addClass('btn-success');
      modal_submit.removeClass('btn-danger');


      return true;
    }
  </script>
@endsection
