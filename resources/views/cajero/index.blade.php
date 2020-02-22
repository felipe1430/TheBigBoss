@extends("theme.$theme2.layout")
@section('contenido')

<hr>
<div class="col-md-12">
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header text-white" style="background: url('../assets/lte/dist/img/colores.png') center center;">
        <h3 class="widget-user-username text-right"></h3>
        <h5 class="widget-user-desc text-right"></h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="{{asset("assets/$theme2/dist/img/logothebigboss.png")}}" alt="User Avatar">
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-sm-12 border-right">
            <div class="description-block">
              <h5 class="description-header">The BigBoss</h5>
              <span class="description-text">Perfil De Ventas</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<hr>
<div class="row justify-content-right">
    <div class="col-md-6">
        <div class="card card-widget widget-user">
          <div class="widget-user-header bg-dark">
            <h3 class="widget-user-username">Venta Normal</h3>
            <h5 class="widget-user-desc">Registra Tus Ventas</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="{{asset("assets/$theme2/dist/img/venta.png")}}"  alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-12 border-right">
                <div class="description-block">
                  <a href="{{route('ventascajero')}}" type="btn btn-success">Seleccione Aquí</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-widget widget-user">
          <div class="widget-user-header bg-secondary">
            <h3 class="widget-user-username">Venta Con Reserva</h3>
            <h5 class="widget-user-desc">Vende Desde Una Reserva</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="{{asset("assets/$theme2/dist/img/logobarber1.png")}}"  alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-12 border-right">
                <div class="description-block">
                  <a href="{{route('Reservascajero')}}" type="btn btn-success">Seleccione Aquí</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>


@endsection