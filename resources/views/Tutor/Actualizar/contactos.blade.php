@extends('Panel.app')

{{-- Links CSS --}}
@section('css')
    <link href="{{ asset('css/formulario.css') }}" rel="stylesheet">
@endsection


@section('menu')
    <a class="nav-link" href="#">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        Principal
    </a>

    <div class="sb-sidenav-menu-heading">Tutorias</div>
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
        Categorias
        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="#">Categoria 1</a>
            <a class="nav-link" href="#">Categoria 2</a>
        </nav>
    </div>
@endsection

@section('contenido')

<h3> {{ $bibliotecas[$id_biblioteca]->nombreMatutino }} </h3>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- Marca error la llamada a la accion del controlador  SI es el id correcto: '1/2' --}}
{{-- <h3> {{ $biblioteca[$id_biblioteca]->id }} </h3> --}}
    <form method="POST" action="{{ route('contactos.update',$biblioteca[$id_biblioteca]->id) }}" class="formulario" id="formulario">
        <h6>Responsable del Aula</h6><br>
        <div>
            <label for="nombre_responsable" class="formulario__label">Nombre</label>
            <input type="text" class="formulario__input" name="nombre_responsable" id="nombre_responsable" value="{{ $biblioteca[$id_biblioteca]->nombre_responsable }}">{{-- old() --}}
        </div>
        <div>
            <label for="cargo_responsable" class="formulario__label">Cargo</label>
            <input type="text" class="formulario__input" name="uscargo_responsableuario" id="cargo_responsable" value="{{ $biblioteca[$id_biblioteca]->cargo_responsable }}">
        </div>

        <div>
            <label for="telefono_responsable" class="formulario__label">Teléfono</label>
            <input type="text" class="formulario__input" name="telefono_responsable" id="telefono_responsable" value="{{ $biblioteca[$id_biblioteca]->telefono_responsable }}">
        </div>

        <div>
            <label for="celular_responsable" class="formulario__label">Celular</label>
            <input type="text" class="formulario__input" name="celular_responsable" id="celular_responsable" value="{{ $biblioteca[$id_biblioteca]->celular_responsable }}">
        </div>

        <div>
            <label for="correo_responsable" class="formulario__label">Correo</label>
            <input type="text" class="formulario__input" name="correo_responsable" id="correo_responsable" value="{{ $biblioteca[$id_biblioteca]->correo_responsable }}">
        </div><br>




        <h6>Contacto Municipal /Director:</h6><br>
        <div>
            <label for="nombre_encargado" class="formulario__label">Nombre</label>
            <input type="text" class="formulario__input" name="nombre_encargado" id="nombre_encargado" value="{{ $biblioteca[$id_biblioteca]->nombre_encargado }}">
        </div>
        <div>
            <label for="cargo_encargado" class="formulario__label">Cargo</label>
            <input type="text" class="formulario__input" name="cargo_encargado" id="cargo_encargado" value="{{ $biblioteca[$id_biblioteca]->cargo_encargado }}">
        </div>

        <div>
            <label for="telefono_encargado" class="formulario__label">Teléfono</label>
            <input type="text" class="formulario__input" name="telefono_encargado" id="telefono_encargado" value="{{ $biblioteca[$id_biblioteca]->telefono_encargado }}">
        </div>

        <div>
            <label for="celular_encargado" class="formulario__label">Celular</label>
            <input type="text" class="formulario__input" name="celular_encargado" id="celular_encargado" value="{{ $biblioteca[$id_biblioteca]->celular_encargado }}">
        </div>

        <div>
            <label for="correo_encargado" class="formulario__label">Correo</label>
            <input type="text" class="formulario__input" name="correo_encargado" id="correo_encargado" value="{{ $biblioteca[$id_biblioteca]->correo_encargado }}">
        </div><br>

    </form>
        <div class="formulario__grupo formulario__grupo-btn-enviar">
            <button type="submit" class="formulario__btn" >
                Guardar
            </button>
            <button type="submit"  class="formulario__btn" onclick="location.href='{{ route('tutor.index') }}'">
                Cancelar
            </button>
        </div>


@endsection
{{-- Scripts JS --}}

@section('scripts')
    <script src="js/formulario.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
@endsection