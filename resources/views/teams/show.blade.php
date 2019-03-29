@extends('layouts.admin')

@section('content')
@include('teams.edit', ['team' => $team])

<section>
    <div class="row">
        <div class="col-md-4">
            <div class="table-responsive">
                <h2>Datos</h2>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th scope="row">Nombre</th>
                            <td>{{ $team->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Correo</th>
                            <td>{{ $team->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Teléfono</th>
                            <td>{{ $team->phone }}</td>
                        </tr>
                        @if ($team->confirmed_at != null)
                        <tr>
                            <th scope="row">Confirmado</th>
                            <td>{{ $team->confirmed_at }}</td>
                        </tr>
                        @else
                        <tr>
                            <th scope="row">Confirmado</th>
                            <td><a class="btn btn-warning text-white" href="{{ route('teams.resend', $team->id) }}" >Reenviar correo</a></td>
                        </tr>
                        @endif
                        @if ($team->approved_at != null)
                        <tr>
                            <th scope="row">Aprobado</th>
                            <td>{{ $team->approved_at }}</td>
                        </tr>
                        @else
                        <tr>
                            <th scope="row">Aprobado</th>
                            <td>
                                <a class="btn btn-success" href="{{ route('teams.approve', $team->id) }}"
                                    onclick="event.preventDefault(); document.getElementById('approve-form').submit();">
                                    Aprobar
                                </a>
                    
                                <form id="approve-form" action="{{ route('teams.approve', $team->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('PUT')
                                </form>
                            </td>
                        </tr>
                        @endif
                        @if ($team->assisted_at != null)
                        <tr>
                            <th scope="row">Ingreso</th>
                            <td>{{ $team->assisted_at }}</td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td><a class="btn btn-danger" href="{{ route('teams.checkout', $team->id) }}">Cancelar ingreso</a></td>
                        </tr>
                        @else
                        <tr>
                            <th scope="row"></th>
                            <td><a class="btn btn-success" href="{{ route('teams.manualCheckin', $team->id) }}">Ingresar</a></td>
                        </tr>
                        @endif

                        <tr>
                            <td>
                                @if($team->assisted_at == null)
                                <a class="btn btn-danger" href="{{ route('teams.delete', $team->id) }}"
                                    onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                    Eliminar
                                </a>
                    
                                <form id="delete-form" action="{{ route('teams.delete', $team->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Editar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <td><a class="btn btn-info" href="{{ route('teams') }}">Regresar</a></td>
            </div>
        </div>
        <div class="col-md-8">
            <h2>Integrantes</h2>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Institución</th>
                            <th scope="col">Playera</th>
                            <th scope="col">Documento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($team->participants as $participant)
                            <tr>
                                <td>{{ $participant->name }}</td>
                                <td>{{ $participant->birthdate->age }}</td>
                                <td>{{ $participant->school }}</td>
                                <td>{{ $participant->tshirt }}</td>
                                <td><a href="{{asset($participant->file)}}" target="blank">click</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
@if(session('editing'))
    <script type="text/javascript">
        $("#editModal").modal()
    </script>
@endif    
@endsection