@extends('app.master')

@section('titulo')
Lista de Socios
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
          <div class="row">
      <div class="col-md-12">
        <form action="{{action('SocioController@formulario')}}" method="POST">
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
            <th>nombre</th>
            <th>Tipo</th>
            <th>Foto</th>
            <th>&nbsp;</th>

          </tr>
            <tr v-for="elemento in lista">
            <td><a :href="url_editar+'?idsocio='+elemento.idsocio">@{{elemento.nombre}}</a></td>
            <td>@{{elemento.nom_socio}}</td>
            <td><img :src="'{{URL::to('/')}}/'+elemento.foto" width="70" alt=""></td>
            <td><a :href="url_renta+'?idsocio='+elemento.idsocio">rentas</a></td>
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
      ,url_editar:"{{action('SocioController@formulario')}}"
      ,url_renta:"{{action('RentaController@renta')}}"

    }
  });
</script>  
@endsection
