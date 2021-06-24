@extends('layouts.plantilla')

@section('contenido')
<div class="modal fade" id="modificarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Contacto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="envio">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="txtNombre">Nombre: </label>
                        <input type="text" name="nombre" id="pers_nombre" class="form-control" placeholder="Ingrese nombre">
                    </div>

                    <div class="form-group">
                        <label for="txtNombre">Teléfono Fijo: </label>
                        <input type="text" name="fijo" id="pers_fijo" class="form-control" placeholder="Ingrese teléfono fijo">
                    </div>

                    <div class="form-group">
                        <label for="txtNombre">Teléfono Celular: </label>
                        <input type="text" name="celular" id="pers_celular" class="form-control" placeholder="Ingrese teléfono celular">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar contacto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿esta seguro que desea eliminar el contacto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="" method="POST" id="envio">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<main class="container mt-3">
    <h1 class="text-center mb-3"><b>Agenda Personal</b></h1>
    <section class="row">
        <div class="col-sm-5 cajaContacto p-4">
            <form name="frmContacto" method="POST" action="{{route('persona.index')}}">
                @csrf
                <div class="form-group">
                    <label for="txtNombre">Nombre: </label>
                    <input type="text" name="nombre" id="pers_nombre" class="form-control" placeholder="Ingrese nombre">
                </div>

                <div class="form-group">
                    <label for="txtNombre">Teléfono Fijo: </label>
                    <input type="text" name="fijo" id="pers_fijo" class="form-control" placeholder="Ingrese teléfono fijo">
                </div>

                <div class="form-group">
                    <label for="txtNombre">Teléfono Celular: </label>
                    <input type="text" name="celular" id="pers_celular" class="form-control" placeholder="Ingrese teléfono celular">
                </div>

                <input type="submit" class="btn btn-info btn-block" value="Agregar contacto">
                <!-- <a onclick="registrarContacto()" class="btn btn-info btn-block">Agregar Contacto2</a> -->
            </form>
        </div>
        <div class="col-sm-7">
            <div class="tabla-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark thead-center">
                        <tr>
                            <th>Nombre</th>
                            <th>Teléfono Fijo</th>
                            <th>Teléfono Celular</th>
                            <th>Manejo de datos</th>
                        </tr>
                    </thead>
                    <tbody id="tablaContactos" style="background-color: #fff;">
                        @foreach($personas as $persona)
                        <tr>
                            <td>{{$persona -> pers_nombre}}</td>
                            <td>{{$persona -> pers_fijo}}</td>
                            <td>{{$persona -> pers_celular}}</td>
                            <td class="acciones"><i data-toggle="modal" data-target="#modificarModal" class="fas fa-edit rojo" data-link="{{route('persona.destroy', $persona)}}"></i>
                                <i data-toggle="modal" data-target="#eliminarModal" class="fas fa-trash-alt" data-link="{{route('persona.destroy', $persona)}}"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
@endsection