@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h3>Editar Materia </h3>
        </div>
        <div class="card-body">

    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>

    @endif

    <form action="{{route('materias.update',['materia'=>$materia->id])}}" method="POST" novalidate>
        @csrf
        @method('PUT')
                        

                                        <div class="form-group">
            <label for="mat_nombre">Mat Nombre</label>
                    <input class="form-control String"  type="text"  name="mat_nombre" id="mat_nombre" value="{{old('mat_nombre',$materia->mat_nombre)}}"
                                    required="required"
                        >
                    @if($errors->has('mat_nombre'))
            <p class="text-danger">{{$errors->first('mat_nombre')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="mat_docente">Mat Docente</label>
                    <input class="form-control String"  type="text"  name="mat_docente" id="mat_docente" value="{{old('mat_docente',$materia->mat_docente)}}"
                                    required="required"
                        >
                    @if($errors->has('mat_docente'))
            <p class="text-danger">{{$errors->first('mat_docente')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="mat_nrc">Mat Nrc</label>
                    <input class="form-control Integer"  type="number"  name="mat_nrc" id="mat_nrc" value="{{old('mat_nrc',$materia->mat_nrc)}}"
                                    required="required"
                        >
                    @if($errors->has('mat_nrc'))
            <p class="text-danger">{{$errors->first('mat_nrc')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="mat_horas">Mat Horas</label>
                    <input class="form-control Integer"  type="number"  name="mat_horas" id="mat_horas" value="{{old('mat_horas',$materia->mat_horas)}}"
                                    required="required"
                        >
                    @if($errors->has('mat_horas'))
            <p class="text-danger">{{$errors->first('mat_horas')}}</p>
            @endif
        </div>
                                                                        <div>
            <button class="btn btn-success" type="submit">Grabar</button>
            <a href="{{route('materias.index')}}" class="btn btn-primary">Regresar</a>
        </div>
    </form>
    </div>
        </div>

</div>
@endsection