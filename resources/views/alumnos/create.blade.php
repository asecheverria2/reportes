@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h3>Crear Alumno </h3>
        </div>
        <div class="card-body">

        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul @endif <form action="{{route('alumnos.store')}}" method="POST" novalidate>
        @csrf
                        
                                        <div class="form-group">
            <label for="nombre">Nombre</label>
                        <input class="form-control String"  type="text"  name="nombre" id="nombre" value="{{old('nombre')}}"             maxlength="50"
                                    required="required"
                        >
                        @if($errors->has('nombre'))
            <p class="text-danger">{{$errors->first('nombre')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="cedula">Cedula</label>
                        <input class="form-control String"  type="text"  name="cedula" id="cedula" value="{{old('cedula')}}"             maxlength="10"
                                    required="required"
                        >
                        @if($errors->has('cedula'))
            <p class="text-danger">{{$errors->first('cedula')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="direccion">Direccion</label>
                        <input class="form-control String"  type="text"  name="direccion" id="direccion" value="{{old('direccion')}}"             maxlength="80"
                                    required="required"
                        >
                        @if($errors->has('direccion'))
            <p class="text-danger">{{$errors->first('direccion')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="telefono">Telefono</label>
                        <input class="form-control String"  type="text"  name="telefono" id="telefono" value="{{old('telefono')}}"             maxlength="10"
                                    >
                        @if($errors->has('telefono'))
            <p class="text-danger">{{$errors->first('telefono')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="fecha_nacimiento">Fecha Nacimiento</label>
                        <input class="form-control Date"  type="date"  name="fecha_nacimiento" id="fecha_nacimiento" value="{{old('fecha_nacimiento')}}"                         >
                        @if($errors->has('fecha_nacimiento'))
            <p class="text-danger">{{$errors->first('fecha_nacimiento')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="edad">Edad</label>
                        <input class="form-control Integer"  type="number"  name="edad" id="edad" value="{{old('edad')}}"                         >
                        @if($errors->has('edad'))
            <p class="text-danger">{{$errors->first('edad')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="sexo">Sexo</label>
                        <input class="form-control String"  type="text"  name="sexo" id="sexo" value="{{old('sexo')}}"             maxlength="1"
                                    >
                        @if($errors->has('sexo'))
            <p class="text-danger">{{$errors->first('sexo')}}</p>
            @endif
        </div>
                                                                        <div>
            <button class="btn btn-success" type="submit">Grabar</button>
            <a href="{{route('alumnos.index')}}" class="btn btn-primary">Regresar</a>
        </div>
        </form>
        </div>
    </div>
</div>
@endsection