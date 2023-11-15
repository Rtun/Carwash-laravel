@extends('app.master')

@section('titulo')
Asignacion de materias prima para el tipo de servicio {{$tiposervicio->nombre_servicio}}
@endsection

@section('contenido')
<!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Materias Prima</h3>

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
              <form action="{{action('MateriaprimaxTiposervicioController@save')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="idtiposervicio" value="{{$tiposervicio->idtiposervicio}}">
                <table class="table">
                  <tr v-for="materia in materias">
                    <td>
                      <input type="checkbox" :checked='materia.asignada' name="idmateria_prima[]" :value="materia.idmateria_prima">
                      </td>
                      <td>@{{materia.nombre}}</td>
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
      materias:<?php echo json_encode($materias);?>
    }
  });
</script>
@endsection