<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{route('inicio')}}"><span class="flaticon-scissors-in-a-hair-salon-badge"></span>The Big Boss</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            @if( Auth::guest() )
            <li class="nav-item active"><a href="{{route('inicio')}}" class="nav-link">Inicio</a></li>
            <li class="nav-item"><a href="{{route('serviciosweb')}}" class="nav-link">Servicios</a></li>
            <li class="nav-item"><a href="{{route('galeria')}}" class="nav-link">Galeria</a></li>
            {{-- <li class="nav-item"><a href="{{route('about')}}" class="nav-link">Acerca de</a></li> --}}
            {{-- <li class="nav-item"><a href="{{route('blog')}}" class="nav-link">Blog</a></li> --}}
            <li class="nav-item"><a href="{{route('blogsimple')}}" class="nav-link">Conocenos</a></li>
            <li class="nav-item"><a href="{{route('login')}}" class="nav-link"><i class="fas fa-users"></i>    Iniciar Sesion</a></li>
           @else
           <li class="nav-item active"><a href="{{route('inicio')}}" class="nav-link">Inicio</a></li>
            <li class="nav-item"><a href="{{route('serviciosweb')}}" class="nav-link">Servicios</a></li>
            <li class="nav-item"><a href="{{route('galeria')}}" class="nav-link">Galeria</a></li>
            {{-- <li class="nav-item"><a href="{{route('about')}}" class="nav-link">Acerca de</a></li> --}}
            {{-- <li class="nav-item"><a href="{{route('blog')}}" class="nav-link">Blog</a></li> --}}
            <li class="nav-item"><a href="{{route('blogsimple')}}" class="nav-link">Conocenos</a></li>

            @if (auth()->user()->fk_tipo_user==1)
            <li class="nav-item"><a href="{{route('indexadmin')}}" class="nav-link">Administrador</a></li>
                
            @elseif(auth()->user()->fk_tipo_user==3)

            <li class="nav-item"><a href="{{route('ReservasCliente')}}" class="nav-link">Reservas</a></li>
            @elseif(auth()->user()->fk_tipo_user==5)

            <li class="nav-item"><a href="{{route('indexcajero')}}" class="nav-link">Cajero</a></li>

            @else
           
            @endif
           <li class="nav-item"><a href="{{route('logout')}}" class="nav-link"><i class="fas fa-sign-out-alt"></i></a></li>
           @endif  
        </ul>
      </div>
    </div>
  </nav>