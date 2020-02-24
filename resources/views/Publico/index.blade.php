@extends("theme.$theme.layout")
@section('titulo')
    The Big Boss
@endsection

@section('contenido')


<section class="hero-wrap js-fullheight" style="background-image: url(../assets/thebigboss/images/fotos/fondo.JPG);" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight justify-content-center align-items-center">
      <div class="col-lg-12 ftco-animate d-flex align-items-center">
        <div class="text text-center">
          <span class="subheading">Bienvenidos</span>
          <h1 class="mb-4">The Big Boss Barber Shop</h1>
          <p><a href="{{route('ReservasCliente')}}" class="btn btn-primary btn-outline-primary px-4 py-2">Reservar ahora</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
  <div class="container-fluid px-0">
    <div class="row no-gutters">
      <div class="col-md text-center d-flex align-items-stretch">
        <div class="services-wrap d-flex align-items-center img" style="background-image: url(../assets/thebigboss/images/fotos/barba2.jpg);">
          <div class="text">
            <h3>Para Hombres</h3>
            <p><a href="#" class="btn-custom">Ver Estilos...<span class="ion-ios-arrow-round-forward"></span></a></p>
          </div>
        </div>
      </div>
      <div class="col-md-3 text-center d-flex align-items-stretch">
        <div class="text-about py-5 px-4">
          <h1 class="logo">
            <a href="#"><span class="flaticon-scissors-in-a-hair-salon-badge"></span>The Big Boss</a>
          </h1>
          <h2>
            Bienvenido A Nuestra Barberia </h2>
          <p>La imagen personal cobra una especial importancia en una sociedad como la actual, en donde el éxito debe ir acompañado de un look impecable. No se trata únicamente de una cuestión de moda, sino de un imperativo social. </p>
          <p class="mt-3"><a href="#" class="btn btn-primary btn-outline-primary">Leer Mas...</a></p>
        </div>
      </div>
      <div class="col-md text-center d-flex align-items-stretch">
        <div class="services-wrap d-flex align-items-center img" style="background-image: url(../assets/thebigboss/images/fotos/mujer.jpg);">
          <div class="text">
            <h3>Para Mujeres</h3>
            <p><a href="#" class="btn-custom">Ver Estilos...<span class="ion-ios-arrow-round-forward"></span></a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="services-section ftco-section">
  <div class="container">
    <div class="row justify-content-center pb-3">
      <div class="col-md-10 heading-section text-center ftco-animate">
        <span class="subheading">Servicios</span>
        <h2 class="mb-4">
          MENÚ DE SERVICIOS</h2>
        <p>Ponemos a Su Disposición Los Servicios Como</p>
      </div>
    </div>
    <div class="row no-gutters d-flex">
      <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services d-block text-center">
          <div class="icon"><span class="flaticon-male-hair-of-head-and-face-shapes"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">
              Corte de pelo &amp; Estilo</h3>
            <p>Asesoría, corte y lavado de cabello.</p>
          </div>
        </div>    
      </div>
      <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services d-block text-center">
          <div class="icon"><span class="flaticon-beard"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Barba</h3>
            <p>Arreglo De Barba, Asesoria y Limpieza Facial.</p>
          </div>
        </div>      
      </div>
      <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services d-block text-center">
          <div class="icon"><span class="flaticon-beauty-products"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Maquillaje</h3>
            <p>Manicura, limpieza De Cutis, Difuminados, y Posticería. </p>
          </div>
        </div>      
      </div>
      <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services d-block text-center">
          <div class="icon"><span class="flaticon-healthy-lifestyle-logo"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">
              Compromiso Social</h3>
            <p>En The Big Boss Tenemos la Misión De Entregar Un Servicio De Excelente Calidad a La Comunidad.</p>
          </div>
        </div>      
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-team">
  <div class="container-fluid px-md-5">
    <div class="row justify-content-center pb-3">
      <div class="col-md-10 heading-section text-center ftco-animate">
        <span class="subheading">Estilistas y Barberos</span>
        <h2 class="mb-4">
          Profesionales</h2>
        <p>Calidad, Compromiso y Responsabilidad Son Unas De Las Cualidades Que Poseen Nuestros Trabajadores.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <div class="carousel-team owl-carousel">

          @foreach ($barberos as $item)
                
          <div class="item">
          <a href="{{route('calendario',$item->id_empleado)}}" class="team text-center">
          <div class="img" style="background-image: url(../assets/thebigboss/images/barberos/{{$item->imagen}});"></div>
              <h2>{{$item->nombre_empleado}}</h2>
              <span class="position">Barbero</span>
            </a>
          </div>
          @endforeach
          
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
  <div class="container">
    <div class="row no-gutters justify-content-center mb-5 pb-2">
      <div class="col-md-6 text-center heading-section ftco-animate">
        <span class="subheading">Trabajos Profecionales</span>
        <h2 class="mb-4">Galeria De Fotos</h2>
        <p>Conoce los Trabajos De Nuestros Profecionale y sus Servicios de Corte De Pelo Con Tijera - Navaja, Modelados, Manicura, Limpieza De Cutis, Difuminados, y Posticería. </p>
      </div>
    </div>
  </div>
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="project">
          <img src="{{asset("assets/$theme/images/fotos/barba3.jpg")}}" class="img-fluid" alt="Colorlib Template">
          <div class="text">
            <span>Stylist</span>
            <h3><a href="project.html">Beard</a></h3>
          </div>
          <a href="{{asset("assets/$theme/images/fotos/barba3.jpg")}}" class="icon image-popup d-flex justify-content-center align-items-center">
            <span class="icon-expand"></span>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="project">
          <img src="{{asset("assets/$theme/images/fotos/galeria/cosa.jpg")}}" class="img-fluid" alt="Colorlib Template">
          <div class="text">
            <span>Beauty</span>
            <h3><a href="project.html">Haircut</a></h3>
          </div>
          <a href="{{asset("assets/$theme/images/fotos/galeria/cosa.jpg")}}" class="icon image-popup d-flex justify-content-center align-items-center">
            <span class="icon-expand"></span>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="project">
          <img src="{{asset("assets/$theme/images/fotos/galeria/paramujeres.jpg")}}" class="img-fluid" alt="Colorlib Template">
          <div class="text">
            <span>Beauty</span>
            <h3><a href="project.html">Hairstylist</a></h3>
          </div>
          <a href="{{asset("assets/$theme/images/fotos/galeria/paramujeres.jpg")}}" class="icon image-popup d-flex justify-content-center align-items-center">
            <span class="icon-expand"></span>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="project">
          <img src="{{asset("assets/$theme/images/fotos/galeria/img.JPG")}}" class="img-fluid" alt="Colorlib Template">
          <div class="text">
            <span>Beauty</span>
            <h3><a href="project.html">Haircut</a></h3>
          </div>
          <a href="{{asset("assets/$theme/images/fotos/galeria/img.JPG")}}" class="icon image-popup d-flex justify-content-center align-items-center">
            <span class="icon-expand"></span>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="project">
          <img src="{{asset("assets/$theme/images/fotos/galeria/img2.JPG")}}" class="img-fluid" alt="Colorlib Template">
          <div class="text">
            <span>Beauty</span>
            <h3><a href="project.html">Makeup</a></h3>
          </div>
          <a href="{{asset("assets/$theme/images/fotos/galeria/img2.JPG")}}" class="icon image-popup d-flex justify-content-center align-items-center">
            <span class="icon-expand"></span>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="project">
          <img src="{{asset("assets/$theme/images/fotos/galeria/img3.JPG")}}" class="img-fluid" alt="Colorlib Template">
          <div class="text">
            <span>Fashion</span>
            <h3><a href="project.html">Model</a></h3>
          </div>
          <a href="{{asset("assets/$theme/images/fotos/galeria/img3.JPG")}}" class="icon image-popup d-flex justify-content-center align-items-center">
            <span class="icon-expand"></span>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="project">
          <img src="{{asset("assets/$theme/images/fotos/galeria/maquina1.JPG")}}" class="img-fluid" alt="Colorlib Template">
          <div class="text">
            <span>Beauty</span>
            <h3><a href="project.html">Makeup</a></h3>
          </div>
          <a href="{{asset("assets/$theme/images/fotos/galeria/maquina1.JPG")}}" class="icon image-popup d-flex justify-content-center align-items-center">
            <span class="icon-expand"></span>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="project">
          <img src="{{asset("assets/$theme/images/fotos/galeria/img4.JPG")}}" class="img-fluid" alt="Colorlib Template">
          <div class="text">
            <span>Beauty</span>
            <h3><a href="project.html">Makeup</a></h3>
          </div>
          <a href="{{asset("assets/$theme/images/fotos/galeria/img4.JPG")}}" class="icon image-popup d-flex justify-content-center align-items-center">
            <span class="icon-expand"></span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section ftco-team">
    <div class="container-fluid px-md-5">
      <div class="row justify-content-center pb-3">
        <div class="col-md-10 heading-section text-center ftco-animate">
          <span class="subheading">Conoce nuestros servicios</span>
          <h2 class="mb-4">
            Servicios</h2>
          <p>Excelente Calidad, Atención Y Precios</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 ftco-animate">
          <div class="carousel-team owl-carousel">
            @if (empty($servicios))
                
            @else
            @foreach($servicios as $item)
            <div class="pricing-entry pb-5 text-center">
              <div>
                <h3 class="mb-4">{{$item->nombre_servicio}}</h3>
                <p><span class="price">${{number_format($item->valor_servicio,0,',','.')}}</span> <span class="per">/ session</span></p>
              </div>
              <ul>
                <li>{{$item->descripcion_servicio}}</li>
              </ul>
              <p class="button text-center"><a href="#" class="btn btn-primary px-4 py-3">Reservar</a></p>
            </div>
     @endforeach
            @endif
             
          </div>
        </div>
      </div>
    </div>
  </section>

<section class="testimony-section bg-light">
  <div class="container">
    <div class="row ftco-animate justify-content-center">
      <div class="col-md-6 col-lg-5 d-flex">
        <div class="testimony-img" style="background-image: url(../assets/thebigboss/images/fotos/corte.jpg);"></div>
      </div>
      <div class="col-md-6 col-lg-7 py-5 pl-md-5">
        <div class="py-md-5">
          <div class="heading-section ftco-animate">
            <span class="subheading">Profesionales De Primera Categoria</span>
            <h2 class="mb-0">The Big Boss</h2>
          </div>
          <div class="carousel-testimony owl-carousel ftco-animate">

            @foreach ($barberos as $item)
            <div class="item">
              <div class="testimony-wrap pb-4">
                <div class="text">
                  <p class="mb-4">{{$item->descripcion_empleado}}</p>
                </div>
                <div class="d-flex">
                  <div class="user-img" style="background-image: url('{{Storage::url($item->imagen)}}')">
                  </div>
                  <div class="pos ml-3">
                    <p class="name">{{$item->nombre_empleado}}</p>
                    {{-- <span class="position">Businessman</span> --}}
                  </div>
                </div>
              </div>
            </div>
            @endforeach
           





          </div>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection
