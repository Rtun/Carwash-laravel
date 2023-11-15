@extends('app.master')

@section('titulo')
Socio: {{$socio->nombre}}
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

        <form action="{{action('RentaController@save')}}" method="POST">
          {{csrf_field()}}

          <div class="form-group">
            <input type="hidden" name="idrenta" class="form-control" value="{{$renta->idrenta}}">
          </div>

          <div class="form-group">
            <input type="hidden" name="idsocio" class="form-control" value="{{$renta->idsocio}}">
          </div>

          <div class="form-group">
            <label class="form-label" for=''>precio</label>
            <input type="text" name="precio" class="form-control" value="{{$renta->precio}}">
          </div>

          <div class="form-group">
            <label class="form-label" for=''>fecha inicio</label>
            <input type="text" name="fecha_inicio" class="form-control" value="{{$renta->fecha_inicio}}">
          </div>

          <div class="form-group">
            <label class="form-label" for=''>fecha fin</label>
            <input type="text" name="fecha_fin" class="form-control" value="{{$renta->fecha_fin}}">
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
