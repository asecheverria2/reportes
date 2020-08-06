@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h3>Crear Nota </h3>
        </div>
        <div class="card-body">

        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul @endif <form action="{{route('notas.store')}}" method="POST" novalidate>
        @csrf
                        <div class="form-group">
            <label for="alumno_id">Alumno</label>
            <select class="form-control" name="alumno_id" id="alumno_id">
                @foreach((\App\Alumno::all() ?? [] ) as $alumno)
                <option value="{{$alumno->id}}">
                    {{$alumno->nombre}}</option>
                @endforeach
            </select>
        </div>
                                <div class="form-group">
            <label for="materia_id">Materia</label>
            <select class="form-control" name="materia_id" id="materia_id">
                @foreach((\App\Materia::all() ?? [] ) as $materia)
                <option value="{{$materia->id}}">
                    {{$materia->mat_nombre}}</option>
                @endforeach
            </select>
        </div>
                
                                                                        <div class="form-group">
            <label for="nota1">Nota1</label>
                        <input class="form-control Decimal"  type="text"  name="nota1" id="nota1" value="{{old('nota1')}}"                         >
                        @if($errors->has('nota1'))
            <p class="text-danger">{{$errors->first('nota1')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="nota2">Nota2</label>
                        <input class="form-control Decimal"  type="text"  name="nota2" id="nota2" value="{{old('nota2')}}"                         >
                        @if($errors->has('nota2'))
            <p class="text-danger">{{$errors->first('nota2')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="nota3">Nota3</label>
                        <input class="form-control Decimal"  type="text"  name="nota3" id="nota3" value="{{old('nota3')}}"                         >
                        @if($errors->has('nota3'))
            <p class="text-danger">{{$errors->first('nota3')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="observacion">Observacion</label>
                        <textarea class="form-control" name="observacion" id="observacion" cols="30" rows="10">{{old('observacion')}}</textarea>
                        @if($errors->has('observacion'))
            <p class="text-danger">{{$errors->first('observacion')}}</p>
            @endif
        </div>
                                                                        <div>
            <button class="btn btn-success" type="submit">Grabar</button>
            <a href="{{route('notas.index')}}" class="btn btn-primary">Regresar</a>
        </div>
        </form>
        </div>
    </div>
</div>
@endsection