<div class="modal fade" id="modalEditarPerfil" role="modal" aria-labelledby="Editar Perfil" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="h4-responsive font-weight-bold">Editar Perfil</h4>

                <div action="#" method="post">
                    <div class="text-center">
                        <form action="#" method="post" id="form-imagen" class="text-center d-flex flex-column">
                            <input type='file' id="input-imagen" name="input-imagen" accept="image/*" class="hidden"
                                onchange="readURL(this)" />
                            <img class="hoverable img-modal" src="https://casafranciscanaoutreach.org/wp-content/uploads/2016/09/generic_avatar.jpg"
                                id="avatar" alt="Foto de {{Auth::user()->nombres}}">
                            <div class="actiones-form hidden">
                                <a href="#" class="" id="guardar-foto" type="submit" class="links-modal-imagen">Guardar</a>
                            </div>

                        </form>


                    </div>
                </div>
                <hr>
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
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function readURL(input) {
        console.log(input)

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#avatar')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            $('#guardar-foto').removeClass('hidden');

        }
    }

    $('#avatar').click(() => {
        $('#input-imagen').click()
    })

</script>






















































@endpush
