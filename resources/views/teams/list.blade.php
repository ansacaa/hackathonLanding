@if(sizeof($teams) > 0)
<div class="table-responsive">
    <table class="table data-table display">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col">Capitán</th>
                @if($hide < 2)<th scope="col">Confirmado</th>@endif
                @if($hide < 1)<th scope="col">Aprovado</th>@endif
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
                <tr>
                    <th scope="row">{{ $team->id }}</th>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->phone }}</td>
                    <td>{{ $team->email }}</td>
                    <td>{{ $team->people->first()->name }}</td>
                    @if($team->confirmed_at != null)<td> {{ $team->confirmed_at }} </td>@endif
                    @if($team->approved_at != null)<td> {{ $team->approved_at }} </td>@endif
                    <td>
                        <a class="btn btn-info" href="{{ route('teams.show', $team->id) }}">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif