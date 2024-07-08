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
{{$bibliotecas}}

@endsection
