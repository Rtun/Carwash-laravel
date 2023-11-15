<form action="{{action('BuscadorController@index')}}" method="POST" class="form-inline ml-3">
    {{csrf_field()}}
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search"name="criterio" value="" placeholder="Escribir nombre personal, nombre del cliente, numero de placa ">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
 </form>
