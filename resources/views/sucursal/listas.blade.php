@extends('app.master')

@section('titulo')
Sucursales
@endsection

@section('contenido')
<!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i>Lista de sucursales</button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
         <div class="row">
      <div class="col-md-12">
        <form action="{{action('SucursalController@formulario')}}" method="POST">
          {{csrf_field()}}
          <button class="btn btn-success">Agregar</button>
          
        </form>
      </div>
      
    </div>
    <div class="row">
      <div class='col-sm-12 col-md-12 col-xs-12'>
        <h1>Lista de sucursales</h1>
        <table class="table">
          <tr>
            <th>Nombre</th>
          </tr>
          @foreach($listas as $elemento)
            <tr>
            <td><a href="{{action('SucursalController@formulario',["idsucursal"=>$elemento->idsucursal])}}" method="POST">{{$elemento->nombre}}</a></td>
          </tr>
          @endforeach
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