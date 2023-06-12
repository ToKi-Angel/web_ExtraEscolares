<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.css">
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
    <style>
        [class*="btn"] {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: #ffffff;
            background-color: #337ab7;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        [class*="btn"]:hover {
            background-color: #23527c;
            background-image: url("https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExNTgzY2UyNzFhMmJjNjhhYTU2ZjFmOWY3OTRmMzc3Yjg4OGI4MTdjYSZlcD12MV9pbnRlcm5hbF9naWZzX2dpZklkJmN0PWc/IAb717kg5jMkMhNofp/giphy.gif");
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }

        .card {
            background-color: rgba(131, 239, 199, 0.509);
            text-decoration-color: white;
            text-emphasis-color: white;
            color: white;
        }

        body {
            position: relative;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        body:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("https://wallpapercave.com/wp/wp4809813.jpg");
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
            filter: blur(5px);
            z-index: -1;
        }

        .content {
            position: relative;
            z-index: 1;
            color: #ffffff;
            text-align: center;
        }
    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ $titulo }}</title>
</head>

<body>
    @include('sweetalert::alert')
    @include('shared/menu')
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                @yield('contenido')
            </div>
        </div>
    </div>
    <script>
        // Reemplazar la entrada actual en el historial con una nueva entrada
        history.replaceState(null, null, location.href);

        // Añadir una entrada adicional en el historial
        history.pushState(null, null, location.href);

        // Escuchar el evento "popstate" para detectar cuando el usuario intenta regresar
        window.addEventListener('popstate', function() {
            // Navegar hacia la página que deseas cuando el usuario intenta regresar
            window.location.href = '/inicio';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>
