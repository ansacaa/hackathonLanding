@extends('layouts.admin')

@section('content')
<section>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-checked-tab" data-toggle="pill" href="#pills-checked" role="tab" aria-controls="pills-checked" aria-selected="true">Ingresados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-unchecked-tab" data-toggle="pill" href="#pills-unchecked" role="tab" aria-controls="pills-unchecked" aria-selected="false">No ingresados</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-checked" role="tabpanel" aria-labelledby="pills-checked-tab">
                    @include('teams.list', ['teams' => $teams->where('assisted_at', '!=', null), 'hide' => 2])
                </div>
                <div class="tab-pane fade" id="pills-unchecked" role="tabpanel" aria-labelledby="pills-unchecked-tab">
                    @include('teams.list', ['teams' => $teams->where('assisted_at', null), 'hide' => 2])
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('.data-table').DataTable();
} );
</script>
@endsection