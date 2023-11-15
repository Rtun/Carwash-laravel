@extends('app.master')

@section('titulo')
Formulario Socios
@endsection

@section('style')

     <style type="text/css">
       #dropzone{
        border-radius: 5px;
        padding: 40px;
        border-style: dashed;
       }
       .inactivo{
        background-color: #C5CAE9;
        border-color: #4527A0;
       }
       .conarchivo{
        background-color:#B2DFDB;
        border-color: #2E7D32;
       }
       .sinarchivo{
        background-color:#FFCDD2;
        border-color: #C62828;
       }
       #foto{
        display: none;
       }
       #archivo{
        cursor: pointer;
       }
       .invalido{
        background-color: #FF5252;
        border-color: #D50000;
       }
     </style>
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
          <div id="app" class="row">
      <div class='col-sm-12 col-md-12 col-xs-12'>

        <form enctype="multipart/form-data" action="{{action('SocioController@save')}}" method="POST">
          {{csrf_field()}}
          <div class="form-group">
            <input type="hidden" name="idsocio" class="form-control" value="{{$socios->idsocio}}">
          </div>

          <div class="form-group">
            <label class="form-label" for=''>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{$socios->nombre}}">
          </div>

          <div class="form-group">
            <label class="form-label" for=''>Tipo</label>
            <select  name="idtiposocio" class="form-control" >
             <option v-for="tipo in tipos" :value="tipo.idtiposocio">@{{tipo.nombre}}</option> 
            </select>
          </div>
          
          <div class="form-group">
            
            <input id="foto" type="file" name="foto" class="form-control " ref="campo" @onchange="cambiar">
          </div>
          <div id="dropzone" 
          @dragover="dragover($event)"
            @dragleave="dragleave($event)"
            @drop="drop($event)" :class="clase">

            Favor de depositar el archivo o hacer click <label id="archivo" class="form-label" for='foto'><strong>Aqui</strong></label> 
            <div><span>@{{nombre_archivo}}</span> 
              <div v-show="nombre_archivo!=''"><a @click="remove" href="#">Quitar</a></div>
            </div>
          </div>
          <br>
          <img :src="url" width="150"> <br/>
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

@section('script')
<script type="text/javascript">
  new Vue({
      el:'#app',
      data:{
       idsocio:'{{$socios->idsocio}}'
       ,nombre:'{{$socios->nombre}}'
       ,idtiposocio:'{{$socios->idtiposocio}}'
       ,tipos:<?php echo json_encode($tipos);?>
       ,tipos_permitidos:['image/png','image/jpeg']
       ,url:'{{URL::to('/')}}/'+'{{$socios->foto}}'
       ,nombre_archivo:''
       ,clase:{
        inactivo:true
        ,conarchivo:false
        ,sinarchivo:false
        ,invalido:false
       }
      }
      ,methods:{
        remove:function(){
          this.$refs.campo.value='';
          this.nombre_archivo='';
          this.url='';
        }
        ,cambiar:function(){
          ultimo=this.$refs.campo.files.length-1;
        if(this.tipos_permitidos.indexOf(this.$refs.campo.files[ultimo].type)!=-1){
          this.nombre_archivo=this.$refs.campo.files[ultimo].name;
          this.url = URL.createObjectURL(this.$refs.campo.files[ultimo]);
          //console.log('archivo valido')
        }
       else{
        this.clase.conarchivo=false;
        this.clase.sinarchivo=false;
        this.clase.inactivo=false;
        this.clase.invalido=true;
        }
      }

       ,dragover:function($event){
        event.preventDefault();
        this.clase.conarchivo=false;
        this.clase.sinarchivo=false;
        this.clase.inactivo=true;
        this.clase.invalido=false;
       }
       ,dragleave:function($event){
        event.preventDefault();
        this.clase.conarchivo=false;
        this.clase.sinarchivo=true;
        this.clase.inactivo=false;
        this.clase.invalido=false;
       }
       ,drop:function($event){
        event.preventDefault();
        //el event es el objeto, data transfer es un atributo de referencia de los archivos del evento y files son los archivos asociados al evento
        this.$refs.campo.files=event.dataTransfer.files;
        this.clase.conarchivo=true;
        this.clase.sinarchivo=false;
        this.clase.inactivo=false;
        this.clase.invalido=false;
        this.cambiar();
       }
  }

    });
</script>
@endsection