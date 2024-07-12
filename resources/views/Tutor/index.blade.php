@extends('Panel.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
{{-- Font awesome --}}
<link rel="stylesheet" href="{{ asset('fontawesome-free-6.3.0-web/css/all.min.css') }}">


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
                        <td> <?php echo $biblioteca['clavebdt']?> </td>
                        <td> <?php echo $biblioteca['nombreMatutino']?> </td>
                        <td> <a href="" data-toggle="modal" data-target="#historicoLlamadas"> <?php echo $biblioteca->Ultimocontacto($biblioteca->id)?> </a></td>
                        <td> <?php echo $biblioteca['estatus']?> </td>
                        <td> <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactoBiblioteca">Llamar</button></td>
                        <td> <a href="{{ route('contactos.form.update',$biblioteca->id) }}"  > <img src="./img/edit.png" alt=""> </a></td>
                    </tr>
                @endforeach
            </tbody>

            {{-- @foreach ($bibliotecas as $biblioteca )
                <h3 style="color: blue">{{$biblioteca->dependencias}}</h3>
                <h3 style="color: red">{{$biblioteca->Ultimocontacto($biblioteca->id)}}</h3>
                <h3 style="color: green">{{$biblioteca->contactoEfectivo}}</h3>
                <h3 style="color: violet">{{$biblioteca->sinContactos}}</h3>
            @endforeach --}}
            </table>
        </div>



{{-- Historico de  Llamadas--}}
<div class="modal fade bd-example-modal-xl" id="historicoLlamadas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Historico de LLamadas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Tutor</th>
                            <th>Mensaje</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($bibliotecas as $biblioteca )
                        @foreach ($biblioteca->sinContactos as $contactos)
                            <tr>
                                <td> {{ $contactos->fecha}} </td>
                                <td> {{ $contactos->tutor->name }} </td>
                                <td> {{ $contactos->observaciones }} </td>

                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


{{-- Contacto Biblioteca --}}
<div class="modal fade bd-example-modal-xl" id="contactoBiblioteca" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Contacto Biblioteca</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre Responsable</th>
                            <th>Numero de telefono</th>
                            <th>Celular</th>
                            <th>Correo</th>
                            <th>Cargo</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($bibliotecas as $biblioteca )
                            @foreach ($biblioteca->dependencias as $dependencia)
                                <tr>
                                    <td> {{ $dependencia->nombre_responsable }} </td>
                                    <td> {{ $dependencia->telefono_responsable }} </td>
                                    <td> {{ $dependencia->celular_responsable }} </td>
                                    <td> {{ $dependencia->correo_responsable }} </td>
                                    <td> {{ $dependencia->cargo_responsable }} </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <p>¿Respondió la llamada?</p>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Si</button>
                <button type="button" class="btn btn-secondary">No</button>
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
</script>
