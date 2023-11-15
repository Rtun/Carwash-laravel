@extends('app.master')

@section('titulo')
Tipos Servicio
@endsection

@section('contenido')
<!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i>Hola</button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
         <div class="row">
      <div class="col-md-12">
        <form action="{{action('TiposervicioController@formulario')}}" method="POST">
          {{csrf_field()}}
          <button class="btn btn-success">Agregar</button>
          
        </form>
      </div>
      
    </div>
    <div class="row" id="app">
      <div class='col-sm-12 col-md-12 col-xs-12'>
        <h1>Lista de los tipos de servicio</h1>
        <table class="table">
          <tr>
            <th>Nombre</th>
            <th>precio</th>
            <th>&nbsp;</th>
          </tr>
          
            <tr v-for="elemento in lista">
            <td><a :href="url_editar+'?idtiposervicio='+elemento.idtiposervicio">@{{elemento.nombre_servicio}}</a></td>
            <td>@{{elemento.precio}}</td>
            <td><a :href="url_materias+'?idtiposervicio='+elemento.idtiposervicio">Materias Primas</a></td>
          </tr>
          
        </table>
      </div>
    </div> 
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

@endsection
@section('script')
<script type="text/javascript">
  new Vue({
    el:'#app',
    data:{
      lista:<?php echo json_encode($listas);?>
      ,url_editar:'{{action("TiposervicioController@formulario")}}'
      ,url_materias:'{{action("MateriaprimaxTiposervicioController@formulario")}}'
    }
  })
</script>
@endsection
