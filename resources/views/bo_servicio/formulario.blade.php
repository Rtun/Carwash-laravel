@extends('app.master')

@section('titulo')
Formulario de estaciones
@endsection

@section('contenido')
<!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Introduzca los datos</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row" >
      <div id="app" class='col-sm-12 col-md-12 col-xs-12'>

        <form action="{{action('DemoController@save')}}" method="POST">
          {{csrf_field()}}


          <div class="form-group">
            <label class="form-label" for=''>Placa</label>
            <input type="text" name="placa" class="form-control" value="">
          </div>
          <div class="form-group">
            <label class="form-label" for=''>Modelo</label>
            <input type="text" name="modelo" class="form-control" value="">
          </div>
          <div class="form-group">
            <label class="form-label" for=''>Anio</label>
            <input type="text" name="anio" class="form-control" value="">
          </div>
          <div class="form-group">
            <label class="form-label" for=''>Precio</label>
            <input type="text" name="precio" class="form-control" value="">
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
            <label class="form-label" for=''>Socio</label>
            <select name="idsocio" class="form-control">
              <option v-for="so in sos" name="idsocio" class="form-control" :value="so.idsocio">@{{so.nombre}}</option>
            </select>
          </div>

          <div>
           <div class="form-group">
             <label class="form-label" for="">Fecha de Servicio</label>
             <vuejs-datepicker
              input-class="form-control" 
              placeholder="Selecciona una fecha"
             format="yyyy-MM-dd" 
             :language="lenguaje"
             v-model="fecha_servicio"
             name="fecha_servicio"></vuejs-datepicker>
           </div>
         </div>
          
         <div class="form-group">
            <label class="form-label" for=''>Estacion</label>
            <select name="idestacion" class="form-control">
              <option v-for="es in est" name="idestacion" class="form-control" :value="es.idestacion">@{{es.nombre}}</option>
            </select>
          </div>
          
          <div class="form-group">
            <label class="form-label" for=''>Horario</label>
            <select name="idhorario" class="form-control">
              <option v-for="ho in hor" name="idhorario" class="form-control" :value="ho.idhorario">@{{ho.hora_inicial}}</option>
            </select>
          </div>
          
          <div class="form-group">
            <label class="form-label" for=''>Origen</label>
            <input type="text" name="origen" class="form-control" value="">
          </div>
          


           <input type="submit" class="btn btn-success" name="operacion" value="Agregar">
          
          <input type="submit" class="btn btn-warning" name="operacion" value="Cancelar">
        </form>
      </div>
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
      ,est:<?php echo json_encode($est);?>
      ,hor:<?php echo json_encode($hor);?>
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