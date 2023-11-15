@extends('app.master')

@section('titulo')
Formulario de registro
@endsection

@section('contenido')
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Llenar los datos</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          
        <div id="app" class="row">
            <form enctype="multipart/form-data" action="{{action('Auth\RegisterController@register')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="idusuario" class="form-control" value="">
                <div class="form-group">
                    <label class="form-label" for="">Email</label>
                    <input type="email" value="" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label" for="">Password</label>
                    <input type="password" value="" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label" for="">Rol</label>
                    <select name="idrol" class="form-control">
                        <option value="1">Gerente</option>
                        <option value="2">Administrativo</option>
                        <option value="3">Personal</option>
                        <option value="4">Socio</option>
                    </select>
                </div>

                

                <input type="submit" @click="validar_formulario($event)" class="btn btn-success" name="operacion" value="Registrar">
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
<script>
        new Vue({
            el:'#app',
            data:{
                
            }
            ,methods:{}

        });
</script>

@endsection


