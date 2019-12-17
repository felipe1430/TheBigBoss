@extends("theme.$theme2.layout")
@section('contenido')

<section class="ftco-section ftco-degree-bg">
    <br>
        <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                          <h3>{{$compras}}</h3>
                        <p>Compras en el dia</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="#" class="small-box-footer">{{$date}}</a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>454<sup style="font-size: 20px"><!--%--></sup></h3>
          
                        <p>Productos Negativos</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="#" class="small-box-footer">Mas info.<i class=""></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>{{$registros}}</h3>
          
                        <p>Usuarios Registrados</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="{{route('ListarUsuarios')}}" class="small-box-footer">Ver Todos<i class=""></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>65</h3>
          
                        <p>visitas del dia </p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="#" class="small-box-footer">FECHA<i class=""></i></a>
                    </div>
                  </div>
                </div>
          
              </div>
              <div class="row justify-content-right">
                <div class="col-md-6">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
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
                              <a href="{{route('ventas')}}" type="btn btn-success">Seleccione Aquí</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
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
                              <a href="" type="btn btn-success">Seleccione Aquí</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

</section>



@endsection