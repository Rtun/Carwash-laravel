@extends('app.master')

@section('titulo')
vue
@endsection

@section('contenido')
 <!-- Default box -->
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Time Table</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
          <div id="app"></div>
    <form name="frm" action="{{action('DemoController@prueba_vue')}}" method="POST">
      <input type="hidden" name="fecha" id="oculto"> 
      {{csrf_field()}}
    </form>
          </div>
        <div id="app"></div>
    <form name="frm" action="{{action('DemoController@prueba_vue')}}" method="POST">
      <input type="hidden" name="fecha" id="oculto"> 
      {{csrf_field()}}
    </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
@endsection
@section('javascripts')
<script>
    var columnas_iniciales=<?php echo json_encode($estaciones);?>;
    var filas_iniciales=<?php echo json_encode($horarios);?>;
    var asignaciones_iniciales=<?php echo json_encode($asignaciones);?>;
    var bandera_sincrona=false; 
    var url_envio = '{{action('DemoController@prueba_axios')}}';
    var tk='{{csrf_token()}}'; 
    var url_insert='{{action('DemoController@insertar_Servicio')}}'; 
    var lista_socios=<?php echo json_encode($socios)?>;
    var lista_tipos=<?php echo json_encode($tipos)?>;    
</script>
<script src="{{asset('public/timetable/build.js')}}"></script>
@endsection