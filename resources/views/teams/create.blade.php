@extends('layouts.master')

@section('content')
<div class="main">
    <section class="module bg-dark-30 about-page-header" data-background="{{ asset('assets/images/hackPuebla.jpg') }}">
        <div class="container">
            <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt mb-0">Registro</h1>
            </div>
            </div>
        </div>
        </section>
        <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h4 class="font-alt mb-0">Formato</h4>
                    <hr class="divider-w mt-10 mb-20">
                    <form class="form" method="POST" action="{{ route('teams.store') }}" role="form" enctype="multipart/form-data">
                        @csrf
                        <h4>Información del equipo</h4>
                        <div class="form-group">
                            <input class="form-control input-lg @if($errors->has('name'))is-invalid @endif" type="text" name="name" id="name" max="100" placeholder="Nombre del equipo" value="{{ old('name') }}"/>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <input class="form-control input-lg @if($errors->has('email'))is-invalid @endif" type="email" name="email" id="email" max="255" placeholder="Correo electronico" value="{{ old('email') }}"/>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <input class="form-control input-lg @if($errors->has('phone'))is-invalid @endif" type="text" name="phone" id="phone" max="20" placeholder="Número telefónico" value="{{ old('phone') }}"/>
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>

                        <hr class="divider-w mt-10 mb-20">
                        <h4>Integrantes</h4>
                        
                        @for ($i = 1; $i <= 4; $i++)
                            <div>
                                <h5>@if($i==1){{'Capitán'}}@else{{'Integrante '.$i}}@endif</h5>
                                <div class="form-group">
                                    <input class="form-control input-lg @if($errors->has('names.'.$i))is-invalid @endif" type="text" name="names[{{$i}}]" max="100" placeholder="Nombre del capitán" value="{{ old('names.'.$i) }}"/>
                                    @if($errors->has('names.'.$i))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('names.'.$i) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg @if($errors->has('schools.'.$i))is-invalid @endif" type="text" name="schools[{{$i}}]" max="100" placeholder="Escuela" value="{{ old('schools.'.$i) }}"/>
                                    @if($errors->has('schools.'.$i))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('schools.'.$i) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha de nacimiento</label>
                                        <input class="form-control input-lg @if($errors->has('birthdates.'.$i))is-invalid @endif" type="date" name="birthdates[{{$i}}]" min="12/31/2002" placeholder="Fecha de nacimiento" value="{{ old('birthdates.'.$i) }}"/>
                                        @if($errors->has('birthdates.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('birthdates.'.$i) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-bottom: 25px;">
                                    <div class="form-group">
                                        <label>Documento que acreedita estatus de estudiante</label>
                                        <input class="form-control input-lg @if($errors->has('files.'.$i))is-invalid @endif" type="file" name="files[{{$i}}]" min="12/31/2002" placeholder="Documento" value="{{ old('files.'.$i) }}"/>
                                        <p>Archivo pdf de máximo 3MB</p>
                                        @if($errors->has('files.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('files.'.$i) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endfor

                        <div class="form-group">
                            <p>Una vez que te registres, revisa tu correo para confirmar tu cuenta.</p>
                            <a class="btn btn-border-d" href="{{ route('index') }}">Regresar</a>
                            <input class="btn btn-b" type="submit" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection