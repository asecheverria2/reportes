@extends('layouts.app')
@section('content')
<body background="{{ url('img/fondoReportes.jpg') }}">
<div class="container">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4> Uso y Guias Entregadas por Docente </h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:35px"> 
                    <a href="{{route('reportes.index')}}" class="btn btn-primary"><svg width="4em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
  <path fill-rule="evenodd" d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/></svg></a>
                </div>
            </div>
        
        <br>
        <form method="GET" action=" ">
        <label><strong>Periodo</strong></label>
        <select name="select2">
            @foreach($periodos as $periodo)
                <option value="{{$periodo->PER_CODIGO}}">{{$periodo->PER_NOMBRE}}</option> 
            @endforeach
        </select>
        <br>
        <label><strong>Carrera</strong></label>
        <select name="select">
            @foreach($docentes as $docente)
                <option value="{{$docente->DOC_CODIGO}}">{{$docente->DOC_APELLIDOS}} {{$docente->DOC_NOMBRES}}</option> 
            @endforeach
        </select><br>
        <button  class="btn btn-success"  name='submit' type="submit">Actualizar reporte</button>
        </form>
    </div>
    
        @if (isset($_GET['submit'])) 
            <?php $cod_cont =0;?>
            @foreach($controls as $control)
            @if ($cod_cont !=0 and $control->MAT_CODIGO != $cod_cont) 
            </table>
            @endif
            @if ($cod_cont != $control->MAT_CODIGO)
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="6">{{$control->MAT_NOMBRE}} (NRC: {{$control->MAT_NRC}}) </th>
                        </tr>
                        <tr>
                            <th>FECHA</th>                                
                            <th>TIPO</th> 
                            <th>HORAS ASIGNADAS</th>  
                            <th>HORA ENTRADA</th>  
                            <th>HORA SALIDA</th>
                            <th>GUIA ENTREGADAS</th>            
                        </tr>
                    </thead>                                
                    
            @endif
                        <tr>
                            <td>{{$control->CON_DIA}}</td>
                            @if (is_null($control->CON_EXTRA))
                                <td>horario</td>
                                @else
                                <td> <strong>Ocacional</strong> </td>
                            @endif
                            <td>{{$control->CON_NUMERO_HORAS}}</td>
                            @if ($control->CON_HORA_ENTRADA_R)
                            <td>{{$control->CON_HORA_ENTRADA}}</td>
                            @else
                            <td>****</td>
                            @endif
                            @if ($control->CON_HORA_SALIDA_R)
                            <td> {{$control->CON_HORA_SALIDA}}</td>
                            @else
                            <td>****</td>
                            @endif
                            @if (is_null($control->GUI_NUMERO))
                                <td>***</td>
                                @else
                                <td> {{$control->GUI_NUMERO}} </td>
                            @endif
                        </tr> 
                        <?php $cod_cont = $control->MAT_CODIGO;?>
            @endforeach
            </table>
        @endif
    
    
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
@endsection