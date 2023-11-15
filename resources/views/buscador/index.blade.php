@extends('app.master')

@section('titulo')
Buscador
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
        <form action="{{action('BuscadorController@index')}}" method="POST">
          {{csrf_field()}}
          <div class="form-group">
            <label>Buscar</label>
            <input type="text" name="criterio" value="{{$criterio}}" placeholder="Escribir nombre personal, nombre del cliente, numero de placa " class="form-control"></input>
          </div>
          <button class="btn btn-success">Buscar</button>
        </form>
      </div>
    </div>
    <div id="app" class="row">  
      <div v-if="registros.length!=0" class='col-sm-12 col-md-12 col-xs-12'>
        <div class="panel panel-default">
          <div class="panel-heading">
          <h3 class="panel-title">Busqueda rapida</h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label>Tipo de Servicio</label>
            <select class="form-control" v-model="filtro_tipo" >
              <option v-for="tip in tipos" :value="tip">@{{tip}}</option>
            </select>
          </div>

          <div class="form-group">
            <label>Modelos</label>
            <select class="form-control" v-model="filtro_modelo" >
              <option v-for="mod in modelos" :value="mod">@{{mod}}</option>
            </select>
          </div>
        </div>

        <div class="form-group">
            <label>Tipo Socio</label>
            <select class="form-control" v-model="filtro_tiposocio" >
              <option v-for="tipso in socios" :value="tipso">@{{tipso}}</option>
            </select>
          </div>
        
        

        </div>
      </div>
        <div v-if="registros.length!=0" class='col-sm-12 col-md-12 col-xs-12'>
        <h1>Resultados de busqueda</h1>
        <table class="table">
          <tr>
            <th>Placa</th>
            <th>Modelo / Año</th>
            <th>Precio</th>
            <th>Tipo de servicio</th>
            <th>Personal</th>
            <th>Socio</th>
            <th>Tipo Socio</th>
          </tr>

          <tr v-for="elemento in registros_final">
            <td>@{{elemento.placa}}</td>
            <td>@{{elemento.modelo+' '+elemento.anio}}</td>
            <td>@{{elemento.precio}}</td>
            <td>@{{elemento.tipo_servicio}}</td>
            <td>@{{elemento.personal}}</td>
            <td>@{{elemento.socio}}</td>
            <td>@{{elemento.nomtipo}}</td>
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
      registros:<?php echo json_encode($registros);?>
      ,filtro_tipo:'Todos'
      ,filtro_modelo:'Todos'
      ,filtro_tiposocio:'Todos'
      ,tipos:[]
      ,modelos:[]
      ,socios:[]
      }
    ,methods:{
      borrar:function(){
        this.registros_final.splice(0,this.registros_final.length);
      }
      ,filtrar:function(){
        this.borrar();
        for(i=0;i<this.registros.length;i++){
          bandera=false;
          if(this.filtro_tipo=='Todos')
            bandera=true;
          else{
            if (this.filtro_tipo==this.registros[i].tipo_servicio)
              bandera=true;
          }
          if(bandera){
            this.registros_final.push(this.registros[i]);
          }
        }
      }
    }
    ,computed:{
      registros_final:function(){
        lista=[];

        self=this;
        lista=this.registros.filter(function(item){
          bandera_tip=false;
          bandera_mod=false;
          bandera_tipso=false;
          if(self.filtro_tipo=='Todos')
            bandera_tip=true;
          else{
            if (self.filtro_tipo==item.tipo_servicio)
              bandera_tip=true;
          }

           if(self.filtro_modelo=='Todos')
            bandera_mod=true;
          else{
            if (self.filtro_modelo==item.modelo)
              bandera_mod=true;
          }

          if(self.filtro_tiposocio=='Todos')
            bandera_tipso=true;
          else{
            if(self.filtro_tiposocio==item.nomtipo)
              bandera_tipso=true;
          }
          
          return bandera_tip&&bandera_mod&&bandera_tipso;
        })
        return lista;
      }
    }
    ,created(){
      this.tipos.push('Todos');
      this.modelos.push('Todos');
      this.socios.push('Todos');
      for(i=0;i<this.registros.length;i++){
        if(this.tipos.indexOf(this.registros[i].tipo_servicio)==-1){
          this.tipos.push(this.registros[i].tipo_servicio);
        }

         if(this.modelos.indexOf(this.registros[i].modelo)==-1){
          this.modelos.push(this.registros[i].modelo);
        }

        if(this.socios.indexOf(this.registros[i].nomtipo)==-1){
          this.socios.push(this.registros[i].nomtipo);
        }
      }
      //console.log(this.tipos);
    }
  })
</script>
@endsection