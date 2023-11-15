@extends('app.master')

@section('titulo')
Roles
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
        <form action="{{action('RolController@formulario')}}" method="POST">
          {{csrf_field()}}
          <button class="btn btn-success">Agregar</button>
          
        </form>
      </div>
      
    </div>
    <div class="row" id="app">
      <div class='col-sm-12 col-md-12 col-xs-12'>
        <h1>Lista de Roles</h1>
        <table class="table">
          <tr>
            <th>Nombre</th>
            <th>&nbsp;</th>
          </tr>
          
            <tr v-for="elemento in lista">
            <td><a :href="url_editar+'?idrol='+elemento.idrol">@{{elemento.nombre}}</a></td>
            <td><a :href="url_permisos+'?idrol='+elemento.idrol">Permisos</a></td>
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
      ,url_editar:'{{action("RolController@formulario")}}'
      ,url_permisos:'{{action("RolxpermisoController@formulario")}}'
    }
  })
</script>
@endsection