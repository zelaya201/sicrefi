@php
  $container = 'container-fluid';
  $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')
@section('title', 'Clientes')
@section('content')
  <div class="d-flex align-items-center justify-content-between py-3">

    <div class="flex-grow-1">
      <div
        class="d-flex align-items-center justify-content-md-between justify-content-start flex-md-row flex-column gap-4">
        <div class="user-profile-info">
          <h4 class="fw-bold py-1 m-0"><span class="text-muted fw-light">Clientes /</span> Cartera de Clientes</h4>
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
    </div>
  </div>


  <div class="card mb-4">
    <div class="card-widget-separator-wrapper">
      <div class="card-body card-widget-separator">
        <div class="row gy-4 gy-sm-1">
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
              <div>
                <h3 class="mb-1">Total</h3>
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
                <h3 class="mb-1">???</h3>
                <p class="mb-0">???</p>
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
                <h3 class="mb-1">$$$</h3>
                <p class="mb-0">Pagados</p>
              </div>
              <div class="avatar me-sm-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-check-double bx-sm"></i>
              </span>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h3 class="mb-1">$$$</h3>
                <p class="mb-0">Sin pagar</p>
              </div>
              <div class="avatar">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-error-circle bx-sm"></i>
              </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Invoice List Table -->
  <div class="card p-3">
    <div class="card-datatable">
      <div class="dataTables_wrapper dt-bootstrap5 no-footer">
        <div class="row my-3">
          <div class="col-md-6">
            <div class="col-md-6">
              <label>
                <input type="search"
                       class="form-control"
                       style="width: 350px;"
                       placeholder="Buscar..."
                       aria-controls="DataTables_Table_0">
              </label>
            </div>
          </div>
          <div
            class="col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-3">

            <div class="invoice_status mb-3 mb-md-0">
              <select id="UserRole" class="form-select">
                <option value="">Estado</option>
                <option value="Activos" class="text-capitalize">Activos</option>
                <option value="Inactivos" class="text-capitalize">Inactivos</option>
                <option value="Todos" class="text-capitalize">Todos</option>

              </select>
            </div>
            <div class="dataTables_length" id="DataTables_Table_0_length"><label><select
                  name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                  <option value="">Mostrar</option>
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                </select></label></div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="invoice-list-table table border-top dataTable no-footer dtr-column my-4 "
                 aria-describedby="DataTables_Table_0_info">
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
            <tbody>
            <tr>
              <td>1</td>
              <td>01209171-6</td>
              <td>Oscar Arnulfo Sanchez Romero</td>
              <td>Res. Villas del Tempisque, Psj #15, Block #10, Casa #90</td>
              <td><span class="badge rounded-pill bg-label-success">Activo</span></td>
              <td>
                <div class="dropdown-icon-demo">
                  <a href="javascript:void(0);" class="btn dropdown-toggle btn-sm hide-arrow"
                     data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </a>
                  <div class="dropdown-menu" style="">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-show me-1"></i>
                      Ver</a>
                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-store-alt me-1"></i>
                      Negocios</a>
                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-building me-1"></i>
                      Bienes</a>
                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-user-plus me-1"></i>
                      Referencias</a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                      Editar</a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                        class="bx bx-trash me-1"></i> Borrar</a>
                  </div>
                </div>
              </td>
            </tr>

            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Mostrar 1 de
              10 de 50 clientes
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
              <ul class="pagination">
                <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a
                    aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous"
                    tabindex="0" class="page-link">Previous</a></li>
                <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0"
                                                                role="link" aria-current="page" data-dt-idx="0"
                                                                tabindex="0" class="page-link">1</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link"
                                                          data-dt-idx="1" tabindex="0" class="page-link">2</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link"
                                                          data-dt-idx="2" tabindex="0" class="page-link">3</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link"
                                                          data-dt-idx="3" tabindex="0" class="page-link">4</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link"
                                                          data-dt-idx="4" tabindex="0" class="page-link">5</a></li>
                <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#"
                                                                                           aria-controls="DataTables_Table_0"
                                                                                           role="link"
                                                                                           data-dt-idx="next"
                                                                                           tabindex="0"
                                                                                           class="page-link">Next</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if(Session::has('mensaje'))
    <div class="alert alert-primary d-flex" role="alert">
          <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
              class="bx bx-command fs-6"></i></span>
      <div class="d-flex flex-column ps-1">
        <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">¡Bien hecho!</h6>
        <span>{{ Session::get('mensaje') }}</span>
      </div>
    </div>
  @endif
@endsection
