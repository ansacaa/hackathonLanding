<!-- Navigation bar -->
<nav class="navbar navbar-custom @if(Route::currentRouteName() == 'index'){{ 'navbar-transparent' }}@endif navbar-fixed-top one-page" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('index') }}">Hack Puebla</a>
        </div>
        <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('index') }}#totop">Inicio</a></li>
                <li><a class="section-scroll" href="@if(Route::currentRouteName() == 'index'){{'#inscriptions'}}@else{{ url('/#inscriptions') }}@endif">Proceso</a></li>
                <li><a class="section-scroll" href="@if(Route::currentRouteName() == 'index'){{'#event'}}@else{{ url('/#event') }}@endif">El evento</a></li>
                <li><a class="section-scroll" href="@if(Route::currentRouteName() == 'index'){{'#info'}}@else{{ url('/#info') }}@endif">Información</a></li>
                <li><a class="section-scroll" href="@if(Route::currentRouteName() == 'index'){{'#location'}}@else{{ url('/#location') }}@endif">Localización</a></li>
                <li><a class="section-scroll" href="@if(Route::currentRouteName() == 'index'){{'#gallery'}}@else{{ url('/#gallery') }}@endif">Galería</a></li>
                <li><a class="section-scroll" href="@if(Route::currentRouteName() == 'index'){{'#contacto'}}@else{{ url('/#contacto') }}@endif">Contacto</a></li>
                <li><a class="section-scroll" href="{{ route('teams.create')}}">Inscripciones</a></li>
                <a id="mlh-trust-badge" style="display:block;max-width:100px;min-width:60px;position:fixed;right:50px;top:0;width:10%;z-index:10000" href="https://mlh.io/seasons/na-2019/events?utm_source=na-hackathon&utm_medium=TrustBadge&utm_campaign=2019-season&utm_content=white" target="_blank"><img src="https://s3.amazonaws.com/logged-assets/trust-badge/2019/mlh-trust-badge-2019-white.svg" alt="Major League Hacking 2019 Hackathon Season" style="width:100%"></a>
            </ul>
        </div>
    </div>
</nav>
<!-- Navigation bar end -->