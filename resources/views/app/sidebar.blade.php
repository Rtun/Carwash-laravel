<!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{nombre_usuario(Auth()->user())}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>   -->
          @if(validacion_rol(Auth()->user()->idrol,'SERVICIO'))
          <li class="nav-item">
            <a href="{{action('ServicioController@listado')}}" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i> 
              <p>
                Servicios 
              </p>
            </a>
          </li>
          @endif
          @if(validacion_rol(Auth()->user()->idrol,'PERSONAL'))
          <li class="nav-item">
            <a href="{{action('PersonalController@empleados')}}" class="nav-link">
              <i class="nav-icon far fa-address-book"></i>
              <p>
                Pesonal 
              </p>
            </a>
          </li>
          @endif
          @if(validacion_rol(Auth()->user()->idrol,'SOCIO'))
          <li class="nav-item">
            <a href="{{action('SocioController@socios')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Socios 
              </p>
            </a>
          </li>
          @endif
          @if(validacion_rol(Auth()->user()->idrol,'TIPOSOCIO'))
          <li class="nav-item">
            <a href="{{action('TiposocioController@listado')}}" class="nav-link">
              <i class="nav-icon fas fa-people-arrows"></i>
              <p>
                Tipo Socios 
              </p>
            </a>
          </li>
          @endif
          @if(validacion_rol(Auth()->user()->idrol,'ROLES'))
          <li class="nav-item">
            <a href="{{action('RolController@lista')}}" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Roles 
              </p>
            </a>
          </li>
          @endif
          @if(validacion_rol(Auth()->user()->idrol,'TIPOSERVICIO'))
          <li class="nav-item">
            <a href="{{action('TiposervicioController@lista')}}" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
                  Tipos de servicios
              </p>
            </a>
          </li>
          @endif
          @if(validacion_rol(Auth()->user()->idrol,'SUCURSAL'))
          <li class="nav-item">
            <a href="{{action('SucursalController@sucursal')}}" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
              Sucursales
              </p>
            </a>
          </li>
          @endif
          @if(validacion_rol(Auth()->user()->idrol,'PERMISOS'))
          <li class="nav-item">
            <a href="{{action('PermisoController@lista')}}" class="nav-link">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
              Permisos
              </p>
            </a>
          </li>
          @endif
          @if(validacion_rol(Auth()->user()->idrol,'BUSCADOR'))
          <li class="nav-item">
            <a href="{{action('BuscadorController@index')}}" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
              Buscador
              </p>
            </a>
          </li>
          @endif
          @if(validacion_rol(Auth()->user()->idrol,'RESERVARSERVICIO'))
          <li class="nav-item">
            <a href="{{action('DemoController@formulario')}}" class="nav-link">
              <i class="nav-icon fas fa-concierge-bell"></i>
              <p>
              Reservar Servicio
              </p>
            </a>
          </li>
          @endif
          @if(validacion_rol(Auth()->user()->idrol,'MATERIAS'))
          <li class="nav-item">
            <a href="{{action('MateriaPrimaController@lista')}}" class="nav-link">
              <i class="nav-icon fab fa-magento"></i>   
              <p>
              Materias Prima
              </p>
            </a>
          </li>
          @endif
          @if(validacion_rol(Auth()->user()->idrol,'ESTACIONES'))
          <li class="nav-item">
            <a href="{{action('EstacionController@lista')}}" class="nav-link">
              <i class="nav-icon fas fa-chess"></i>  <i class=""></i>
              <p>
              Estaciones
              </p>
            </a>
          </li>
          @endif
          @if(validacion_rol(Auth()->user()->idrol,'HORARIOS'))
          <li class="nav-item">
            <a href="{{action('HorarioController@lista')}}" class="nav-link">
              <i class="nav-icon far fa-clock"></i>  
              <p>
              Horarios
              </p>
            </a>
          </li>
          @endif
          @if(validacion_rol(Auth()->user()->idrol,'USUARIOS'))
          <li class="nav-item">
            <a href="{{action('UsuarioController@lista')}}" class="nav-link">
              <i class="nav-icon far fa-clock"></i>  
              <p>
              Usuarios
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->