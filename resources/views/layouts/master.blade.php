<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  
    Document Title
    =============================================
    -->
  <title>Hack Puebla 2019</title>
  <!--  
    Favicons
    =============================================
    -->
  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/images/favicons/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/images/favicons/apple-icon-60x60.pn') }}g">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/images/favicons/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/images/favicons/apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/images/favicons/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/images/favicons/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/images/favicons/apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/images/favicons/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/images/favicons/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/images/favicons/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicons/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('/manifest.json') }}">
  <meta name="msapplication-TileColor" content="#ffffff') }}">
  <meta name="msapplication-TileImage" content="{{ asset('assets/images/favicons/ms-icon-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">
  
  <!--  
    Stylesheets
    =============================================
    
    -->
  <!-- Default stylesheets-->
  <link href="{{ asset('assets/lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Template specific stylesheets-->
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
  <link href="{{ asset('assets/lib/animate.css/animate.css" rel="stylesheet') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
    crossorigin="anonymous">
  <link href="{{ asset('assets/lib/et-line-font/et-line-font.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/flexslider/flexslider.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/owl.carousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/simple-text-rotator/simpletextrotator.css') }}" rel="stylesheet">
  <!-- Main stylesheet and color file-->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link id="color-scheme" href="{{ asset('assets/css/colors/default.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/pnotify.custom.min.css') }}">
</head>

<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-color: black;">
  <main>
    <div class="page-loader">
      <div class="loader">Loading...</div>
    </div>

    @include('sections.nav')

    @yield('content')

    <div class="module-small bg-dark" id="contacto">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="widget">
              <h5 class="widget-title font-alt">Contacto</h5>
              <p>Para cualquier duda o pregunta sobre el evento, envíanos un mensaje.</p>
              <p>Teléfono: +52 222 455 5870</p>
              <p>Correo: saitc.puebla@gmail.com</p>
              <p>Facebook: <a href="https://www.facebook.com/SAITCPuebla/" target="_blank"> SAITC Puebla</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr class="divider-d">

    <footer class="footer bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p class="copyright font-alt">&copy; 2019&nbsp;<a href="https://www.facebook.com/SAITCPuebla/" target="_blank">SAITCPuebla</a>, All Rights Reserved</p>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </footer>
    <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
  </main>
  <!--  
    JavaScripts
    =============================================
    -->
  <script src="{{ asset('assets/lib/jquery/dist/jquery.js') }}"></script>
  <script src="{{ asset('assets/lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/lib/wow/dist/wow.js') }}"></script>
  <script src="{{ asset('assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js') }}"></script>
  <script src="{{ asset('assets/lib/isotope/dist/isotope.pkgd.js') }}"></script>
  <script src="{{ asset('assets/lib/imagesloaded/imagesloaded.pkgd.js') }}"></script>
  <script src="{{ asset('assets/lib/flexslider/jquery.flexslider.js') }}"></script>
  <script src="{{ asset('assets/lib/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/lib/smoothscroll.js') }}"></script>
  <script src="{{ asset('assets/lib/magnific-popup/dist/jquery.magnific-popup.js') }}"></script>
  <script src="{{ asset('assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins.js') }}"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBsrDSvsKz7rkIy5_Z_Uq1u7X7ghpgyIM&callback=initMap" type="text/javascript"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/map.js') }}"></script>
  <script src="{{ asset('assets/js/pnotify.custom.min.js') }}"></script>

  @include('sections.success')
  @include('sections.warning')
  @include('sections.error')
</body>

</html>