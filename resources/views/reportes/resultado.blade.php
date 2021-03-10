@extends('layouts.app')
@section('content')
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Periodo', '# Materias' ],
          <?php $k=0 ?>
          @foreach($periodos as $periodo)
            <?php $c=$cantidad[$k]?>
            ['{{$periodo->PER_NOMBRE}}', <?php echo  $c?>],
            <?php $k++?>
          @endforeach
        ]);

        var options = {
          title: 'Materias por periodo',
          hAxis: {title: 'Periodo',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  
</html>
<body background="{{ url('img/fondoReportes.jpg') }}">
<div class="container">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                <?php $i=$_GET["select"]-1 ?>
                    <h1>{{$carreras[$i]->CAR_NOMBRE}} </h1>
                </div>
                <div class="col-4" style="text-align:right;padding-right:35px"> 
                    <a href="{{route('reportes.busqueda')}}" class="btn btn-primary"><svg width="4em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
  <path fill-rule="evenodd" d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/></svg></a>
                </div>
            </div>
        
        <br>
        <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Periodo</th>                                
                <th># de Materias</th>                

            </tr>

        </thead>
                                        
        <tbody>
        <?php $j=0 ?> 
            @foreach($periodos as $periodo)
            <?php $cant=$cantidad[$j]?>
                <tr>
                    <td>{{$periodo->PER_NOMBRE}}</td>
                    <td><?php echo  $cant?></td>
                    <?php $j++;?>
                </tr>
            @endforeach
            
            
        </tbody>
    </table>
    <div id="chart_div" class="row-fluid table-responsive" style="width: 100%; height: 500px;"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
@endsection