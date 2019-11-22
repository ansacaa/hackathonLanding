<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Confirmación de Correo Electronico</title>
    <style type="text/css">
        .team-section {
            background-color: #87ceeb;
            padding-top:2em; 
            padding-bottom:2em;
            padding-left:0.5em;
            color: #ffffff;
            border-radius: 10px;
        }

        .content-section {
            color: #000000;
            margin-left: 4em;
        }

        .logo-image{
            width: 350px;
        }
  </style>
</head>
<body>
    <div class="container-fluid">
        <div>
            <img class="logo-image" src="{{ asset('assets/images/hack2020logonegro.png') }}" alt="Hack Puebla 5.0"/>
            <div class="team-section">
                <h1>Listo equipo {{ $team->name }}!<h1> 
            </div>
            <div class="content-section">
                <h5>Su proseso de registro esta casi listo.</h5>
                <h5>Por favor confirma tu correo en el siguiente link para que tu solicitud sea revisada por nuestro equipo:</h5>
                <a href="{{$confirmLink}}">
                    {{$confirmLink}}
                </a>
            </div>
        </div>
    </div>      
</body>
</html>