@extends('app.master')

@section('titulo')
Rentas de {{$socio->nombre}}
@endsection

@section('contenido')
<!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i>Lista</button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
         <div class="row">
      <div class="col-md-12">
        <form action="{{action('RentaController@formulario')}}" method="POST">
          {{csrf_field()}}
          <input type="hidden" name="idsocio" value="{{$socio->idsocio}}">
          <button class="btn btn-success">Agregar</button>
          
        </form>
      </div>
      
    </div>
    <div id="app" class="row">
      <div class='col-sm-12 col-md-12 col-xs-12'>
        <h1>Lista de rentas</h1>
        <table class="table">
          <tr>
            <th>precio</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
          </tr>
          
            <tr v-for="elemento in listas">
            <td><a :href="url_editar+'?idrenta='+elemento.idrenta">@{{elemento.precio}}</a></td>
            <td>@{{elemento.fecha_inicio | formato_fecha}}</td>
            <td>@{{elemento.fecha_fin | formato_fecha}}</td>
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
      listas:<?php echo json_encode($listas);?>
      ,url_editar:"{{action('RentaController@formulario')}}"
    },
    methods:{}
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