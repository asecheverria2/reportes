@extends('layouts.app')
@section('content')
<body background="{{ url('img/fondoReportes.jpg') }}">
<div class="container">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4> Registro de docentes </h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:35px"> 
                    <a href="{{route('reportes.index')}}" class="btn btn-primary"><svg width="4em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
  <path fill-rule="evenodd" d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/></svg></a>
                </div>
            </div>
        </>
        <br>
    <div class="card-body" style="border: 1px solid">

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th></th>
                <th>Cedula</th>                                
                <th>MiEspe</th>                
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Titulo</th>
            </tr>

        </thead>
                                        
        <tbody>
            @php($i=1) 
            @foreach($docentes as $docente)
                <tr>
                    <td><?php echo $i++;?></td>
                    <td>{{$docente->DOC_CEDULA}}</td>                                
                    <td>{{$docente->DOC_MIESPE}}</td>                
                    <td>{{$docente->DOC_NOMBRES}}</td>
                    <td>{{$docente->DOC_APELLIDOS}}</td>
                    <td>{{$docente->DOC_CORREO}}</td>
                    <td>{{$docente->DOC_TITULO}}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
                                        
    </div>
    </div>

</div>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
@endsection