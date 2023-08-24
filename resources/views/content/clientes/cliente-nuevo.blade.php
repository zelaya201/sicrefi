@php
  $container = 'container-fluid';
  $containerNav = 'container-fluid';
@endphp

@extends('layouts/contentNavbarLayout')
@section('title', 'Nuevo Cliente')
@section('content')
  <div class="d-flex align-items-center justify-content-between py-3">
    <h4 class="fw-bold py-1 m-0"><span class="text-muted fw-light">Clientes /</span> Nuevo Cliente</h4>
    <div>
      <button type="button" class="btn rounded-pill btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Ayuda">
        <span class="tf-icons bx bx-question-mark"></span>
      </button>
      <button class="btn btn-primary" type="button" href="{{url('clientes/cliente-create')}}"><span class="tf-icons bx bx-save"></span> Guardar</button>
      <a class="btn btn-outline-danger" type="button" href="{{url('clientes/cliente')}}"><span class="tf-icons bx bx-arrow-back"></span> Cancelar</a>
    </div>
  </div>

  <div class="row">
    <!-- Datos del Cliente -->
    <div class="col-md-6 mb-4">
      <div class="card p-4">
        <div>
          <h5 class="fw-bold">Datos del Cliente</h5>
          <hr>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="">DUI (*)</label>
            <input type="text" class="form-control" id="" placeholder="00000000-0">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label" for="">Primer nombre (*)</label>
            <input type="text" class="form-control" id="" placeholder="">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="">Segundo nombre</label>
            <input type="text" class="form-control" id="" placeholder="">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label" for="">Tercer nombre</label>
            <input type="text" class="form-control" id="" placeholder="">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="">Primer apellido (*)</label>
            <input type="text" class="form-control" id="" placeholder="">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label" for="">Segundo apellido</label>
            <input type="text" class="form-control" id="" placeholder="">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="">Fecha de nacimiento (*)</label>
            <input type="date" class="form-control" id="" placeholder="">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label" for="">Ocupación (*)</label>
            <input type="text" class="form-control" id="" placeholder="">
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-3">
            <label class="form-label" for="">Tipo de vivienda (*)</label>
            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
              <option selected="">Seleccione</option>
              <option value="1">Propia</option>
              <option value="2">Alquilada</option>
              <option value="3">Familiar</option>
              <option value="4">Otros</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-3">
            <label class="form-label" for="">Dirección (*)</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-3 text-end">
            Los campos marcados con <span class="text-danger">(*)</span> son obligatorios
          </div>
        </div>

      </div>
    </div>

    <div class="col-md-6">
      <!-- Gastos personales -->
      <div class="card p-4 mb-4">
        <div>
          <h5 class="fw-bold">Gastos personales</h5>
          <hr>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="">Alimentación (*)</label>
            <input type="text" class="form-control" id="" placeholder="0.00">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label" for="">Vivienda (*)</label>
            <input type="text" class="form-control" id="" placeholder="0.00">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="">Luz (*)</label>
            <input type="text" class="form-control" id="" placeholder="0.00">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label" for="">Agua (*)</label>
            <input type="text" class="form-control" id="" placeholder="0.00">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="">Cable (*)</label>
            <input type="text" class="form-control" id="" placeholder="0.00">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label" for="">Otros gastos (*)</label>
            <input type="text" class="form-control" id="" placeholder="0.00">
          </div>
        </div>
      </div>

      <!-- Datos de contacto -->
      <div class="card p-4">
        <div>
          <h5 class="fw-bold">Datos de contacto</h5>
          <hr>
        </div>

        <div class="row">
          <div class="col-md-12 mb-3">
            <label class="form-label" for="">Correo electrónico (*)</label>
            <input type="email" class="form-control" id="" placeholder="juan@juan.com">
          </div>
        </div>

        <div class="col-md-12">
          <label class="form-label d-flex align-items-center justify-content-between" for="input-nom-socio">Teléfonos: (*)
            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#telefonoModal">
              <span class="tf-icons bx bx-plus"></span> Agregar
            </button>
          </label>
          <table class="table table-bordered">
            <thead>
              <tr>
                <td scope="col">#</td>
                <td scope="col">Teléfono</td>
                <td></td>
                <td></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="4">No hay resultados</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="telefonoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white text-center" id="exampleModalLabel1">Nuevo teléfono</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Teléfono</label>
              <input type="text" id="nameBasic" class="form-control" placeholder="0000-0000">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </div>
  </div>

@endsection
