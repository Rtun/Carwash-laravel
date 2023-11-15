@extends('app.master')

@section('titulo')
Formulario Servicio
@endsection

@section('contenido')
<!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Introdusca sus datos</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row" id="app">
      <div class='col-sm-12 col-md-12 col-xs-12'>

        <form action="{{action('ServicioController@save')}}" method="POST">
          {{csrf_field()}}
          <div class="form-group">
            <input type="hidden" name="idservicio" class="form-control" value="{{$servicio->idservicio}}">
          </div>

          <div class="form-group">
            <label class="form-label" for=''>Placa</label>
            <input type="text" name="placa" class="form-control" value="{{$servicio->placa}}">
          </div>

          <div class="form-group">
            <label class="form-label" for=''>Modelo</label>
            <input type="text" name="modelo" class="form-control" value="{{$servicio->modelo}}">
          </div>

          <div class="form-group">
            <label class="form-label" for=''>Año</label>
            <input type="text" name="anio" class="form-control" value="{{$servicio->anio}}">
          </div>
          <div class="form-group">
            <label class="form-label" for=''>personal</label>
            <select name="idpersonal" class="form-control" >
              <option v-for="nam in name" name="idpersonal" class="form-control" :value="nam.idpersonal">@{{nam.nombre}}</option>
            </select>
          </div>

          <div class="form-group">
            <label class="form-label" for=''>tipo de servicio</label>
            <select name="idtiposervicio" class="form-control">
              <option v-for="tips in tips_ser" name="idtiposervicio" class="form-control" :value="tips.idtiposervicio">@{{tips.nombre_servicio}}</option>
            </select>
          </div>

          <div class="form-group">
            <label class="form-label" for=''>Precio</label>
            <input type="text" name="precio" class="form-control" value="{{$servicio->precio}}">
          </div>

          <div class="form-group">
            <label class="form-label" for=''>Socio</label>
            <select name="idsocio" class="form-control">
              <option v-for="so in sos" name="idsocio" class="form-control" :value="so.idsocio">@{{so.nombre}}</option>
            </select>
          </div>

         <div>
           <div class="form-group">
             <label class="form-label" for="">Fecha de atencion</label>
             <vuejs-datepicker
              input-class="form-control" 
              placeholder="Selecciona una fecha"
             format="yyyy-MM-dd" 
             :language="lenguaje"
             v-model="fecha_atencion"
             name="fecha_atencion"></vuejs-datepicker>
           </div>
         </div>


          <input type="submit" class="btn btn-success" name="operacion" value="{{$operacion}}">
          @if($operacion=='Editar')
          <input type="submit" class="btn btn-danger" name="operacion" value="Eliminar">
       
          @endif
          <input type="submit" class="btn btn-warning" name="operacion" value="Cancelar">
          
        </form>
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

@section('javascripts')
<script src="{{asset('public/vuejs-datepicker.min.js')}}"></script>
<script src="{{asset('public/es.js')}}"></script>
@endsection

@section('script')
<script type="text/javascript">
  new Vue({
    el:'#app',
    data:{
      name:<?php echo json_encode($name);?>
      ,tips_ser:<?php echo json_encode($tips_ser);?>
      ,sos:<?php echo json_encode($sos);?>
      ,idtiposervicio:'{{$servicio->idtiposervicio}}'
      ,idsocio:'{{$servicio->idsocio}}'
      ,idpersonal:'{{$servicio->idpersonal}}'
      ,fecha_atencion:'{{$servicio->fecha_atencion}}'
      ,lenguaje:vdp_translation_es.js
    },
    methods:{

    },
    components:{
      vuejsDatepicker
    }
  });
</script>
@endsection