<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('teams.update', $team->id) }}" method="POST">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar equipo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input name="name" id="name" type="text" class="form-control @if($errors->has('name'))is-invalid @endif" value="{{ $team->name }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input name="email" id="email" type="email" class="form-control @if($errors->has('email'))is-invalid @endif" max="255" value="{{ $team->email }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input name="phone" id="phone" type="text" class="form-control @if($errors->has('phone'))is-invalid @endif" max="20" value="{{ $team->phone }}">
                        @if($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>