<ul class="nav d-flex mt-2 justify-content-between">
    <li></li>
    <li class="nav-item">
        <a class="btn btn-light active" aria-current="page" href="/">Inicio</a>
    </li>
    <li class="nav-item">
        <a class="btn btn-light" href="/crud/create">Agregar alumno nuevo</a>
    </li>
    <li class="nav-item">
        <a class="btn btn-light" href="/crud/tabla">Alumnos a detalle</a>
    </li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>

    <li class="nav-item">
        <a class="btn btn-warning" href="{{ route('registrarUsuario') }}">
            Registar nuevo Admin
        </a>
        <a href="{{ route('logout') }}" class=" btn btn-danger"> Salir del sistema </a>
    </li>
    <li>

    </li>

</ul>
