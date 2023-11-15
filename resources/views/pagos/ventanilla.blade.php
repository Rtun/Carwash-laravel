@extends('app.master')

@section('titulo')
Pagos por ventanilla
@endsection
 
@section('contenido')
<div class="card">
    <div class="crad-body">
        <form action="{{action('PagoController@ventanilla')}}" name="frm" method="POST">
        {{csrf_field()}}
            <div class="form-group">
                <label for="">Numero de servicio</label>
                <input type="text" class="form-control" value="" name="idservicio">
            </div>
            <button class="btn btn-success" type="submit">Buscar Servicio</button>
        </form>
        @if(isset($servicio))
        <hr>
        <form action="">
            <div class="form-group row">

                <div class="col-md-4">
                    <label for="">Socio</label>
                    <input type="text" class="form-control" readonly  value="{{$servicio->cliente}}">
                </div>
                
                <div class="col-md-4">
                    <label for="">Tipo Servicio</label>
                    <input type="text" class="form-control" readonly  value="{{$servicio->tipos}}">
                </div>
                
                <div class="col-md-4">
                    <label for="">Fecha de atención</label>
                    <input type="text" class="form-control" readonly  value="{{$servicio->fecha_atencion_inicial}}">
                </div>

            </div>

            <div class="form-group row">

                <div class="col-md-3">
                    <label for="">Estacion</label>
                    <input type="text" class="form-control" readonly  value="{{$servicio->nomestacion}}">
                </div>

                <div class="col-md-3">
                    <label for="">Placa</label>
                    <input type="text" class="form-control" readonly  value="{{$servicio->placa}}">
                </div>
                
                <div class="col-md-3">
                    <label for="">Modelo</label>
                    <input type="text" class="form-control" readonly  value="{{$servicio->modelo}}">
                </div>
                
                <div class="col-md-3">
                    <label for="">Año</label>
                    <input type="text" class="form-control" readonly  value="{{$servicio->anio}}">
                </div>

            </div>
            <div class="row">
                <h3>Total: ${{$servicio->precio}}</h3>
            </div>
        </form>
        <div id="app"></div>
        @endif
    </div>
</div>
@endsection

@section('javascripts')
@if(isset($servicio))
<script src="https://js.stripe.com/v2/"></script>
      <script>
      var llave_publica='pk_test_51KhOMdCls0jBo5C1icaTBMNRCQLAausSBpBP8HaOspYBql4eMldJ31vtqKf8cpM0eOzE0jMIIHWgekOmDrw5gCyV00NuXleUBM';
      var servicio={{$servicio->idservicio}};
      var laravel_token='{{csrf_token()}}';
      var url_pago='{{action('PagoController@realizar_pago')}}';
      </script>
      <script src="{{asset('public/card_pay/build.js')}}"></script>
@endif
@endsection