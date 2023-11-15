@extends('app.master')

@section('titulo')
Formulario Sucursales
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
          <div class="row">
      <div class='col-sm-12 col-md-12 col-xs-12'>

        <form action="{{action('SucursalController@save')}}" method="POST">
          {{csrf_field()}}

          <div class="form-group">
            <input type="hidden" name="idsucursal" class="form-control" value="{{$sucursal->idsucursal}}">
          </div>

          <div class="form-group">
            <label class="form-label" for=''>Nombre Sucursal</label>
            <input type="text" name="nombre" class="form-control" value="{{$sucursal->nombre}}">
          </div>

           <input type="submit" class="btn btn-success" name="operacion" value="{{$operacion}}">
          @if($operacion=='Editar')
          <input type="submit" class="btn btn-danger" name="operacion" value="Eliminar">
       
          @endif
          <input type="submit" class="btn btn-warning" name="operacion" value="Cancelar">
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