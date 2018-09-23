<div class="modal fade" id="modalEditarPerfil" role="modal" aria-labelledby="Editar Perfil" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="h4-responsive font-weight-bold">Editar Perfil</h4>

                <div action="#" method="post">
                    <div class="text-center">
                        <form action="#" method="post" id="form-imagen" class="hidden">
                            <input type="file" name="input-imagen" id="input-imagen">
                        </form>

                        <img class="hoverable img-modal" src="https://casafranciscanaoutreach.org/wp-content/uploads/2016/09/generic_avatar.jpg"
                            id="avatar" alt="Foto de {{Auth::user()->nombres}}">

                        <nav class="d-flex py-2 justify-content-between links-modal-imagen">
                            <a href="#">Guardar</a>
                            <a href="#">Cancelar</a>
                        </nav>

                    </div>
                </div>
                <form action="#" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="md-form col-md-6">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" name="nombres" id="nombres">
                        </div>

                        <div class="md-form col-md-6">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" id="apellido">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="md-form col-md-8">
                            <label for="correo">Correo Electrónico</label>
                            <input type="text" class="form-control" name="correo" id="correo">
                        </div>
                        <div class="md-form col-md-4">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" name="direccion" id="direccion">
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary">Guardar</button>
                        <button class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(()=>{

    $('#avatar').click(()=>{
        $('#input-imagen').click()
    })

    $('#input-imagen').change(()=>{
    })
})

</script>






















































@endpush