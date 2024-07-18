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

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    @foreach ($bibliotecas as $biblioteca )

    <a href="{{route('inicio.tutoria',$biblioteca->clavebdt)}}"> {{$biblioteca->clavebdt}}</a>

            @foreach ( $biblioteca->dependencias as $dependencia )
                {{$dependencia->nombre_encargado}}
            @endforeach

            <a href="{{route('llamada.buzon',$biblioteca->id)}}"> {{$biblioteca->Ultimocontacto($biblioteca->id)}}</a>


            @foreach ($biblioteca->contactoEfectivo as $contactoExitoso )
            <p style="color:blue">{{$contactoExitoso->seguimiento}}</p>
            @endforeach


            @foreach ( $biblioteca->sinContactos as $sinContacto )
            {{$sinContacto->observaciones}}
            @endforeach

    @endforeach

@endsection
