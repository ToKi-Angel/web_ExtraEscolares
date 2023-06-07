<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Agregar Usuario</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Agregar un Admin nuevo</h5>
                        <form action="agregarNuevo" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label class="form-label">Nombre Comleto</label>
                                <input type="text" class="form-control form-control-lg"
                                    placeholder="Nombre Apellido Paterno Apellido Materno" name="nombreCompleto"
                                    id="nombreCompleto" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Correo electronico</label>
                                <input type="email" class="form-control form-control-lg"
                                    placeholder="correo@dominio.com" name="email" id="email" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Usuario</label>
                                <input type="text" class="form-control form-control-lg"
                                    placeholder="Nombre de usuario" name="name" id="name" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg"
                                    placeholder="Una contraseña" name="password" required />
                            </div>
                            <button class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        history.replaceState(null, null, location.href);
        history.pushState(null, null, location.href);
        window.addEventListener('popstate', function() {
            window.location.href = '/inicio';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>
