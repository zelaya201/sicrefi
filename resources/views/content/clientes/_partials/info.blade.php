<div class="tab-pane fade show active pt-3" id="card-datos-cliente" role="tabpanel">
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-header pb-0">
          <span class="fw-bold">Datos del cliente</span>
          <hr class="my-2">
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="dui_cliente">DUI (*)</label>

              <input type="text" class="form-control" name="dui_cliente" id="dui_cliente" placeholder="000000000">

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="dui_cliente_error"></div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="primer_nom_cliente">Primer nombre (*)</label>
              <input type="text" class="form-control" name="primer_nom_cliente" id="primer_nom_cliente">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="primer_nom_cliente_error"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="segundo_nom_cliente">Segundo nombre</label>
              <input type="text" class="form-control" id="segundo_nom_cliente" name="segundo_nom_cliente"/>
            </div>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="segundo_nom_cliente_error"></div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="tercer_nom_cliente">Tercer nombre</label>
              <input type="text" class="form-control" id="tercer_nom_cliente" name="tercer_nom_cliente"/>
            </div>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="tercer_nom_cliente_error"></div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="primer_ape_cliente">Primer apellido (*)</label>
              <input type="text" class="form-control" name="primer_ape_cliente" id="primer_ape_cliente">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="primer_ape_cliente_error"></div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="segundo_ape_cliente">Segundo apellido</label>
              <input type="text" class="form-control" id="segundo_ape_cliente" name="segundo_ape_cliente"/>
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="segundo_ape_cliente_error"></div>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="fech_nac_cliente">Fecha de nacimiento (*)</label>
              <input type="date" class="form-control" name="fech_nac_cliente" id="fech_nac_cliente" value="">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="fech_nac_cliente_error"></div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="ocupacion_cliente">Ocupación (*)</label>
              <input type="text" class="form-control" name="ocupacion_cliente" id="ocupacion_cliente">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="ocupacion_cliente_error"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="estado_civil_cliente">Estado civil (*)</label>
              <select class="form-select" name="estado_civil_cliente" id="estado_civil_cliente">
                <option>Seleccione</option>
                <option value="Soltero">Soltero</option>
                <option value="Casado">Casado</option>
                <option value="Divorciado">Divorciado</option>
                <option value="Viudo">Viudo</option>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="tipo_vivienda_cliente">Tipo de vivienda (*)</label>
              <select class="form-select" name="tipo_vivienda_cliente" id="tipo_vivienda_cliente">
                <option>Seleccione</option>
                <option value="Propia">Propia</option>
                <option value="Alquilada">Alquilada</option>
                <option value="Familiar">Familiar</option>
                <option value="Otros">Otros</option>
              </select>

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="tipo_vivienda_cliente_error"></div>
              </div>
            </div>


          </div>

          <div class="row">
            <div class="col-md-12 mb-3">
              <label class="form-label" for="dir_cliente">Dirección (*)</label>
              <textarea class="form-control" name="dir_cliente" id="dir_cliente" rows="2" placeholder="Calle / Municipio / Departamento"></textarea>
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
                     placeholder="0.00">

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="gasto_aliment_cliente_error"></div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="gasto_vivienda_cliente">Vivienda (*)</label>
              <input type="text" class="form-control" name="gasto_vivienda_cliente" id="gasto_vivienda_cliente"
                     placeholder="0.00"/>

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="gasto_vivienda_cliente_error"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="gasto_luz_cliente">Luz (*)</label>
              <input type="text" class="form-control" name="gasto_luz_cliente" id="gasto_luz_cliente"
                     placeholder="0.00">

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="gasto_luz_cliente_error"></div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="gasto_agua_cliente">Agua (*)</label>
              <input type="text" class="form-control" name="gasto_agua_cliente" id="gasto_agua_cliente"
                     placeholder="0.00">

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="gasto_agua_cliente_error"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="gasto_cable_cliente">Cable (*)</label>
              <input type="text" class="form-control" name="gasto_cable_cliente" id="gasto_cable_cliente"
                     placeholder="0.00">

              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="name" data-validator="notEmpty" id="gasto_cable_cliente_error"></div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label" for="gasto_otro_cliente">Otros gastos (*)</label>
              <input type="text" class="form-control" name="gasto_otro_cliente" id="gasto_otro_cliente"
                     placeholder="0.00">

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
                     placeholder="admin@admin.com"/>

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

            <table class="table table-bordered border-top table-hover">
              <thead>
              <tr>
                <th>Teléfono</th>
                <th></th>
              </tr>
              </thead>
              <tbody id="lista-telefonos-cliente">
              <tr>
                <td colspan="2">No hay resultados</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>