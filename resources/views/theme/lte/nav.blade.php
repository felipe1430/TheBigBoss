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
        {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- Message Start -->      
            @foreach ($mensaje as $item)
          <a href="" class="dropdown-item" data-toggle="modal" data-target="#mimodalejemplo5"  data-id='{{$item->id}}' data-estado='{{$item->estado}}' data-created_at='{{$item->created_at}}' data-name='{{$item->name}}' data-body='{{$item->body}}'>    
            <div class="media">
              <img src="{{asset("assets/$theme2/dist/img/images.png")}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                    {{$item->name}}
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">
                    {{$item->body}}</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 
                  Fecha: {{$item->created_at}}</p>
              </div>
            </div>
            @endforeach
            <!-- Message End -->
            @endif
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">
            Ver todos los mensajes</a>
        </div> --}}
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
    <a href="#" class="brand-link">
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
          <a href="#" class="d-block"> hola, </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library
              Agregar items de administrador -->
           
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
                    <a href="{{route('ListarEmpleados')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Control De Trabajadores </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('ListarServicios')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Servicios</p>
                    </a>
                  </li>
    
                </ul>
              </li>
      
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
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
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Productos Negativos</p>
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
                  <p>Post</p>
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
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="modal fade" id="mimodalejemplo5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
              <form method="POST" action="#">
                    @csrf
          <div class="modal-body">
              <div class="card-body">
                  <h3>Envía</h3>
                  <input type="text" disabled name="name" id="name">
                </div>
             <div class="card-body">
                <h6>Mensaje</h6>
               <textarea name="body" id="body" disabled cols="57" rows="5"></textarea>
             </div>
             <div class="card-body">
               <h6>Fecha</h6>
                <input type="text" disabled name="created_at" id="created_at">
              </div>
                  <input type="hidden" name='estado' id='estado'>     
                    <input type="hidden" name='id' id='id'>     
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-warning">Eliminar Mensaje</button>
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
         </div>
        </form>
        </div>
      </div>
    </div>
     <!-- FIN Modal -->