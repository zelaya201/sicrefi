@php
  $container = 'container-fluid';
  $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')
@section('title', 'Nuevo Crédito')

@section('page-style')
  <link href="{{ asset('assets/css/selectr.min.css') }}" rel="stylesheet" type="text/css">
  <style>
    .selectr-selected {
      border: 1px solid #ced4da;
    }
  </style>
@endsection

@section('content')
  <form action="{{ route('creditos.store') }}" method="post" autocomplete="off" enctype="multipart/form-data"
        id="form-coop">
    @csrf

    <div class="d-flex align-items-center justify-content-between py-3">
      <div class="flex-grow-1">
        <div
          class="d-flex align-items-center justify-content-md-between justify-content-start flex-md-row flex-column gap-4">
          <div class="user-profile-info">
            <h4 class="fw-bold m-0"><span class="text-muted fw-light">Bitácora /</span> Búsqueda avanzada</h4>
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

          </ul>
        </div>
      </div>
    </div>

    @if(session('success'))
      <div class="alert alert-primary d-flex" role="alert">
          <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
              class="bx bx-user fs-6"></i></span>
        <div class="d-flex flex-column ps-1">
          <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Acción exitosa</h6>
          <span>{{ Session::get('success') }}</span>
        </div>
      </div>
    @elseif(session('error'))
      <div class="alert alert-danger d-none m-0 mt-3" role="alert" id="alerta-error">
      <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2" id="label-error"><i
          class="bx bx-error fs-6"></i></span>
        <div class="d-flex flex-column">
          <h6 class="alert-heading d-flex align-items-center mb-1">Ocurrió un error</h6>
          <span id="mensaje_error"></span>
        </div>
      </div>
    @endif

    <div class="row">
      <div class="col-lg-12 mb-4">
        <div class="card h-100">
          <div class="card-header pb-0">
            <span class="fw-bold">Parámetros de búsqueda</span>
            <hr class="my-2">
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-4 mb-3">
                <label class="form-label" for="fecha_desde">Desde</label>
                <input type="datetime-local" class="form-control" name="fecha_desde" id="fecha_desde" value="">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                  <div data-field="name" data-validator="notEmpty" id="fecha_desde_error"></div>
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <label class="form-label" for="fecha_hasta">Hasta</label>
                <input type="datetime-local" class="form-control" name="fecha_hasta" id="fecha_hasta" value="">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                  <div data-field="name" data-validator="notEmpty" id="fecha_hasta_error"></div>
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <label class="form-label" for="id_usuario">Usuario</label>

                <select class="form-select" name="id_usuario" id="id_usuario">
                  <option value="">Seleccione un usuario</option>
                  @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id_usuario }}">{{ $usuario->nom_usuario . ' ' . $usuario->ape_usuario }}</option>
                  @endforeach
                </select>

                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                  <div data-field="name" data-validator="notEmpty" id="tel_coop_error"></div>
                </div>
              </div>

              <div class="col-md-12 text-center">
                <!-- Centrar botones -->

                <button type="submit" class="btn btn-outline-primary">Buscar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <div class="card px-3 py-3">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Usuario</th>
          <th scope="col">Fecha</th>
          <th scope="col">Tabla</th>
          <th scope="col">Operación</th>
        </tr>
        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td>Usuario 1</td>
            <td>2021-09-01 12:00:00</td>
            <td>Clientes</td>
            <td>Insertar</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

@endsection

@section('page-script')

  <script>

  </script>

@endsection