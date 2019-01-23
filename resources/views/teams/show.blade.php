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
                        @endif
                        @if ($team->approved_at != null)
                        <tr>
                            <th scope="row">Aprovado</th>
                            <td>{{ $team->approved_at }}</td>
                        </tr>
                        @else
                        <tr>
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
                            <td></td>
                        </tr>
                        @endif
                        <tr>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Editar</button></td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('teams.delete', $team->id) }}"
                                    onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                    Eliminar
                                </a>
                    
                                <form id="delete-form" action="{{ route('teams.delete', $team->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
                            <th scope="col">Archivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($team->people as $person)
                            <tr>
                                <td>{{ $person->name }}</td>
                                <td>{{ $person->birthdate->age }}</td>
                                <td>{{ $person->school }}</td>
                                <td><a href="{{asset($person->file)}}" target="blank">click</a></td>
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