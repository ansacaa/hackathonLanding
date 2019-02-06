<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hack Puebla</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pnotify.custom.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flipclock.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
  </head>

  <body>
    <header>
    <nav class="navbar navbar-expand-md navbar-dark static-top bg-dark" style="margin-bottom: 50px;">
      <a class="navbar-brand" href="#">Hack Puebla</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('index') }}">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('teams') }}">Equipos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('teams.assistance') }}">Asistencia</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item active" style="margin-right: 20px;">
                    <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item pull-right">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
      </div>
    </nav>
    </header>
    <main role="main" class="container">        
        <div class="clock" style="margin: 0px auto 30px auto; max-width:90%; width: 650px;"></div> 
        @yield('content')
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/pnotify.custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/flipclock.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment-timezone-with-data.min.js') }}"></script>
    <script src="{{ asset('assets/js/timer.js') }}"></script>
    @yield('scripts')

    @include('sections.success')
    @include('sections.warning')
    @include('sections.error')
  </body>
</html>
