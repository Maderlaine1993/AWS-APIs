@extends('layouts.app')
@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card bg-light border-primary ">
                    <div class="card-header text-center text-white bg-primary">
                        <div class="float-left">
                                <span class="card-title">INFORMACION DE EMPLEADO</span>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="form-group">
                                <strong>Usuario que creo al empleado:</strong>
                                {{ $empleado->id_usuario }}
                            </div>

                            <div class="form-group">
                                <strong>Codigo:</strong>
                                {{ $empleado->codigo_empleado }}
                            </div>
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                {{ $empleado->nombre_empleado }}
                            </div>
                            <div class="form-group">
                                <strong>Número:</strong>
                                {{ $empleado->numero_telefono }}
                            </div>
                            <div class="form-group">
                                <strong>Departamento:</strong>
                                {{ $empleado->departamento }}
                            </div>
                            <div class="form-group">
                                <strong>Correo:</strong>
                                {{ $empleado->correo }}
                            </div>
                            <div class="form-group">
                                <strong>Dirección:</strong>
                                {{ $empleado->direccion }}
                            </div>

                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ url('/LISTADO')}}"> <i class="fas fa-arrow-alt-circle-left"></i> Atras</a>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
