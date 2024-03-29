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
            <h4 class="fw-bold m-0"><span class="text-muted fw-light">Configuración /</span> Empresa</h4>
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

            <li class="list-inline-item fw-semibold">

              <button class="nav-link btn btn-primary load" type="button" id="btn_editar_coop">
                <span class="tf-icons bx bx-save"></span>
                Modificar
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
            <span class="fw-bold">Información general</span>
            <hr class="my-2">
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-8 mb-3">
                <label class="form-label" for="nom_coop">Nombre (*)</label>
                <input type="text" class="form-control" name="nom_coop" id="nom_coop" value="{{ $cooperativa->nom_coop }}">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                  <div data-field="name" data-validator="notEmpty" id="nom_coop_error"></div>
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <label class="form-label" for="tel_coop">Teléfono (*)</label>
                <input type="text" class="form-control" placeholder="00000000" name="tel_coop" id="tel_coop" value="{{ $cooperativa->tel_coop }}">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                  <div data-field="name" data-validator="notEmpty" id="tel_coop_error"></div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label class="form-label" for="dir_coop">Dirección (*)</label>
                <textarea class="form-control" name="dir_coop" id="dir_coop" rows="2"
                          placeholder="Calle / Municipio / Departamento">{{ $cooperativa->dir_coop }}</textarea>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                  <div data-field="name" data-validator="notEmpty" id="dir_coop_error"></div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3 text-end">
                Los campos marcados con <span class="text-danger">(*)</span> son obligatorios
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </form>

@endsection

@section('page-script')

  <script>

    const btn_editar_coop = $('#btn_editar_coop');
    const form_coop = $('#form-coop');

    /* ############################################ */
    btn_editar_coop.on('click', function () {
      // REGISTRAR USUARIO

      $.ajax({
        url: '{{ route("configuracion.update", $cooperativa->id_coop) }}',
        type: 'put',
        dataType: 'json',
        data: form_coop.serialize(),
        success: function (data) {
          if (data.success) {
            window.location.href = '{{ route("configuracion.index") }}';
          }
        },
        error: function (xhr) {
          var data = xhr.responseJSON;

          if ($.isEmptyObject(data.errors) === false) {
            $.each(data.errors, function (key, value) {
              // Mostrar errores en los inputs
              $('#' + key).addClass('is-invalid');
              $('#' + key + '_error').html(value); // Agregar el mensaje de error
              $('#' + key + '_label').addClass('border border-danger rounded')
            });
          }

        }
      });
    });
    /* ############################################ */
  </script>

@endsection
