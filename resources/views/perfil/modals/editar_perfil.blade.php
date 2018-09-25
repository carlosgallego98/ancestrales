<div class="modal fade" id="modalEditarPerfil" role="modal" aria-labelledby="Editar Perfil" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="h4-responsive font-weight-bold">Editar Perfil</h4>
                <img class="hoverable img-modal" src="/storage/subidas/fotos_perfil/{{Auth::user()->foto_perfil}}" alt="Foto de {{Auth::user()->nombres}}"
                    id="avatar" alt="Foto de {{Auth::user()->nombres}}">
            <form action="{{url('/actualizar-avatar')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type='file' id="input-imagen" name="input-imagen" accept="image/*" class="hidden"
                    onchange="readURL(this)" />
                    <button href="#" id="btn-cambiar-foto" class="btn btn-primary hidden" type="submit">Guardar</button>
            </form>
                <hr>
            <form action="{{ url( '/actualizar-perfil', Auth::user() ) }}" method="POST">
                    @csrf
                <input type="text" value="{{Auth::user()->id}}" name="id_usuario" class="hidden">
                    <div class="form-row">
                        <div class="md-form col-md-6">
                            <label for="nombres">Nombres</label>
                            <input type="text" value="{{Auth::user()->nombres}}" class="form-control" name="nombres" id="nombres">
                        </div>

                        <div class="md-form col-md-6">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" value="{{Auth::user()->apellidos}}" class="form-control" name="apellidos"
                                id="apellido">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="md-form col-md-8">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" value="{{Auth::user()->correo}}" class="form-control" name="correo" id="correo">
                        </div>
                        <div class="md-form col-md-4">
                            <label for="direccion">Direccion</label>
                            <input type="text" value="{{Auth::user()->direccion}}" class="form-control" name="direccion"
                                id="direccion">
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
            $('#btn-cambiar-foto').removeClass('hidden');

        }
    }

    $('#avatar').click(() => {
        $('#input-imagen').click();
    })

</script>




































































@endpush
