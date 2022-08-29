@extends("layout.app")

@section("content")
    <nav class="navbar navbar-dark bg-dark ">
        <ul class="nav">
            <li class="nav-item">
                <router-link to="/" class="nav-link text-white">Crear Cita</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/citalist" class="nav-link text-white">Listado de citas</router-link>
            </li>
        </ul>
    </nav>
<div class="d-flex flex-column justify-content-center mt-3">
    <router-view></router-view>
</div>

@endsection