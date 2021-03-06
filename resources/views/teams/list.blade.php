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
                <th scope="col">Institución</th>
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
                    <td>@if($team->participants->first() != null){{ $team->participants->first()->name }}@endif</td>
                    <td>@if($team->participants->first() != null){{ $team->participants->first()->school }}@endif</td>
                    @if($hide < 2)<td> {{ $team->confirmed_at }} </td>@endif
                    @if($hide < 1)<td> {{ $team->approved_at }} </td>@endif
                    <td>
                        <a class="btn btn-info" href="{{ route('teams.show', $team->id) }}">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif