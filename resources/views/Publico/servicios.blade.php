@extends("theme.$theme.layout")
@section('contenido')
<section class="hero-wrap hero-wrap-2" style="background-image: url('../assets/thebigboss/images/fotos/fondoo.JPG');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h2 class="mb-0 bread">Servicios</h2>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Inicio <i class="ion-ios-arrow-round-forward"></i></a></span> <span>Servicios <i class="ion-ios-arrow-round-forward"></i></span></p>
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


 

@endsection


    