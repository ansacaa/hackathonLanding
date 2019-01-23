@extends('layouts.admin')

@section('content')
<section>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-approved-tab" data-toggle="pill" href="#pills-approved" role="tab" aria-controls="pills-approved" aria-selected="true">Aprovados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-confirmed-tab" data-toggle="pill" href="#pills-confirmed" role="tab" aria-controls="pills-confirmed" aria-selected="false">Confirmados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-not-confirmed-tab" data-toggle="pill" href="#pills-not-confirmed" role="tab" aria-controls="pills-not-confirmed" aria-selected="false">Sin confirmar</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-approved" role="tabpanel" aria-labelledby="pills-approved-tab">
                    @include('teams.list', ['teams' => $teams->where('approved_at', '!=', null), 'hide' => 0])
                </div>
                <div class="tab-pane fade" id="pills-confirmed" role="tabpanel" aria-labelledby="pills-confirmed-tab">
                    @include('teams.list', ['teams' => $teams->where('confirmed_at', '!=', null)->where('approved_at', null), 'hide' => 1])
                </div>
                <div class="tab-pane fade" id="pills-not-confirmed" role="tabpanel" aria-labelledby="pills-not-confirmed-tab">
                    @include('teams.list', ['teams' => $teams->where('confirmed_at', null), 'hide' => 2])
                </div>
            </div>
        </div>
    </div>
</section>

@endsection