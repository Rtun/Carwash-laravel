@extends('app.master')

@section('titulo')
Asignacion de permisos de rol tipo {{$rol->nombre}}
@endsection

@section('contenido')
<!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Permisos</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div id="app" class="row" >
            <div class="col-md-12">
              <form action="{{action('RolxpermisoController@save')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="idrol" value="{{$rol->idrol}}">
                <table class="table">
                  <tr v-for="permiso in permisos">
                    <td>
                      <input type="checkbox" :checked='permiso.asignada' name="idpermiso[]" :value="permiso.idpermiso">
                      </td>
                      <td>@{{permiso.nombre}}</td>
                  </tr>
                </table>
                <button type="submit" class="btn btn-success">Guardar</button>
              </form>
            </div>
          </div>
  </div>!
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
      permisos:<?php echo json_encode($permisos);?>
    }
  });
</script>
@endsection