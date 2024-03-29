@php
  $container = 'container-fluid';
  $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')
@section('title', 'Usuarios')
@section('content')
  <div class=" flex-grow-1 py-3">
    <div
      class="d-flex align-items-center justify-content-md-between justify-content-start flex-md-row flex-column mb-4">
      <div class="user-profile-info py-1">
        <h4 class="fw-bold m-0"><span class="text-muted fw-light">Usuarios /</span> Listado de usuarios</h4>
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
          <a class="nav-link btn btn-primary load" type="button" href="{{ route('usuarios.create') }}"><span
              class="tf-icons bx bx-plus"></span> <span class="d-none d-sm-inline-block"> Nuevo usuario</span> </a>
        </li>
      </ul>
    </div>

    @if(Session::has('success'))
      <div class="alert alert-primary d-flex" role="alert">
          <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
              class="bx bx-user fs-6"></i></span>
        <div class="d-flex flex-column ps-1">
          <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Acción exitosa</h6>
          <span>{{ Session::get('success') }}</span>
        </div>
      </div>
    @endif

    <form id="filter_index" action="{{ route('usuarios.index') }}" method="get">
      <div class="card p-3">
        <div class="card-datatable">
          <div class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="row">
              <div class="col-12 col-md-6">
                <div class="col-md-6 mb-3">
                  <label></label>
                    <input type="search" class="form-control" id="search_bar" placeholder="Buscar por usuario...">
                </div>
              </div>

              <div
                class="col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-3">
                <div class="invoice_status mb-3 mb-md-0">
                  <select id="estado" name="estado" class="form-select">
                    <option value="Vigente"
                            {{ session('estado_filtro') === 'Activos' ? 'selected' : '' }} class="text-capitalize">
                      Activos
                    </option>
                    <option value="Inactivo"
                            {{ session('estado_filtro') === 'Inactivos' ? 'selected' : '' }} class="text-capitalize">
                      Inactivos
                    </option>
                    <option value="Todos" {{ session('estado_filtro') === 'Todos' ? 'selected' : '' }}>Todos</option>
                  </select>
                </div>
                <div class="dataTables_length"><label>
                    <select id="mostrar" name="mostrar" class="form-select">
                      <option value="">Mostrar</option>
                      <option value="10" {{ session('mostrar') == 10 ? 'selected' : '' }}>10</option>
                      <option value="25" {{ session('mostrar') == 25 ? 'selected' : '' }}>25</option>
                      <option value="50" {{ session('mostrar') == 50 ? 'selected' : '' }}>50</option>
                    </select></label></div>
              </div>
            </div>

            <div class="table-responsive" id="table_div">
              <table id="usuarios_table"
                     class="table-responsive invoice-list-table table border-top dataTable no-footer dtr-column my-2">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Correo electrónico</th>
                  <th>Rol</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody id="clientes_tbody" class="alldata">
                @php
                  $registrosPerPage = 10;
                  $contador = 1;
                  //$contador = 1;
                @endphp

                  @foreach($usuarios as $usuario)
                    <tr style="text-align: center;">
                      <td>{{ $contador }}</td>
                      <td>{{ $usuario->nom_usuario }} {{ $usuario->ape_usuario }}</td>

                      <td>{{ $usuario->nick_usuario }}</td>
                      <td>{{ $usuario->email_usuario }}</td>
                      <td>{{ $usuario->rol->nom_rol }}</td>

                      <!--Filtro para Estado-->
                      @if($usuario->estado_usuario == 'Activo')
                        <td><span class="badge rounded-pill bg-label-success">Activo</span></td>
                      @elseif($usuario->estado_usuario == 'Inactivo')
                        <td><span class="badge rounded-pill bg-label-danger">Inactivo</span></td>
                      @endif

                      <td>
                        <div class="dropdown-icon-demo">
                          <a href="javascript:void(0);" class="btn dropdown-toggle btn-sm hide-arrow"
                             data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('usuarios.cambiarCredenciales', $usuario->id_usuario) }}"><i
                                class="bx bx-lock me-1"></i> Cambiar contraseña</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('usuarios.edit', $usuario->id_usuario) }}"><i
                                class="bx bx-edit-alt me-1"></i> Editar</a>

                            @if($usuario->id_usuario != Session::get('id_usuario'))
                            <div class="dropdown-divider"></div>


                              @if($usuario->estado_usuario == 'Activo')
                                <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="darDeBaja({{ $usuario->id_usuario }}, '{{ $usuario->nom_usuario . ' ' . $usuario->ape_usuario }}', '{{ $usuario->estado_usuario }}')"><i
                                    class="bx bx-trash me-1"></i> Dar de baja</a>
                              @elseif($usuario->estado_usuario == 'Inactivo')
                                <a class="dropdown-item" href="javascript:void(0);" onclick="darDeBaja({{ $usuario->id_usuario }}, '{{ $usuario->nom_usuario . ' ' . $usuario->ape_usuario }}', '{{ $usuario->estado_usuario }}')"><i
                                    class="bx bx-revision me-1"></i> Dar de alta</a>
                              @endif
                            @endif
                          </div>
                        </div>
                      </td>
                    </tr>
                    @php $contador++; @endphp
                  @endforeach

                </tbody>

                <tbody id="searchdata" class="searchdata"></tbody>
              </table>

              <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-end">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header border-bottom">
            <h4 class="modal-title" id="modal_title"></h4>
          </div>
          <div class="modal-body text-center">
            <p id="modal_body"></p>
          </div>
          <div class="modal-footer border-top">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button id="modal_submit" type="button" class="btn"></button>
          </div>
        </div>
      </div>
    </div>


    @endsection

    @section('page-script')
      <script>

        const modal = $('#modal');
        const modal_title = $('#modal_title');
        const modal_body = $('#modal_body');
        const modal_submit = $('#modal_submit');

        let estado_usuario = ''
        let id_usuario = ''

        $(document).ready(function () {
          modal_submit.click(function () {
            $.ajax({
              type: 'GET',
              url: '{{ route('usuarios.darBaja', ':id') }}' . replace(':id', id_usuario),
              data: {
                'id_usuario': id_usuario,
                'estado_usuario': (estado_usuario === 'Activo' ? 'Inactivo' : 'Activo')
              },

              success: function (data) {
                if (data.success === true) {
                  modal.modal('hide');
                  location.reload();
                }
              }
            });
          })

        })

        function darDeBaja(id, nombre, estado) {
          if(estado === 'Activo') {
            modal_title.html(`<i class="bx bx-error-circle bx-lg text-danger"></i> <b>Dar de baja</b>`);
            modal_body.html(`<p>¿Estás seguro que deseas dar de baja al usuario de <b>${nombre}</b>?</p>`);
            modal_submit.text('Dar de baja');
            modal_submit.attr('class', 'btn btn-danger');
          } else {
            modal_title.html(`<i class="bx bx-check-circle bx-lg text-success"></i> <b>Dar de alta</b>`);
            modal_body.html(`<p>¿Estás seguro que deseas dar de alta al usuario de <b>${nombre}</b>?</p>`);
            modal_submit.text('Dar de alta');
            modal_submit.attr('class', 'btn btn-success');
          }

          estado_usuario = estado;
          id_usuario = id;
          modal.modal('show');
        }
      </script>
@endsection
