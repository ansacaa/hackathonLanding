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

                        <hr class="divider-w mt-10 mb-20">
                        <h4>Integrantes</h4>
                        
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="row">
                                <h5>@if($i==1){{'Capitán'}}@else{{'Integrante '.$i}}@endif</h5>
                                @if($i==1)
                                    <p>Este integrante será el contacto principal, a su correo se enviará toda la Información del registro.</p>
                                @endif
                                
                                <!-- Name -->
                                <div class="col-md-6" >
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg @if($errors->has('names.'.$i))is-invalid @endif"  
                                            name="names[{{$i}}]" max="100" placeholder="Nombre(s)" value="{{ old('names.'.$i) }}"/>
                                        @if($errors->has('names.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('names.'.$i) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Lastname -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg @if($errors->has('lastnames.'.$i))is-invalid @endif" 
                                            name="lastnames[{{$i}}]" max="100" placeholder="Apellido(s)" value="{{ old('lastnames.'.$i) }}"/>
                                        @if($errors->has('lastnames.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('lastnames.'.$i) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg @if($errors->has('emails.'.$i))is-invalid @endif"  
                                            name="emails[{{$i}}]" max="100" placeholder="Correo electrónico" value="{{ old('emails.'.$i) }}"/>
                                        @if($errors->has('emails.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('emails.'.$i) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg mask @if($errors->has('phones.'.$i))is-invalid @endif" name="phones[{{$i}}]" 
                                            max="100" placeholder="Teléfono" value="{{ old('phones.'.$i) }}" data-inputmask="'mask': '(999) 999 9999'"/>
                                        @if($errors->has('phones.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('phones.'.$i) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Gender -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control input-lg @if($errors->has('genders.'.$i))is-invalid @endif" 
                                            name="genders[{{$i}}]" value="{{ old('genders.'.$i) }}">
                                            
                                            <option value="" selected>Género</option>
                                            @foreach(Config::get('enums.genders') as $gender)
                                                <option value="{{ $gender }}" @if(old('genders.'.$i) === $gender) selected @endif>{{ $gender }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('genders.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('genders.'.$i) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Race -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control input-lg @if($errors->has('races.'.$i))is-invalid @endif" 
                                            name="races[{{$i}}]" max="100" placeholder="Género" value="{{ old('races.'.$i) }}">
                                            <option value="" selected>Raza o étnia</option>
                                            @foreach(Config::get('enums.races') as $race)
                                                <option value="{{ $race }}" @if(old('races.'.$i) === $race) selected @endif>{{ $race }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('races.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('races.'.$i) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Major -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="major form-control input-lg @if($errors->has('majors.'.$i))is-invalid @endif"  
                                            name="majors[{{$i}}]" max="100" placeholder="Programa o  carrera" value="{{ old('majors.'.$i) }}"/>
                                        @if($errors->has('majors.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('majors.'.$i) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- School -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select id="{{ $i }}" class="school form-control input-lg @if($errors->has('schools.'.$i))is-invalid @endif" 
                                            name="schools[{{$i}}]" value="{{ old('schools.'.$i) }}">
                                            <option value="" selected>Escuela</option>

                                            @foreach(Config::get('enums.schools') as $school)
                                                <option value="{{ $school }}">{{ $school }}</option>
                                            @endforeach
                                            @if(old('schools.'.$i))
                                                <option value="{{ old('schools.'.$i) }}" selected>{{ old('schools.'.$i) }}</option>
                                            @endif
                                            <option value="other">Otra</option>
                                        </select>
                                        @if($errors->has('schools.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('schools.'.$i) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Level -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control input-lg @if($errors->has('levels.'.$i))is-invalid @endif" 
                                            name="levels[{{$i}}]" id="levels[{{$i}}]"  value="{{ old('levels.'.$i) }}">

                                            <option value="" selected>Nivel máxmio de estudio</option>
                                            @foreach(Config::get('enums.study_levels') as $level)
                                                <option value="{{ $level }}" @if(old('levels.'.$i) === $level) selected @endif>{{ $level }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('levels.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('levels.'.$i) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Expected -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control input-lg @if($errors->has('expecteds.'.$i))is-invalid @endif" 
                                            name="expecteds[{{$i}}]" value="{{ old('expecteds.'.$i) }}">

                                            <option value="" selected>Año de graduación esperado</option>
                                            @for ($j = 2019; $j <= 2029; $j++)
                                                <option value="{{ $j }}" @if((int)old('expecteds.'.$i) === $j) selected @endif>{{ $j }}</option>
                                            @endfor
                                        </select>
                                        @if($errors->has('expecteds.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('expecteds.'.$i) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                
                                
                                <!-- Birthdates -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha de nacimiento</label>
                                        <input type="date" class="form-control input-lg @if($errors->has('birthdates.'.$i))is-invalid @endif"  
                                            name="birthdates[{{$i}}]" min="12/31/2002" placeholder="Fecha de nacimiento" value="{{ old('birthdates.'.$i) }}"/>
                                        @if($errors->has('birthdates.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('birthdates.'.$i) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Vegetarian -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>¿Requiere menú vegetariano?</label>
                                        <br />
                                        <input type="radio" name="vegetarians[{{$i}}]" value="1" @if(old('vegetarians.'.$i) == 1) checked @endif/> Sí
                                        <br />
                                        <input type="radio" name="vegetarians[{{$i}}]" value="0" @if(old('vegetarians.'.$i) == 0) checked @endif/> No
                                        
                                        @if($errors->has('vegetarians.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('vegetarians.'.$i) }}
                                            </div>
                                        @endif

                                        @if($errors->has('vegetarians'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('vegetarians') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Document -->
                                <div class="col-md-12" style="margin-bottom: 25px;">
                                    <div class="form-group">
                                        <label>Documento que acreedita estatus de estudiante</label>
                                        <input type="file" class="form-control input-lg @if($errors->has('files.'.$i))is-invalid @endif"  
                                            name="files[{{$i}}]" min="12/31/2002" accept=".pdf" value="{{ old('files.'.$i) }}"/>
                                        <p>Archivo .pdf de máximo 2MB, se recomienda creedencial escolar vigente.</p>
                                        
                                        @if($errors->has('files.'.$i))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('files.'.$i) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endfor

                        <!-- Conduct -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="checkbox" class="@if($errors->has('conduct'))is-invalid @endif" name="conduct" value="true">
                                <label class="form-check-label">He leído y estoy de acuerdo con el <a href="https://static.mlh.io/docs/mlh-code-of-conduct.pdf">Código de Conducta de la MLH.</a></label>
                                @if($errors->has('conduct'))
                                    <div class="invalid-feedback">
                                        Debes de aceptar el Código de Conducta de la MLH.
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Data Sharing -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-check-label">Autorizo que compartan mi información de registro con fines de administración del evento, 
                                    clasificación, administración de la MLH, correos informativos pre- y post-evento y mensajes ocasionales sobre hackathones 
                                    de acuero a la <a href="https://mlh.io/privacy"></a>Política de Privacidad de la MLH</a>. Además, acepto los términos de 
                                    ambas, los y la <a href="https://mlh.io/privacy"></a>Política de Privacidad de la MLH</a>.
                                </label>
                                <input type="checkbox" class="@if($errors->has('terms'))is-invalid @endif" name="terms" value="true">
                                
                                @if($errors->has('terms'))
                                    <div class="invalid-feedback">
                                        Debes aceptar la política de privacidad de la MLH y los terminos y condiciones del concurso.
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <p>Una vez concluido el registro, revisa el correo del capitán para confirmer tu solicitud.</p>
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

@section('scripts')
<script type="text/javascript">
schoolFlag = false;
majorFlag = false;

$(document).ready(function(){
  $(".mask").inputmask();

  $(".school").change((e) => {
    var id = e.target.getAttribute("id");
    var value = $("#"+ id + " option:selected").val();
    
    if(value !== null && value === 'other') {
        var school = prompt("Ingresa el nombre de tu escuela:", "");
        if(id == 1) {
            $(".school").append('<option value="'+school+'" selected>'+school+'</option>');
        }
        else {
            $("#" + id).append('<option value="'+school+'" selected>'+school+'</option>');
        }
    }
    else {
        if(id == 1 && !flag) {
            $(".school").val(value);
            flag = true;
        }
    }
  });

  $(".major").change((e) => {
      console.log(e.target.val);
    if(!majorFlag) {
        $(".major").val(e.target.value);
        majorFlag = true;
    }
  });
});
</script>
@endsection