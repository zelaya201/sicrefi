<div class="row">
  <div class="col-lg-6 mb-4">
    <div class="card h-100">
      <div class="card-header pb-0">
        <span class="fw-bold">Información general</span>
        <hr class="my-2">
      </div>
      <div class="card-body">

        <div class="row">
          <div class="col-md-12 mb-3">
            <label class="form-label" for="id_cliente">Cliente (*)</label>
            <select class="" id="id_cliente">
              <option disabled selected> Seleccione un cliente</option>
              @foreach($clientes as $cliente)
                @if($cliente->incobrable != true)
                  <option value="{{ json_encode($cliente) }}">
                    {{ $cliente->dui_cliente }} - {{ $cliente->nombre_completo }}
                  </option>

                @else
                  <option value="{{ json_encode($cliente) }}" disabled>
                    {{ $cliente->dui_cliente }} - {{ $cliente->nombre_completo }} (Incobrable)
                  </option>
                @endif
              @endforeach
            </select>

            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="id_cliente_error"></div>
            </div>
          </div>
        </div>

        <div class="row" id="section_tipo_credito">
          <div class="col-md mb-3 text-center">
            <label class="form-label d-block" for="">Tipo de crédito</label>
            <div class="form-check form-check-inline" id="section_nuevo">
              <input class="form-check-input" type="radio" name="tipo_credito" id="check_nuevo" value="Nuevo" checked>
              <label class="form-check-label" for="inlineRadio1">Nuevo</label>
            </div>
            <div class="form-check form-check-inline" id="section_renovacion">
              <input class="form-check-input" type="radio" name="tipo_credito" id="check_renovacion" value="Renovación">
              <label class="form-check-label" for="inlineRadio3">Renovación</label>
            </div>
            <div class="form-check form-check-inline" id="section_refinan">
              <input class="form-check-input" type="radio" name="tipo_credito" id="check_refinan"
                     value="Refinanciamiento">
              <label class="form-check-label" for="inlineRadio2">Refinanciamiento</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-3">
            <label class="form-label" for="id_credito">Crédito a refinanciar/renovar</label>
            <input type="text" class="d-none" id="id_credito">
            <span class="form-control" id="input_credito">Información no disponible</span>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="id_credito_error"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="bienes">Bienes muebles (*)</label>
            <select class="form-select" id="bienes">
              <option disabled> No hay bienes disponibles</option>
            </select>

            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="bienes_error"></div>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label" for="valor_bienes">Valor de bienes $ (*)</label>
            <input type="text" class="form-control" name="valor_bienes" id="valor_bienes"
                   readonly
                   placeholder="0.00" onkeypress="return filterFloat(event,this);">

            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="valor_bienes_error"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="referencias">Referencias (*)</label>
            <select class="form-select" id="referencias">
              <option disabled> Seleccione una referencia</option>
            </select>

            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="referencias_error"></div>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label" for="id_negocio">Negocio</label>
            <select class="form-select" name="id_negocio" id="id_negocio">
            </select>

            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="id_negocio_error"></div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="col-lg-6 mb-4">
    <div class="card h-100">
      <div class="card-header pb-0">
        <span class="fw-bold">Datos del crédito</span>
        <hr class="my-2">
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="monto_neto_credito">Monto (*)</label>
            <input type="text" class="form-control" name="monto_neto_credito" id="monto_neto_credito"
                   placeholder="0.00" onkeypress="return filterFloat(event,this);">

            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="monto_neto_credito_error"></div>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label" for="tasa_interes_credito">Tasa de interés % (*)</label>
            <input type="text" class="form-control" name="tasa_interes_credito" id="tasa_interes_credito"
                   onkeypress="return filterFloatPercent(event,this);"
                   placeholder="0.0000%"/>

            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="tasa_interes_credito_error"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="frecuencia_credito">Frecuencia de pago (*)</label>
            <select class="form-select" name="frecuencia_credito" id="frecuencia_credito">
              <option value="">Seleccione</option>
              <option value="Diario">Diario</option>
              <option value="Semanal">Semanal</option>
              <option value="Quincenal">Quincenal</option>
              <option value="Mensual">Mensual</option>
            </select>

            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="frecuencia_credito_error"></div>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label" for="n_cuotas_credito">Plazo (*)</label>
            <input type="number" class="form-control" name="n_cuotas_credito" id="n_cuotas_credito"
                   placeholder="0" min="2" max="100" value="2">

            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="n_cuotas_credito_error"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-3">
            <label class="form-label" for="fech_primer_cuota">Fecha de primer cuota (*)</label>
            <input type="date" class="form-control" name="fech_primer_cuota" id="fech_primer_cuota"
                   pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy"
                   min="{{ date('Y-m-d', strtotime('+1 day')) }}" max="{{ date('Y-m-d', strtotime('+1 month')) }}">

            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
              <div data-field="name" data-validator="notEmpty" id="fech_primer_cuota_error"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="deuda_credito">Deuda $</label>
            <input class="d-none deuda_credito" name="deuda_credito" id="deuda_credito" value="0.00">
            <span class="form-control deuda_credito" id="deuda_credito">0.00</span>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label" for="monto_credito">Monto a pagar $</label>
            <input class="d-none monto_credito" name="monto_credito" id="monto_credito" value="0.00">
            <span class="form-control monto_credito">0.00</span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="desembolso_credito">Desembolso $</label>
            <input type="text" class="d-none desembolso_credito" name="desembolso_credito" id="desembolso_credito"
                   value="0.00">
            <span class="form-control desembolso_credito">0.00</span>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label" for="monto_cuota_credito">Cuota $</label>
            <input type="text" class="d-none monto_cuota_credito" name="monto_cuota_credito" id="monto_cuota_credito"
                   value="0.00">
            <span class="form-control monto_cuota_credito">0.00</span>
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

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header pb-0">
        <span class="fw-bold">Plan de pagos</span>
        <hr class="my-2">
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="table-responsive">
              <table class="table table-hover align-middle text-center" id="tabla_cuotas">
                <thead class="table-light">
                <tr>
                  <th scope="col">N°</th>
                  <th scope="col">Fecha de pago</th>
                  <th scope="col">Capital</th>
                  <th scope="col">Interés</th>
                  <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody id="datos_cuotas">
                <tr>
                  <td colspan="5">No hay cuotas disponibles</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
