@extends("theme.$theme.layout")
@section('titulo')
 Reservas
@endsection
@section('style')
<link rel="stylesheet" href="{{asset("assets/$theme/css/style2.css")}}">
@endsection

@section('contenido')
<section class="ftco-section ftco-team">
    <div class="container-fluid px-md-5">
      <div class="row justify-content-center pb-3">
        <div class="col-md-10 heading-section text-center ftco-animate">
          <span class="subheading">Team The Big Boss</span>
          <h2 class="mb-4">
            Barberos</h2>
          <p>Calidad ante todo !!!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 ftco-animate">
          <div class="carousel-team owl-carousel">

            @foreach ($barberos as $item)
                
            <div class="item">
            <a href="{{route('calendario',$item->id_empleado)}}" class="team text-center">
                <div class="img" style="background-image: url(../assets/thebigboss/images/stylist-5.jpg);"></div>
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
@endsection