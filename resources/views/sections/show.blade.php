@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Section Show </h1>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Nombre</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$section->nombre}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Detalle</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$section->detalle}}">
        </div>
                                                                    </div>

    </div>

    <div class="card mb-4">

        
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection