
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                              
            <!-- Modal Header -->
            <div class="modal-header bg-secondary text-white">
                <h4 class="modal-title"><strong>Editar Expediente</strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                                
            <!-- Modal body -->
            <div class="modal-body my-3">
                <form method="POST" action="{{route('exp_update')}}">
                    @include('includes.expedientes.form')
                </form>
            </div>
        </div>
    </div>
</div>  

<!-- Modal -->
<div class="modal fade" id="siguienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title" id="exampleModalCenterTitle"><strong>Paso Siguiente</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="POST" action="{{route('seg_create')}}">
                @csrf
                <input type="hidden" name="exp_id" value="{{$exp->id}}">
                <div class="form-group mx-2">
                    <label>Enviar a:</label>
                    <select class="form-control" name="lugar">
                        <option value="DIRECTOR">Director</option>
                        <option value="MESA">Mesa</option>
                        <option value="SECCION">Sección</option>
                        <option value="SA">Dpto. SA</option>
                        <option value="ASESORIA">Dpto. Asesoría</option>
                        <option value="CONTABLE">Dpto. Contable</option>
                        <option value="LEGALES">Legales</option>
                        <option value="CIVILES">Dpto. Civiles</option>
                        <option>Despacho</option>
                        <option>Legales</option>
                        <option>Archivo del Gobierno</option>
                    </select>
                </div>
                <!--
                <div class="form-group mx-2">
                    <label for="observacion-text" class="col-form-label">Observacion:</label>
                    <textarea class="form-control" id="message-text" name="observacion" value="" ></textarea>
                </div>
                -->
              <hr>
                <div class="form-group mx-2">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>        
      </div>
      
    </div>
  </div>
</div>

<!-- Modal de Seguimiento -->
<div class="modal fade" id="lugarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="mod-seg">
      <div class="modal-header text-white">
        <h5 class="modal-title" id="exampleModalCenterTitle"><strong id="lugar"></strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <div class="row mx-4">
            <div class="form-group col-6">
                <label><strong>Fecha de Ingreso</strong></label>
                <p id="ini"></p>
            </div>
            <div class="form-group col-6">
                <label><strong>Ultima Revision</strong></label>
                <p id="fin"></p>
            </div>
          </div>  
            <div class="form-group mx-4 col-8">
                <label><strong>Observacion</strong></label>
                <p id="obs"></p>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>