@extends('app.master')

@section('titulo')
Lista de Tipos de socio
@endsection

@section('contenido')
  <!-- Default box -->
  <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
        <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="{{action('TiposocioController@formulario')}}" method="POST">
          {{csrf_field()}}
          <button class="btn btn-success">Agregar</button>
          
        </form>
      </div>
      
    </div>
    <div id="app" class="row">
      <div class='col-sm-12 col-md-12 col-xs-12'>
        <h1>Lista de Socios</h1>
        <table class="table">
          <tr>
            <th>Nombre del Socio</th>
          </tr>
            <tr v-for="elemento in lista">
            <td><a :href="url_editar+'?idtiposocio='+elemento.idtiposocio">@{{elemento.nombre}}</a></td>
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
      lista:<?php echo json_encode($lista);?>
      ,url_editar:"{{action('TiposocioController@formulario')}}"

    }
  });
</script>  
@endsection