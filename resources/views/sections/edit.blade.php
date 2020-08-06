@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h1> Section Edit </h1>
        </div>
        <div class="card-body">

    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>

    @endif

    <form action="{{route('sections.update',['section'=>$section->id])}}" method="POST" novalidate>
        @csrf
        @method('PUT')
        

                                        <div class="form-group">
            <label for="nombre">Nombre</label>
                    <input class="form-control String"  type="text"  name="nombre" id="nombre" value="{{old('nombre',$section->nombre)}}"
                                    required="required"
                        >
                    @if($errors->has('nombre'))
            <p class="text-danger">{{$errors->first('nombre')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="detalle">Detalle</label>
                    <textarea class="form-control Text"  name="detalle" id="detalle" cols="30" rows="10">{{old('detalle',$section->detalle)}}</textarea>
                    @if($errors->has('detalle'))
            <p class="text-danger">{{$errors->first('detalle')}}</p>
            @endif
        </div>
                                                                        <div>
            <button class="btn btn-primary" type="submit">Grabar</button>
            <a class="btn btn-info" href="{{ url()->previous() }}">Regresar</a>
        </div>
    </form>
    </div>
        </div>

</div>
@endsection