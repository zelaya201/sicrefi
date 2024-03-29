<div class="tab-pane fade show active pt-3" id="card-cliente" role="tabpanel">
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header pb-0">
          <span class="fw-bold">Información general</span>
          <hr class="my-2">
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="dui_cliente">DUI (*)</label>

              <input type="text" class="form-control" name="dui_cliente" id="dui_cliente" placeholder="000000000" value="{{$cliente->dui_cliente}}"
                     maxlength="9" onkeypress="return soloNumeros(event)">

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="dui_cliente_error"></div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="primer_nom_cliente">Primer nombre (*)</label>
              <input type="text" class="form-control" name="primer_nom_cliente" id="primer_nom_cliente" value="{{$cliente->primer_nom_cliente}}">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="primer_nom_cliente_error"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="segundo_nom_cliente">Segundo nombre</label>
              <input type="text" class="form-control" id="segundo_nom_cliente" name="segundo_nom_cliente" value="{{$cliente->segundo_nom_cliente}}"/>
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="segundo_nom_cliente_error"></div>
              </div>
            </div>


            <div class="col-md-6 mb-3">
              <label class="form-label" for="tercer_nom_cliente">Tercer nombre</label>
              <input type="text" class="form-control" id="tercer_nom_cliente" name="tercer_nom_cliente" value="{{$cliente->tercer_nom_cliente}}"/>
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="tercer_nom_cliente_error"></div>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="primer_ape_cliente">Primer apellido (*)</label>
              <input type="text" class="form-control" name="primer_ape_cliente" id="primer_ape_cliente" value="{{$cliente->primer_ape_cliente}}">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="primer_ape_cliente_error"></div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="segundo_ape_cliente">Segundo apellido</label>
              <input type="text" class="form-control" id="segundo_ape_cliente" name="segundo_ape_cliente" value="{{$cliente->segundo_ape_cliente}}"/>
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="segundo_ape_cliente_error"></div>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="fech_nac_cliente">Fecha de nacimiento (*)</label>
              <input type="date" class="form-control" name="fech_nac_cliente" id="fech_nac_cliente" value="{{$cliente->fech_nac_cliente}}">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="fech_nac_cliente_error"></div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="ocupacion_cliente">Ocupación (*)</label>
              <input type="text" class="form-control" name="ocupacion_cliente" id="ocupacion_cliente" value="{{$cliente->ocupacion_cliente}}">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="ocupacion_cliente_error"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="estado_civil_cliente">Estado civil (*)</label>
              <select class="form-select" name="estado_civil_cliente" id="estado_civil_cliente">
                <option value="">Seleccione</option>
                <option value="Soltero" {{ $cliente->estado_civil_cliente == 'Soltero' ?  'selected' : ''}}>Soltero</option>
                <option value="Casado" {{ $cliente->estado_civil_cliente == 'Casado' ?  'selected' : ''}}>Casado o unión libre</option>
                <option value="Divorciado" {{ $cliente->estado_civil_cliente == 'Divorciado' ?  'selected' : ''}}>Divorciado</option>
                <option value="Viudo" {{ $cliente->estado_civil_cliente == 'Viudo' ?  'selected' : ''}}>Viudo</option>
              </select>

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="estado_civil_cliente_error"></div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="tipo_vivienda_cliente">Tipo de vivienda (*)</label>
              <select class="form-select" name="tipo_vivienda_cliente" id="tipo_vivienda_cliente">
                <option value="">Seleccione</option>
                <option value="Propia" {{ $cliente->tipo_vivienda_cliente == 'Propia' ?  'selected' : ''}}>Propia</option>
                <option value="Alquilada" {{ $cliente->tipo_vivienda_cliente == 'Alquilada' ?  'selected' : ''}}>Alquilada</option>
                <option value="Familiar" {{ $cliente->tipo_vivienda_cliente == 'Familiar' ?  'selected' : ''}}>Familiar</option>
                <option value="Otros" {{ $cliente->tipo_vivienda_cliente == 'Otros' ?  'selected' : ''}}>Otros</option>
              </select>

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="tipo_vivienda_cliente_error"></div>
              </div>
            </div>


          </div>

          <div class="row">
            <div class="col-md-12 mb-3">
              <label class="form-label" for="dir_cliente">Dirección (*)</label>
              <textarea class="form-control" name="dir_cliente" id="dir_cliente" rows="2"
                        placeholder="Calle / Municipio / Departamento">{{$cliente->dir_cliente}}</textarea>
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="dir_cliente_error"></div>
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

    <div class="col-lg-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <span class="fw-bold">Gastos personales</span>
          <hr class="my-2">
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="gasto_aliment_cliente">Alimentación (*)</label>
              <input type="text" class="form-control" name="gasto_aliment_cliente" id="gasto_aliment_cliente"
                     placeholder="0.00" onkeypress="return filterFloat(event,this);" value="{{ $cliente->gasto_aliment_cliente }}">

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="gasto_aliment_cliente_error"></div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="gasto_vivienda_cliente">Vivienda (*)</label>
              <input type="text" class="form-control" name="gasto_vivienda_cliente" id="gasto_vivienda_cliente"
                     placeholder="0.00" onkeypress="return filterFloat(event,this);" value="{{ $cliente->gasto_vivienda_cliente }}"/>

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="gasto_vivienda_cliente_error"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="gasto_luz_cliente">Luz (*)</label>
              <input type="text" class="form-control" name="gasto_luz_cliente" id="gasto_luz_cliente"
                     placeholder="0.00" onkeypress="return filterFloat(event,this);" value="{{ $cliente->gasto_luz_cliente }}">

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="gasto_luz_cliente_error"></div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="gasto_agua_cliente">Agua (*)</label>
              <input type="text" class="form-control" name="gasto_agua_cliente" id="gasto_agua_cliente"
                     placeholder="0.00" onkeypress="return filterFloat(event,this);" value="{{ $cliente->gasto_agua_cliente }}">

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="gasto_agua_cliente_error"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="gasto_cable_cliente">Cable (*)</label>
              <input type="text" class="form-control" name="gasto_cable_cliente" id="gasto_cable_cliente"
                     placeholder="0.00" onkeypress="return filterFloat(event,this);" value="{{ $cliente->gasto_cable_cliente }}">

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="gasto_cable_cliente_error"></div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="gasto_otro_cliente">Otros gastos (*)</label>
              <input type="text" class="form-control" name="gasto_otro_cliente" id="gasto_otro_cliente"
                     placeholder="0.00" onkeypress="return filterFloat(event,this);" value="{{ $cliente->gasto_otro_cliente }}">

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="gasto_otro_cliente_error"></div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Datos de contacto -->
      <div class="card mb-4">
        <div class="card-header pb-0">
          <span class="fw-bold">Datos de contacto</span>
          <hr class="my-2">
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12 mb-3">
              <label class="form-label" for="email_cliente">Correo electrónico (*)</label>
              <input type="email"
                     class="form-control"
                     name="email_cliente"
                     id="email_cliente"
                     placeholder="admin@admin.com"
                     value="{{$cliente->email_cliente}}"/>

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="email_cliente_error"></div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <label class="form-label d-flex align-items-center justify-content-between">Teléfonos:
              (*)
              <button type="button" class="btn btn-outline-info" data-bs-toggle="modal"
                      data-bs-target="#telefono-modal-cliente">
                <span class="tf-icons bx bx-plus"></span> Agregar
              </button>
            </label>

            <table class="table table-bordered border-top table-hover" id="tabla-telefonos-cliente">
              <thead>
              <tr>
                <th>#</th>
                <th>Teléfono</th>
                <th></th>
              </tr>
              </thead>
              <tbody id="lista-telefonos-cliente">
              @if(count($cliente->telefonos) > 0)
                @foreach($cliente->telefonos as $telefono)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>+503 {{$telefono->tel_cliente}}</td>
                    <td>
                      <button type='button' class='btn btn-outline-danger btn-sm'
                              onclick="eliminarTelefono('{{ $telefono->id_tel_cliente }}', event)">
                        <i class='tf-icons bx bx-trash'></i>
                      </button>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="3">No hay resultados</td>
                </tr>
              @endif
              </tbody>
            </table>

            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="email_cliente_error">Debe ingresar al menos un numero
                de teléfono
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal agregar telefono cliente -->
<div class="modal fade" id="telefono-modal-cliente" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white text-center">Nuevo teléfono</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <input type="hidden" name="id_cliente" id="id_cliente" value="{{$cliente->id_cliente}}">
        <div class="row">
          <div class="col mb-3">
            <label for="tel_cliente" class="form-label">Teléfono (*)</label>
            <input type="text" id="tel_cliente" name="tel_cliente" class="form-control" placeholder="00000000"
                   maxlength="8" onkeypress="return soloNumeros(event)">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="mensaje_tel_cliente"></div>
            </div>
          </div>
        </div>

        <div class="col-12 text-center">
          <button type="button" class="btn btn-primary me-sm-3 me-1 mt-3" id="submit_tel_cliente"><span
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
