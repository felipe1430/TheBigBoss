@extends("theme.$theme2.layout")
@section('contenido')

<section class="ftco-section ftco-degree-bg">
    <br>
        <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-3 col-6">
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
                  <div class="col-lg-3 col-6">
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
                  <div class="col-lg-3 col-6">
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
                  <div class="col-lg-3 col-6">
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
                              <a href="{{route('ventas')}}" type="btn btn-success">Seleccione Aquí</a>
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
                              <a href="{{route('Reservas')}}" type="btn btn-success">Seleccione Aquí</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <h5 class="mb-2">Acceso Rapido a Consultas</h5>
            <div class="row">
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="fas fa-tags"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Ventas</span>
                    <a href="{{route('reporteventas')}}" type="btn btn-success">Seleccione Aquí</a> </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-success"><i class="fas fa-balance-scale"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Comisiones</span>
                    <a href="{{route('reportecomosiones')}}" type="btn btn-success">Seleccione Aquí</a> </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-warning"><i class="fas fa-cut"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Servicios</span>
                    <a href="{{route('reporteservicios')}}" type="btn btn-success">Seleccione Aquí</a> </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-danger"><i class="far fa-edit"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Gastos</span>
                    <a href="{{route('reportegastos')}}" type="btn btn-success">Seleccione Aquí</a> </div>
                </div>
              </div>
            </div>
</section>



@endsection