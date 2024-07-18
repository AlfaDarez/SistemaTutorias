@extends('Panel.app')

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

<style>
    .form-container {
        max-width: 600px;
        margin: auto;
        padding: 2rem;
        border: 1px solid #000;
        border-radius: 5px;
    }
    .btn-custom {
        width: 100%;
        padding: 0.75rem;
    }
</style>

<div class="container mt-5">
    <div class="form-container">
        <h4 class="text-center mb-4">Llamada no efectiva</h4>
        <p><strong>{{$biblioteca->clavebdt}} {{$biblioteca->nombreMatutino}}</strong></p>
        <!-- Formulario -->
        <form action="{{route('guardar.buzon')}}" method="POST">
            @csrf <!-- Laravel CSRF Token -->
            <!-- Campo de selección de motivo -->
            <div class="form-group">
                <label for="motivo">Motivo</label>
                <select class="form-control" id="motivo" name="motivo" required>
                    <option value="" selected disabled>Seleccione</option>
                    <option value="No responde">No responde</option>
                    <option value="No localizado">No localizado</option>
                    <option value="Encargado ausente">Encargado ausente</option>
                </select>
            </div>
            <!-- Campo de observaciones -->
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea class="form-control" id="observaciones" name="observaciones" rows="4"></textarea>
            </div>
            <input type="hidden" name="id_biblioteca" value="{{$biblioteca->id}}">



            <!-- Botón de guardar -->
            <button type="submit" class="btn btn-primary btn-custom">Guardar</button>
        </form>
    </div>
</div>


@endsection
