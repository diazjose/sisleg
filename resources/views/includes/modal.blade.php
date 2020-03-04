
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
                        <option>Sección</option>
                        <option>Dpto. SA</option>
                        <option>Dpto. Asesoría</option>
                        <option>Dpto. Contable</option>
                        <option>Despacho</option>
                        <option>Legales</option>
                        <option>Archivo del Gobierno</option>
                        <option>Dpto. Asc. Civiles</option>

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
<div class="modal fade" id="abrirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title" id="exampleModalCenterTitle"><strong>Ubicacion de Expediente</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            seguimiento
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>