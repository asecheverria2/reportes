@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h3>Editar Alumno </h3>
        </div>
        <div class="card-body">

    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>

    @endif

    <form action="{{route('alumnos.update',['alumno'=>$alumno->id])}}" method="POST" novalidate>
        @csrf
        @method('PUT')
                        

                                        <div class="form-group">
            <label for="nombre">Nombre</label>
                    <input class="form-control String"  type="text"  name="nombre" id="nombre" value="{{old('nombre',$alumno->nombre)}}"
                                    required="required"
                        >
                    @if($errors->has('nombre'))
            <p class="text-danger">{{$errors->first('nombre')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="cedula">Cedula</label>
                    <input class="form-control String"  type="text"  name="cedula" id="cedula" value="{{old('cedula',$alumno->cedula)}}"
                                    required="required"
                        >
                    @if($errors->has('cedula'))
            <p class="text-danger">{{$errors->first('cedula')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="direccion">Direccion</label>
                    <input class="form-control String"  type="text"  name="direccion" id="direccion" value="{{old('direccion',$alumno->direccion)}}"
                                    required="required"
                        >
                    @if($errors->has('direccion'))
            <p class="text-danger">{{$errors->first('direccion')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="telefono">Telefono</label>
                    <input class="form-control String"  type="text"  name="telefono" id="telefono" value="{{old('telefono',$alumno->telefono)}}"
                                    >
                    @if($errors->has('telefono'))
            <p class="text-danger">{{$errors->first('telefono')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="fecha_nacimiento">Fecha Nacimiento</label>
                    <input class="form-control Date"  type="date"  name="fecha_nacimiento" id="fecha_nacimiento" value="{{old('fecha_nacimiento',$alumno->fecha_nacimiento)}}"
                                    >
                    @if($errors->has('fecha_nacimiento'))
            <p class="text-danger">{{$errors->first('fecha_nacimiento')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="edad">Edad</label>
                    <input class="form-control Integer"  type="number"  name="edad" id="edad" value="{{old('edad',$alumno->edad)}}"
                                    >
                    @if($errors->has('edad'))
            <p class="text-danger">{{$errors->first('edad')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="sexo">Sexo</label>
                    <input class="form-control String"  type="text"  name="sexo" id="sexo" value="{{old('sexo',$alumno->sexo)}}"
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