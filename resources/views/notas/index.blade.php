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
                    <h4> Notas </h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:35px"> 
                    <a href="{{route('notas.create')}}" class="btn btn-success">Nuevo</a>
                </div>
            </div>
        </>
    <div class="card-body">

    <table class="table table-striped">
        @if(count($notas))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                
                                
                                                <td>Nota1</td>
                
                                                <td>Nota2</td>
                
                                                <td>Nota3</td>
                
                                                <td>Observacion</td>
                
                                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($notas as $nota)
            <tr>
                <td>
                    <a href="{{route('notas.show',['nota'=>$nota] )}}" class="btn btn-info">Ver</a>
                    <a href="{{route('notas.edit',['nota'=>$nota] )}}" class="btn btn-primary">Editar</a>
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-nota-{{$nota->id}}').submit();" class="btn btn-danger">
                        Borrar
                    </a>
                    <form id="delete-nota-{{$nota->id}}" action="{{route('notas.destroy',['nota'=>$nota])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                                                                                <td>{{$nota->nota1}}</td>
                                                                <td>{{$nota->nota2}}</td>
                                                                <td>{{$nota->nota3}}</td>
                                                                <td>{{$nota->observacion}}</td>
                                                                                                                                
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