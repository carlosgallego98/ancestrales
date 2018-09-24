<div class="modal fade" id="modalEditarPerfil" role="modal" aria-labelledby="Editar Perfil" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="h4-responsive font-weight-bold">Editar Perfil</h4>
                <img class="hoverable img-modal" src="https://casafranciscanaoutreach.org/wp-content/uploads/2016/09/generic_avatar.jpg"
                    id="avatar" alt="Foto de {{Auth::user()->nombres}}">
                <hr>
                <form action="{{url('/actualizar-perfil')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type='file' id="input-imagen" name="input-imagen" accept="image/*" class="hidden" onchange="readURL(this)" />
                    <div class="form-row">
                        <div class="md-form col-md-6">
                            <label for="nombres">Nombres</label>
                            <input type="text" value="{{Auth::user()->nombres}}" class="form-control" name="nombres" id="nombres">
                        </div>

                        <div class="md-form col-md-6">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" value="{{Auth::user()->apellidos}}" class="form-control" name="apellidos" id="apellido">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="md-form col-md-8">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" value="{{Auth::user()->correo}}" class="form-control" name="correo" id="correo">
                        </div>
                        <div class="md-form col-md-4">
                            <label for="direccion">Direccion</label>
                            <input type="text" value="{{Auth::user()->direccion}}" class="form-control" name="direccion" id="direccion">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#avatar')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);

        }
    }

    $('#avatar').click(() => {
        $('#input-imagen').click()
    })

</script>






























































@endpush