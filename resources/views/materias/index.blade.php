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
                    <h4> Materias </h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:35px"> 
                    <a href="{{route('materias.create')}}" class="btn btn-success">Nuevo</a>
                </div>
            </div>
        </>
    <div class="card-body">

    <table class="table table-striped">
        @if(count($materias))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                                <td>Mat Nombre</td>
                
                                                <td>Mat Docente</td>
                
                                                <td>Mat Nrc</td>
                
                                                <td>Mat Horas</td>
                
                                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($materias as $materia)
            <tr>
                <td>
                    <a href="{{route('materias.show',['materia'=>$materia] )}}" class="btn btn-info">Ver</a>
                    <a href="{{route('materias.edit',['materia'=>$materia] )}}" class="btn btn-primary">Editar</a>
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-materia-{{$materia->id}}').submit();" class="btn btn-danger">
                        Borrar
                    </a>
                    <form id="delete-materia-{{$materia->id}}" action="{{route('materias.destroy',['materia'=>$materia])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                <td>{{$materia->mat_nombre}}</td>
                                                                <td>{{$materia->mat_docente}}</td>
                                                                <td>{{$materia->mat_nrc}}</td>
                                                                <td>{{$materia->mat_horas}}</td>
                                                                                                                                
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