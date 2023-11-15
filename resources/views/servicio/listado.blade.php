@extends('app.master')

@section('titulo')
Lista de servicios
@endsection

@section('contenido')
<!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Listado</h3>

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
        <form action="{{action('ServicioController@formulario')}}" method="POST">
          {{csrf_field()}}
          <button class="btn btn-success">Agregar</button>
          
        </form>
      </div>
      
    </div>
    <div id="app" class="row">
      <div class='col-sm-12 col-md-12 col-xs-12'>
        <h1>Lista de servicios</h1>
        <table class="table">
          <tr>
            <th>Placa</th>
            <th>Modelo / año</th>
            <th>Tipo de servicio</th>
            <th>precio</th>
            <th>personal</th>
            <th>Socio</th>
            <th>Fecha creacion</th>
            <th>Fecha atencion</th>
            
          </tr>
            <tr v-for="elemento in lista">
            <td><a :href="url_editar+'?idservicio='+elemento.idservicio">@{{elemento.placa}}</a></td>
            <td>@{{elemento.modelo+' '+elemento.anio}}</td>
            <td>@{{elemento.nomservicio}}</td>
            <td>@{{elemento.precio}}</td>
            <td>@{{elemento.nompersonal}}</td>
            <td>@{{elemento.nomsocio}}</td>
            <td>@{{elemento.fecha_creacion | formato_fecha}}</td>
            <td>@{{elemento.fecha_atencion_final | formato_fecha}}</td>
            
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
      ,url_editar:"{{action('ServicioController@formulario')}}"

    }
    ,methods:{}
    ,filters:{
      formato_fecha:function(fecha){
        datos=fecha.split('-');
        //console.log(fecha,datos);
        anio=datos[0];
        mes=datos[1];
        dia=datos[2];
        switch(mes){
          case '01':
          mes=' Enero ';
          break;
          case '02':
          mes=' Febrero ';
          break;
          case '03':
          mes=' Marzo ';
          break;
          case '04':
          mes=' Abril ';
          break;
          case '05':
          mes=' Mayo ';
          break;
          case '06':
          mes=' Junio ';
          break;
          case '07':
          mes=' Julio ';
          break;
          case '08':
          mes=' Agosto ';
          break;
          case '09':
          mes=' Septiembre ';
          break;
          case '10':
          mes=' Octubre ';
          break;
          case '11':
          mes=' Noviembre ';
          break;
          case '12':
          mes=' Diciembre ';
          break;
        }
        cadena_fecha=dia+' de'+mes+' de '+anio;
        return cadena_fecha;
      }
    }
  });
</script>
@endsection
