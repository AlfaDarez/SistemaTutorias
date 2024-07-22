@extends('Panel.app')

{{-- Links CSS --}}
@section('css')
    <link href="{{ asset('css/formularioActualizar.css') }}" rel="stylesheet">
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

    <h3>TELEGRAM</h3>

    <form>
        <div class="formulario" id="" action="{{route('store.telegram')}}" method="POST">
            @csrf

            <h6>Campos</h6><br>
            <div>
                <label for="nombre" class="formulario__label">Nombre</label>
                <input type="text" class="formulario__input" name="nombre" id="nombre" >
            </div>

            <div>
                <label for="cargo" class="formulario__label">Cargo</label>
                <input type="text" class="formulario__input" name="cargo" id="cargo" >
            </div>

            <div>
                <label for="mensaje" class="formulario__label">Mensaje</label>
                <textarea name="mensaje" id="mensaje" required></textarea>
            </div>

    </div>

        <button type="submit" class="btn_guardar" >
            Guardar
        </button>

</form>

        <button  class="btn_cancelar" onclick="location.href='{{ route('tutor.index') }}'">
            Cancelar
        </button>






@endsection

{{-- Scripts JS --}}
@section('scripts')
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
@endsection
