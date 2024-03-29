@php
  $container = 'container-fluid';
  $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')
@section('title', 'Conyuge')

@section('content')

  {{--  Header de botones --}}
  <div class="d-flex align-items-center justify-content-between pt-3">
    <div class="flex-grow-1">
      <div
        class="d-flex align-items-center justify-content-md-between justify-content-start flex-md-row flex-column gap-4">
        <div class="user-profile-info">
          <h4 class="fw-bold m-0">
            <span class="text-muted fw-light">Clientes /</span> Cónyuge
          </h4>
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
            <button class="nav-link btn btn-primary" type="button" id="btn-modificar-conyuge">
              <span class="tf-icons bx bx-edit-alt me-1"></span> Modificar
            </button>
          </li>
          <li class="list-inline-item fw-semibold">
            <a class="nav-link btn btn-secondary" type="button" href="{{ route('clientes.index') }}"> Cancelar
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  {{--  Fin --}}

  @include('content.clientes._partials.info')
  @include('content.clientes._partials.nav')

  @if(Session::has('success'))
    <div class="alert alert-primary d-flex m-0 mt-3" role="alert">
          <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
              class="bx bx-user fs-6"></i></span>
      <div class="d-flex flex-column ps-1">
        <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Mensaje de éxito</h6>
        <span>{{ Session::get('message') }}</span>
      </div>
    </div>
  @endif

  @if($existe)
    <div class="alert alert-info d-flex m-0 mt-3" role="alert">
          <span class="badge badge-center rounded-pill bg-info border-label-info p-3 me-2"><i
              class="bx bx-user fs-6"></i></span>
      <div class="d-flex flex-column ps-1">
        <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Información</h6>
        <span>Antes de agregar un teléfono debe registrar un cónyuge para este cliente.</span>
      </div>
    </div>
  @endif

  <form id="form-conyuge">
    <div class="tab-pane show fade pt-3" id="card-bienes" role="tabpanel">
      <div class="row">
        <div class="col-md-6 mb-4">
          <!-- Datos del conyugue -->
          <div class="card">
            <div class="card-header pb-0">
              <span class="fw-bold">Datos del cónyuge</span>
              <hr class="my-2">
            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-md-6 mb-3">
                  <label class="form-label" for="primer_nom_conyuge">Primer nombre (*)</label>
                  <input type="text" class="form-control" name="primer_nom_conyuge" id="primer_nom_conyuge"
                         value="{{ $conyuge->primer_nom_conyuge }}">
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    <div data-field="name" data-validator="notEmpty" id="primer_nom_conyuge_error"></div>
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <label class="form-label" for="segundo_nom_conyuge">Segundo nombre</label>
                  <input type="text" class="form-control" id="segundo_nom_conyuge" name="segundo_nom_conyuge"
                         value="{{ $conyuge->segundo_nom_conyuge }}"/>
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    <div data-field="name" data-validator="notEmpty" id="segundo_nom_conyuge_error"></div>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label" for="tercer_nom_conyuge">Tercer nombre</label>
                  <input type="text" class="form-control" id="tercer_nom_conyuge" name="tercer_nom_conyuge"
                         value="{{ $conyuge->tercer_nom_conyuge }}"/>
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    <div data-field="name" data-validator="notEmpty" id="tercer_nom_conyuge_error"></div>
                  </div>
                </div>


                <div class="col-md-6 mb-3">
                  <label class="form-label" for="primer_ape_conyuge">Primer apellido (*)</label>
                  <input type="text" class="form-control" name="primer_ape_conyuge" id="primer_ape_conyuge"
                         value="{{ $conyuge->primer_ape_conyuge }}">
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    <div data-field="name" data-validator="notEmpty" id="primer_ape_conyuge_error"></div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label" for="segundo_ape_conyuge">Segundo apellido</label>
                  <input type="text" class="form-control" id="segundo_ape_conyuge" name="segundo_ape_conyuge"
                         value="{{ $conyuge->segundo_ape_conyuge }}"/>
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    <div data-field="name" data-validator="notEmpty" id="segundo_ape_conyuge_error"></div>
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <label class="form-label" for="ocupacion_conyuge">Ocupación (*)</label>
                  <input type="text" class="form-control" name="ocupacion_conyuge" id="ocupacion_conyuge"
                         value="{{ $conyuge->ocupacion_conyuge }}">
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    <div data-field="name" data-validator="notEmpty" id="ocupacion_conyuge_error"></div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 mb-3">
                  <label class="form-label" for="dir_conyuge">Dirección (*)</label>
                  <textarea class="form-control" name="dir_conyuge" id="dir_conyuge"
                            rows="2">{{ $conyuge->dir_conyuge }}</textarea>
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    <div data-field="name" data-validator="notEmpty" id="dir_conyuge_error"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <!-- Datos de contacto -->
          <div class="card mb-4">
            <div class="card-header pb-0">
              <span class="fw-bold">Datos de contacto</span>
              <hr class="my-2">
            </div>
            <div class="card-body">
              <div class="col-md-12">
                <label class="form-label d-flex align-items-center justify-content-between">Teléfonos:
                  (*)
                  @if(!$existe)
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal"
                            data-bs-target="#telefono-modal-conyuge">
                      <span class="tf-icons bx bx-plus"></span> Agregar
                    </button>
                  @endif
                </label>

                <table class="table table-bordered border-top table-hover" id="tabla-telefonos-conyuge">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Teléfono</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody id="lista-telefonos-conyuge">

                  @if(empty($telefonos) || count($telefonos) == 0)
                    <tr>
                      <td colspan="3">No hay resultados</td>
                    </tr>
                  @else
                    @foreach($telefonos as $telefono)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>+503 {{ $telefono->tel_conyuge }}</td>
                        <td>
                          <input type="hidden" name="id_tel" id="id_tel" value="{{$telefono->id_tel_conyuge}}">
                          <button type='button' class='btn btn-outline-danger btn-sm'
                                  onclick="eliminarTelefono('{{ $telefono->id_tel_conyuge }}', event)">
                            <i class='tf-icons bx bx-trash'></i>
                          </button>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>


  <form action="{{ route('telsConyuge.store') }}" method="post" autocomplete="off" enctype="multipart/form-data"
        id="form-telsconyuge">
    <!-- Modal agregar telefono conyuge -->
    <div class="modal fade" data-bs-backdrop="static" id="telefono-modal-conyuge" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title text-white text-center">Nuevo teléfono</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label for="tel_conyuge" class="form-label">Teléfono (*)</label>
                <input type="text" id="tel_conyuge" name="tel_conyuge" class="form-control" placeholder="00000000"
                       maxlength="8">
                  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    <div data-field="name" data-validator="notEmpty" id="mensaje-telefono-conyuge"></div>
                  </div>
              </div>
            </div>

            <div class="col-12 text-center">
              <button type="button" class="btn btn-primary me-sm-3 me-1 mt-3" id="btn-agregar-telefono-conyuge"><span
                  class="tf-icons bx bx-plus"></span>
                Agregar
              </button>
              <button type="button" class="btn btn-label-secondary mt-3" data-bs-dismiss="modal"
                      aria-label="Close">Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection

