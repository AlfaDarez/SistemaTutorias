@extends('Panel.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">



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

{{-- Tabla principal --}}
<div class="container mt-5">
    <table id="ejemplo" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Fecha de Contacto</th>
                <th>Estatus</th>
                <th>Contactar</th>
                <th>Actualizar</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($bibliotecas as $biblioteca )
                <tr>
                    <td> {{ $biblioteca->clavebdt  }} </td>
                    <td> {{ $biblioteca->nombreMatutino }} </td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#historicoLlamadas"
                            data-nombre="{{ $biblioteca->nombreMatutino }}"
                            data-historico="{{ json_encode($biblioteca->Historico($biblioteca->id)) }}"
                        >
                            {{ $biblioteca->Ultimocontacto($biblioteca->id) }}
                        </a>
                    </td>

                    <td> {{ $biblioteca->estatus  }} </td>
                    <td>
                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactoBiblioteca"
                            data-nombre = "{{ $biblioteca->nombreMatutino }}"
                            data-dependencia = "{{ json_encode($biblioteca->dependenciasContacto($biblioteca->id)) }}"
                            data-ruta = "{{route('llamada.buzon',$biblioteca->id)}}"
                        >
                        Llamar
                        </button>
                    </td>
                    <td> <a href="{{ route('contactos.form.update',$biblioteca->id) }}"  > <img src="./img/edit.png" alt=""> </a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('pruebas.index')}}">PIVOTJS</a><br>
    <a href="{{ route('pruebas.form') }}">Telegram</a><br>
    @foreach ($bibliotecas as $biblioteca )
        <a href="{{route('inicio.tutoria',$biblioteca->clavebdt)}}"> {{$biblioteca->clavebdt}}</a>
        <a href="{{route('llamada.buzon',$biblioteca->id)}}"> {{$biblioteca->Ultimocontacto($biblioteca->id)}}</a><br>
    @endforeach
</div>


{{-- Historico de  Llamadas--}}
<div class="modal fade bd-example-modal-xl" id="historicoLlamadas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight: bold;">HISTORICO DE LLAMADAS</h5><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="BDT" style="font-weight: bold;"></h6>

                <div class="contenedorTabla">
                    {{-- La <table>es creado desde la función en JQuery --}}
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Contacto Biblioteca --}}
<div class="modal fade bd-example-modal-xl" id="contactoBiblioteca" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight: bold;">CONTACTO BIBLIOTECA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="BDT" style="font-weight: bold;"></h6>
                <div class="contenedorTabla">
                    <h6 id="prueba"></h6>
                    {{-- La <table>es creado desde la función en JQuery --}}
                </div>
            </div>
            <div class="modal-footer">
                <p>¿Respondió la llamada?</p>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Si</button>

                <a id="no" >
                    <button type="button" class="btn btn-secondary">No</button>
                </a>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script>
    let tabla = new DataTable('#ejemplo',{
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",

            entries:{
                _:'Tutores',
                1:'Tutor'
                }
        },
        layout:{
            topEnd:{
                search:{
                    placeholder:'Buscar tutor'
                }
            },
            topStart:null
        }
    });

// MODALES
//----- Historico ------------------------------------------------------------------
    $('#historicoLlamadas').on('show.bs.modal', function (event) {
        // obtener el objeto que activa el modal
        const linkModal = $(event.relatedTarget);

        // obtener los datos que activa el modal
        let bdt = linkModal.data('nombre');
        let data = JSON.stringify(linkModal.data('historico'));
        let arregloData = JSON.parse(data)

        const modal = $(this);

        modal.find('.modal-body .BDT').html(bdt);
        modal.find('.modal-body .contenedorTabla').html(añadirFilasHistorico(arregloData));
    })

    function añadirFilasHistorico(data) {
        // Creacion del cuerpo de la tabla
        let $table =$("<table></table>");
        $table.attr({
            id:"tablaHistorico",
            class:"table table-striped",
            style:"width:100%"
        });

        // Encabezados de las columnas
        let $thead = $("<thead><tr><th>Fecha</th><th>Tutor</th><th>Mensaje</th></tr></thead>")
        $table.append($thead)

        // Estructutra del cuerpo de la tabla
        let $tbody = $("<tbody></tbody>");
        let $tr = $("<tr></tr>");

        let $tdFecha;
        let $tdTutor;
        let $tdMensaje;

        let llamada = 0;

        // Rellenar cada columna en función del tamaño del arreglo(llamadas)
        while (llamada < data.length){
            $tdFecha = $(`<td> ${data[llamada][0]} </td>`)
            $tdTutor = $(`<td> ${data[llamada][1]} </td>`)
            $tdMensaje = $(`<td> ${data[llamada][2]} </td>`)

            $tr.append($tdFecha, $tdTutor, $tdMensaje)
            $tbody.append($tr)

            $tr = $("<tr></tr>");
            llamada++
        }

        // Añadir del cuerpo creado
        $table.append($tbody)

        // Devolver la Tabla
        return $table
    }

//----- Contacto ------------------------------------------------------------------
    $('#contactoBiblioteca').on('show.bs.modal', function (event) {
        // obtener el objeto que activa el modal
        const linkModal = $(event.relatedTarget);

        // obtener los datos que activa el modal
        let bdt = linkModal.data('nombre');
        let ruta = linkModal.data('ruta');

        let data = JSON.stringify(linkModal.data('dependencia'));
        let arregloData = JSON.parse(data)

        const modal = $(this);

        modal.find('.modal-body .BDT').html(bdt);
        modal.find('.modal-body .contenedorTabla').html(añadirFilasContacto(arregloData));
        modal.find('.modal-footer #no').prop("href",ruta);
    })

    function añadirFilasContacto(data) {
        // Creacion del cuerpo de la tabla
        let $table =$("<table></table>");
        $table.attr({
            id:"tablaContacto",
            class:"table table-striped",
            style:"width:100%"
        });

        // Encabezados de las columnas
        let $thead = $("<thead><tr><th>Nombre Responsable/Encargado</th><th>Numero de telefono</th><th>Celular</th><th>Correo</th><th>Cargo</th></tr></thead>")
        $table.append($thead)

        // Estructutra del cuerpo de la tabla
        let $tbody = $("<tbody></tbody>");
        let $tr = $("<tr></tr>");

        let $tdNombre;
        let $tdTelefono;
        let $tdCelular;
        let $tdCorreo;
        let $tdCargo;

        let Puesto = 'responsable';
        let contador = 0;

        // Contador <2 dado que son solo 2 personas para contactar (responsable y encargado)
        while (contador < 2){
            // Rellenar cada columna en función del tamaño de los puestos (Responsable/Encargado)
            $tdNombre = $(`<td> ${data[0]['nombre_' + Puesto]} </td>`)
            $tdTelefono = $(`<td> ${data[0]['telefono_' + Puesto]} </td>`)
            $tdCelular = $(`<td> ${data[0]['celular_' + Puesto]} </td>`)
            $tdCorreo = $(`<td> ${data[0]['correo_' + Puesto]} </td>`)
            $tdCargo = $(`<td> ${data[0]['cargo_' + Puesto]} </td>`)

            $tr.append($tdNombre, $tdTelefono, $tdCelular, $tdCorreo, $tdCargo)
            $tbody.append($tr)


            $tr = $("<tr></tr>");

            Puesto = 'encargado'
            contador++
        }

        // Añadir del cuerpo creado
        $table.append($tbody)

        // Devolver la Tabla
        return $table
    }

</script>
