@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4>Ver Alumno</h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:15px"> 
                    <a href="{{route('alumnos.index')}}" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Nombre</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$alumno->nombre}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Cedula</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$alumno->cedula}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Direccion</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$alumno->direccion}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Telefono</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$alumno->telefono}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Fecha Nacimiento</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$alumno->fecha_nacimiento}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Edad</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$alumno->edad}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Sexo</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$alumno->sexo}}">
        </div>
                                                                    </div>

    </div>
</div>
@endsection