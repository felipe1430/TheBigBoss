<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('indexadmin')}}" class="nav-link">Menu Principal</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Información</a>
      </li>
    </ul>

  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">0</span>
        </a>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notificaciones</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 nuevos mensajes
            <span class="float-right text-muted text-sm">3 minutos</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 
            peticiones de amistad
            <span class="float-right text-muted text-sm">12 horas</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 nuevos reportes
            <span class="float-right text-muted text-sm">2 dias</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">
            Ver todas las notificaciones</a>
        </div>
      </li>
      <li class="nav-item">
      <a href="{{route('logout')}}" class="nav-link">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('indexadmin')}}" class="brand-link">
      <img src="{{asset("assets/$theme2/dist/img/logobarber.jpg")}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">The Big BOSS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset("assets/$theme2/dist/img/user2-160x160.png")}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> hola, {{session()->get('nombre')}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

              <!--Agregar items de administrador -->
           
               <li class="nav-item has-treeview">
                <a href="" class="nav-link">
                  <i class="nav-icon fas fa-user-lock"></i>
                  <p>
                    Administracion
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  
                    <li class="nav-item">
                        <a href="{{route('ListarServicios')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Servicios</p>
                        </a>
                      </li>
                
                  <li class="nav-item">
                    <a href="{{route('ListarEmpleados')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Control De Trabajadores </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('ListarUsuarios')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Control De Usuarios </p>
                    </a>
                  </li>
                  
    
                </ul>
              </li>
      
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Reportes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="#" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inicio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('reporteventas')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reportes Ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('reportecomosiones')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reportes Comisiones</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="{{route('reporteservicios')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reportes servicios</p>
                  </a>
                </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search-dollar"></i>
              <p>
                Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ventas')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Post De Venta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Reservas')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reservas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Bodega
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
