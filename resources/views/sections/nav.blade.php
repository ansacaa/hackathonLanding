<!-- Navigation bar -->
<nav class="navbar navbar-custom navbar-transparent navbar-fixed-top one-page" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Hack Puebla</a>
        </div>
        <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#totop">Inicio</a></li>
                <li><a class="section-scroll" href="@if(Route::currentRouteName() == 'index'){{'#inscriptions'}}@else{{ url('/#inscriptions') }}@endif">Inscripciones</a></li>
                <li><a class="section-scroll" href="@if(Route::currentRouteName() == 'index'){{'#event'}}@else{{ url('/#event') }}@endif">El evento</a></li>
                <li><a class="section-scroll" href="@if(Route::currentRouteName() == 'index'){{'#info'}}@else{{ url('/#info') }}@endif">Información</a></li>
                <li><a class="section-scroll" href="@if(Route::currentRouteName() == 'index'){{'#location'}}@else{{ url('/#location') }}@endif">Localización</a></li>
                <li><a class="section-scroll" href="@if(Route::currentRouteName() == 'index'){{'#gallery'}}@else{{ url('/#gallery') }}@endif">Galería</a></li>
                <li><a class="section-scroll" href="@if(Route::currentRouteName() == 'index'){{'#contacto'}}@else{{ url('/#contacto') }}@endif">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navigation bar end -->