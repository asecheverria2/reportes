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
            <h1> Sections </h1>
        </div>
    <div class="card-body">

    <div>
        <a class="btn btn-success" href="{{route('sections.create')}}">Nuevo</a>
    </div>
    <table class="table table-striped">
        @if(count($sections))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                                <td>Nombre</td>
                
                                                <td>Detalle</td>
                
                                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($sections as $section)
            <tr>
                <td>
                    <a class="btn btn-primary" href="{{route('sections.show',['section'=>$section] )}}">Ver</a>
                    <a class="btn btn-info" href="{{route('sections.edit',['section'=>$section] )}}">Editar</a>
                    <a class="btn btn-danger" href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-section-{{$section->id}}').submit();">
                        Eliminar
                    </a>
                    <form id="delete-section-{{$section->id}}" action="{{route('sections.destroy',['section'=>$section])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                <td>{{$section->nombre}}</td>
                                                                <td>{{$section->detalle}}</td>
                                                                                                                                
            </tr>
            @empty
            <p>No Sections</p>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>

</div>

@endsection