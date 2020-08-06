@extends('layouts.app')
@section('content')
<div class="container">

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4> Alumnos </h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:35px"> 
                    <a href="{{route('alumnos.create')}}" class="btn btn-success">Nuevo</a>
                </div>
            </div>
        </>
    <div class="card-body">

    <table class="table table-striped">
        @if(count($alumnos))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                                <td>Nombre</td>
                
                                                <td>Cedula</td>
                
                                                <td>Direccion</td>
                
                                                <td>Telefono</td>
                
                                                <td>Fecha Nacimiento</td>
                
                                                <td>Edad</td>
                
                                                <td>Sexo</td>
                
                                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($alumnos as $alumno)
            <tr>
                <td>
                    <a href="{{route('alumnos.show',['alumno'=>$alumno] )}}" class="btn btn-info">Ver</a>
                    <a href="{{route('alumnos.edit',['alumno'=>$alumno] )}}" class="btn btn-primary">Editar</a>
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-alumno-{{$alumno->id}}').submit();" class="btn btn-danger">
                        Borrar
                    </a>
                    <form id="delete-alumno-{{$alumno->id}}" action="{{route('alumnos.destroy',['alumno'=>$alumno])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                <td>{{$alumno->nombre}}</td>
                                                                <td>{{$alumno->cedula}}</td>
                                                                <td>{{$alumno->direccion}}</td>
                                                                <td>{{$alumno->telefono}}</td>
                                                                <td>{{$alumno->fecha_nacimiento}}</td>
                                                                <td>{{$alumno->edad}}</td>
                                                                <td>{{$alumno->sexo}}</td>
                                                                                                                                
            </tr>
            @empty
            <p>No Existen Datos que Mostrar...</p>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>

</div>

@endsection