@section('page-script')
  <script>

    $(document).ready(function () {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#btn-modificar-conyuge').on('click', function () {
        $.ajax({
          url: '{{ route("conyuge.store") }}',
          type: 'POST',
          dataType: 'json',
          data: $('#form-conyuge').serialize() + '&id_cliente=' + {{ $cliente->id_cliente }},
          success: function (data) {
            if (data.success) {
              window.location.href = '{{ route("conyuge.edit", $cliente->id_cliente) }}';
            }
          },
          error: function (xhr) {
            var data = xhr.responseJSON;
            if ($.isEmptyObject(data.errors) === false) {
              $.each(data.errors, function (key, value) {
                // Mostrar errores en los inputs
                $('#' + key).addClass('is-invalid');
                $('#' + key + '_error').html(value); // Agregar el mensaje de error
              });
            }
          }
        });
      });

      /* ALMACENAR TELEFONO */
      $('#btn-agregar-telefono-conyuge').on('click', function () {
        let id = "{{ (!empty($conyuge)) ? $conyuge->id_conyuge : 0 }}";
        let tel = $('#tel_conyuge');
        if (tel.val() === '') {
          tel.addClass('is-invalid');
          $('#mensaje-telefono-conyuge').html('El campo es obligatorio.');

        } else if (tel.val().length < 8) {
          tel.addClass('is-invalid');
          $('#mensaje-telefono-conyuge').html('El campo debe tener al menos 8 caracteres.');
        } else {
          $.ajax({
            url: '{{ route("telsConyuge.edit", ":id_conyuge") }}'.replace(':id_conyuge', id),
            type: 'get',
            data: {
              id: id,
              tel: tel.val(),
            },
            success: function (data) {
              if (data.success) {
                // Reedireccionar a la página de clientes
                location.reload();
              }
            }
          });
        }

      });
    });

    /* ELIMINAR TELEFONO */
    function eliminarTelefono(id, event) {
      // Deshabilitar btn de eliminar que hizo la petición
      $(event.target).prop('disabled', true);

      $.ajax({
        url: "{{ route('telsConyuge.destroy', ':id') }}".replace(':id', id),
        type: 'DELETE',
        data: {
          id: id,
          _token: "{{ csrf_token() }}",
        },
        success: function (data) {
          if (data.success) {
            // Reedireccionar a la página de clientes
            location.reload();
          }
        }
      });
    }

  </script>
@endsection
