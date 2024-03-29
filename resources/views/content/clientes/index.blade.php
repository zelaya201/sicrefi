@php
  $container = 'container-fluid';
  $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')
@section('title', 'Clientes')
@section('content')
    <div class=" flex-grow-1 py-3">
      <div class="d-flex align-items-center justify-content-md-between justify-content-start flex-md-row flex-column mb-4">
        <div class="user-profile-info py-1">
          <h4 class="fw-bold m-0"><span class="text-muted fw-light">Clientes /</span> Cartera de clientes</h4>
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
            <a class="nav-link btn btn-primary" type="button" href="{{ route('clientes.create') }}"><span
                class="tf-icons bx bx-plus"></span> <span class="d-none d-sm-inline-block"> Nuevo cliente</span> </a>
          </li>
        </ul>
      </div>

      @if(Session::has('success'))
        <div class="alert alert-primary d-flex" role="alert">
          <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
              class="bx bx-user fs-6"></i></span>
          <div class="d-flex flex-column ps-1">
            <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Mensaje de éxito</h6>
            <span>{{ Session::get('mensaje') }}</span>
          </div>
        </div>
      @endif

      @if(Session::has('error'))
        <div class="alert alert-danger d-flex" role="alert">
          <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
              class="bx bx-user fs-6"></i></span>
          <div class="d-flex flex-column ps-1">
            <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Acción no permitida</h6>
            <span>{{ Session::get('mensaje') }}</span>
          </div>
        </div>
      @endif

      <div class="card mb-4">
        <div class="card-widget-separator-wrapper">
          <div class="card-body card-widget-separator">
            <div class="row gy-4 gy-sm-1">
              <div class="col-sm-6 col-lg-3">
                <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                  <div>
                    <h3 class="mb-1">{{$contar}}</h3>
                    <p class="mb-0">Clientes</p>
                  </div>
                  <div class="avatar me-sm-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-user bx-sm"></i>
              </span>
                  </div>
                </div>
                <hr class="d-none d-sm-block d-lg-none me-4">
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                  <div>
                    <h3 class="mb-1">{{ $clientes_creditos }}</h3>
                    <p class="mb-0">Clientes con Crédito</p>
                  </div>
                  <div class="avatar me-lg-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-file bx-sm"></i>
              </span>
                  </div>
                </div>
                <hr class="d-none d-sm-block d-lg-none">
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                  <div>
                    <h3 class="mb-1">{{$activos}}</h3>
                    <p class="mb-0">Clientes Activos</p>
                  </div>
                  <div class="avatar me-sm-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class='bx bx-user-check bx-sm'></i>
              </span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <h3 class="mb-1">{{$inactivos}}</h3>
                    <p class="mb-0">Clientes Inactivos</p>
                  </div>
                  <div class="avatar">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class='bx bx-user-minus bx-sm'></i>
              </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Invoice List Table -->
      <form action="{{route('clientes.index')}}" method="GET">
        <div class="card p-3">
          <div class="card-datatable">
            <div class="dataTables_wrapper dt-bootstrap5 no-footer">
              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="col-md-6 mb-3">
                    <div class="input-group">
                    <label for=""></label>
                      <input type="search" class="form-control" id="search_bar" placeholder="Buscar cliente..." name="q" value="{{ Request::get('q') }}">
                      <button class="btn btn-outline-primary load" type="submit">
                        <i class="bx bx-search"></i>
                      </button>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-3">
                  <div class="invoice_status mb-3 mb-md-0">
                    <select id="estado" name="estado" class="form-select">
                      <option value="">Estado</option>
                      <option value="Activo" @if(Request::get('estado') == 'Activo') selected @endif class="text-capitalize">Activos</option>
                      <option value="Inactivo" @if(Request::get('estado') == 'Inactivo') selected @endif  class="text-capitalize">Inactivos</option>
                      <option value="Todos" @if(Request::get('estado') == 'Todos') selected @endif >Todos</option>
                    </select>
                  </div>
                  <div class="dataTables_length">
                    <label>
                      <select id="mostrar" name="mostrar" class="form-select">
                        <option value="">Mostrar</option>
                        <option value="5" @if(Request::get('mostrar') == '5') selected @endif >5</option>
                        <option value="10" @if(Request::get('mostrar') == '10') selected @endif >10</option>
                        <option value="25" @if(Request::get('mostrar') == '25') selected @endif >25</option>
                        <option value="50" @if(Request::get('mostrar') == '50') selected @endif >50</option>
                      </select>
                    </label>
                  </div>
                </div>
              </div>

              <div class="table-responsive" id="table_div">
                <table id="clientes_table" class="table border-top dataTable no-footer dtr-column my-2">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Dui</th>
                    <th>Cliente</th>
                    <th>Dirección</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody id="clientes_tbody">

                  @foreach($clientes as $cliente)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{$cliente->dui_cliente}}</td>
                      <!--Filtro para Nombre-->
                      <td>{{$cliente->nom_completo}}</td>
                      <td>{{$cliente->dir_cliente}}</td>
                      <!--Filtro para Estado-->
                      @if($cliente->estado_cliente == 'Activo')
                        <td><span class="badge rounded-pill bg-label-success">Activo</span></td>
                      @elseif($cliente->estado_cliente == 'Inactivo')
                        <td><span class="badge rounded-pill bg-label-danger">Inactivo</span></td>
                      @endif
                      <td>
                        <div class="dropdown-icon-demo">
                          <a href="javascript:void(0);" class="btn dropdown-toggle btn-sm hide-arrow"
                             data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('clientes.show', $cliente->id_cliente) }}"><i class="bx bx-file me-1"></i> Historial crediticio</a>

                            <div class="dropdown-divider"></div>
                          @if($cliente->estado_cliente == 'Activo')
                              @if($cliente->conyuge)
                                <a class="dropdown-item" href="{{ route('conyuge.edit', $cliente->id_cliente) }}"><i class="bx bx-user-check me-1"></i>
                                  Cónyuge</a>
                              @endif
                            <a class="dropdown-item" href="{{ route('negocios.show', $cliente->id_cliente) }}"><i class="bx bx-store-alt me-1"></i>
                              Negocios</a>
                            <a class="dropdown-item" href="{{ route('bienes.show', $cliente->id_cliente) }}"><i class="bx bx-building me-1"></i>
                              Bienes</a>
                            <a class="dropdown-item" href="{{ route('referencias.show', $cliente->id_cliente) }}"><i class="bx bx-user-plus me-1"></i>
                              Referencias</a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('clientes.edit', $cliente->id_cliente) }}"><i class="bx bx-edit-alt me-1"></i>
                              Editar</a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item text-danger" href="javascript:void(0);" id="btn_dar_baja"
                               onclick="cambiarEstado('{{ $cliente->id_cliente }}', '{{ $cliente->primer_nom_cliente }} ' + ' {{ $cliente->primer_ape_cliente }}', '{{ $cliente->estado_cliente }}')"><i
                                class="bx bx-trash me-1"></i> Dar de baja</a>

                            @else
                              <a class="dropdown-item" href="javascript:void(0);"
                                 onclick="cambiarEstado('{{ $cliente->id_cliente }}', '{{ $cliente->primer_nom_cliente }} ' + ' {{ $cliente->primer_ape_cliente }}', '{{ $cliente->estado_cliente }}')">
                                <i class='bx bx-revision' ></i> Dar de alta
                              </a>
                            @endif
                          </div>
                        </div>
                      </td>
                    </tr>

                  @endforeach

                  @if(sizeof($clientes) < 1)
                    <tr>
                      <td colspan="6" class="text-center">No hay registros disponibles</td>
                    </tr>
                  @endif
                  </tbody>
                </table>

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

    var borderEnd = $('.border-end');
    if(screen.width <= 573){
      borderEnd.removeClass('border-end');
    }

    const modal = $('#modal');
    const modal_title = $('#modal_title');
    const modal_body = $('#modal_body');
    const modal_submit = $('#modal_submit');

    let estado_cliente = '';
    let id_cliente = '';

    /* Filtro por estado*/
    $(document).ready(function() {
      $('#estado').on('change', function() {
        $(this).closest('form').submit();
      })

      $('#mostrar').on('change', function() {
        $(this).closest('form').submit();
      })

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      modal_submit.click(function () {
        $.ajax({
          type: 'POST',
          url: '{{ route('clientes.cambiarEstado', ':id') }}' . replace(':id', id_cliente),
          data: {
            'id_cliente': id_cliente,
            'estado_cliente': (estado_cliente === 'Activo' ? 'Inactivo' : 'Activo')
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

    function cambiarEstado(id, nombre, estado) {
      if(estado === 'Activo') {
        modal_title.html(`<i class="bx bx-error-circle bx-lg text-danger"></i> <b>Dar de baja</b>`);
        modal_body.html(`<p>¿Estás seguro que deseas dar de baja el cliente <b>${nombre}</b>?</p>`);
        modal_submit.text('Dar de baja');
        modal_submit.attr('class', 'btn btn-danger');
      } else {
        modal_title.html(`<i class="bx bx-check-circle bx-lg text-success"></i> <b>Dar de alta</b>`);
        modal_body.html(`<p>¿Estás seguro que deseas dar de alta el cliente <b>${nombre}</b>?</p>`);
        modal_submit.text('Dar de alta');
        modal_submit.attr('class', 'btn btn-success');
      }

      estado_cliente = estado;
      id_cliente = id;
      modal.modal('show');
    }

  </script>
@endsection
