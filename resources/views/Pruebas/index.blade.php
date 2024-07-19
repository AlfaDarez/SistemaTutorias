{{-- @extends('Panel.app') --}}



{{-- @section('menu')
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
@endsection --}}

{{-- @section('contenido')
    <h1>Contenido</h1>

@endsection --}}

{{-- Tabla principal --}}
<link rel="stylesheet" type="text/css" href="{{ asset('dist/pivot.css') }}">

<script type="text/javascript" src="ext/d3.v3.min.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="ext/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="ext/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="dist/pivot.js"></script>
<script type="text/javascript" src="dist/gchart_renderers.js"></script>
<script type="text/javascript" src="dist/d3_renderers.js"></script>
<script type="text/javascript" src="ext/jquery.ui.touch-punch.min.js"></script>


<style>
    * {font-family: Verdana;}
    .node {
        border: solid 1px white;
        font: 10px sans-serif;
        line-height: 12px;
        overflow: hidden;
        position: absolute;
        text-indent: 2px;
    }
</style>

<h1>Contenido</h1>

{{-- Salida de  --}}
<div id="output" style="margin: 80px;"></div>

<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart", "charteditor"]});
    $(function(){
        var derivers = $.pivotUtilities.derivers;

        $.getJSON("mps.json", function(mps) {
            $("#output").pivotUI(mps, {
                renderers: $.extend(
                    $.pivotUtilities.renderers,
                    $.pivotUtilities.gchart_renderers,
                    $.pivotUtilities.d3_renderers
                    ),
                // Atributos derivados (posibles funciones a crear)
                derivedAttributes: {
                    "Edad Bin": derivers.bin("Edad", 10),
                    "Genero Imbalance": function(mp) {
                        return mp["Genero"] == "Masculino" ? 1 : -1;
                    }
                },
                cols: ["Edad Bin"], rows: ["Genero"],
                rendererName: "Area Chart"
            });
        });
    });
</script>
