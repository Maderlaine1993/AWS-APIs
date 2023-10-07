@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <h2 class="text-center mb-5"> <i class="fas fa-users"></i> LISTADO DE EMPLEADOS REGISTRADOS </h2>
            <a type="button " href="{{ url('/CREAR')}}" class="btn btn-success mb-3 mt-3 mr-2 md-3 offset float-left">Agregar un empleado  <i class="fas fa-plus"></i></a>

            <table class="table table-bordered table-strpied text-center">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">CODIGO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">TELEFONO</th>
                    <th scope="col">CORREO</th>
                    <th scope="col">DIRECCION</th>
                    <th scope="col">DEPARTAMENTO</th>
                    <th scope="col">EDITAR</th>
                    <th scope="col">VER</th>
                    <th scope="col">ELIMINAR</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($emplaeados as $empleado)
                    <tr>

                        <td class=" border px-4 py-2">{{$empleado->codigo_empleado}}</td>
                        <td class=" border px-4 py-2">{{$empleado->nombre_empleado}}</td>
                        <td class=" border px-4 py-2">{{$empleado->numero_telefono}}</td>
                        <td class=" border px-4 py-2">{{$empleado->correo}}</td>
                        <td class=" border px-4 py-2">{{$empleado->direccion}}</td>
                        <td class=" border px-4 py-2">{{$empleado->departamento}}</td>
                        <td class=" border px-4 py-2">
                            <div class="btn-group flex justify-center rounded-lg text-lg">
                                <a href="{{ route('modificar',$empleado->id)}}" class=" mr-2 btn btn-primary">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </div>
                        </td>
                        <td class=" border px-4 py-2">
                            <a class="btn btn-sm btn-success " href="{{ route('show',$empleado->id) }}">
                                <i class="fa fa-fw fa-eye"></i>
                            </a>
                        </td>
                        <td class=" border px-4 py-2">
                            <form action="{{ route('delete',$empleado->id)}}" id="{{$empleado->id}}" method="POST">
                                @csrf @method('DELETE')
                                <button type="button" onclick="EliminarEstudiante({{$empleado->id}})" class=" btn btn-danger" >
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div
            {{$emplaeados->links()}}

        </div>
    </div>
</div>
@endsection
@section('conten')

    <!--seccion de la alerta-->
@section('alert')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function EliminarEstudiante(Estudiante){
            Swal.fire({
                title: 'Estas seguro de eliminar al empleado?',
                text: "No podras revertir esta accion!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(Estudiante).submit()
                    Swal.fire(
                        'Eliminado!',
                        'El empleado desaparecio.',
                        'success'
                    )
                }
            })
        }
    </script>
@endsection

