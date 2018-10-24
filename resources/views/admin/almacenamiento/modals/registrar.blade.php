<div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarTitulo">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="modal-title text-bold" id="modalRegistrarTitulo">Actualizar Inventario</h3>
      <p class="text-muted">Ingresa el codigo de Pedido</p>
    </div>
    <div class="modal-body">
      <form id="form-codigo" action="{{url('/actualizar/inventario/modal')}}" method="post">
        @csrf
        <div class="form-group form-group-lg">
          <input name="codigo" type="text" placeholder="Codigo" class="form-control text-uppercase" id="recipient-name" maxlength="10" required>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      <button type="submit" class="btn btn-primary" form="form-codigo">Siguiente</button>
    </div>
  </div>
</div>
</div>
