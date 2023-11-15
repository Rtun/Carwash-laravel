@extends('app.master')

@section('titulo')
Lista de personal
@endsection

@section('contenido')
<!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista</h3>

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
        <form action="{{action('PersonalController@formulario')}}" method="POST">
          {{csrf_field()}}
          <button class="btn btn-success">Agregar</button>
          
        </form>
      </div>
      
    </div>
    <div id="app" class="row">
      <div class='col-sm-12 col-md-12 col-xs-12'>
        <h1>Personal</h1>
        <table class="table">
          <tr>
            <th>Nombre</th>
            <th>Curp</th>
            <th>Foto</th>
          </tr>


          <tr v-for="elemento in registros">
            <td><a :href="'{{action('PersonalController@formulario')}}?idpersonal='+elemento.idpersonal">@{{elemento.nombre}}</a></td>
            <td>@{{elemento.curp}}</td>
            <td><img :src="'{{URL::to('/')}}/'+elemento.foto" width="70" alt=""></td>
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
     registros:<?php echo json_encode($lista);?>
      }
      ,methods:{
       
  }

    });
</script>
@endsection