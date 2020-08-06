@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4>Ver Nota</h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:15px"> 
                    <a href="{{route('notas.index')}}" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>

    <div class="card-body">
                                                                        <div class="form-group">
            <label class="col-form-label" for="value">Nota1</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$nota->nota1}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Nota2</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$nota->nota2}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Nota3</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$nota->nota3}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Observacion</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$nota->observacion}}">
        </div>
                                                                    </div>

    </div>
</div>
@endsection