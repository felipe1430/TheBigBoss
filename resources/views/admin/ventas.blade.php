@extends("theme.$theme2.layout")
@section('contenido')


<section class="ftco-section ftco-booking bg-light">
    <div class="container ftco-relative">
      <div class="row justify-content-center pb-3">
        <div class="col-md-10 heading-section text-center ftco-animate">
          {{-- <span class="subheading">The Big Boss</span> --}}
          <h2 class="mb-4">The Big Boss</h2>
              <img width="150" height="150" class="img-circle elevation-3"
               src="{{asset("assets/$theme2/dist/img/logobarber.jpg")}}">
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-10 ftco-animate">
          <form  method="POST" action="{{route('enviarpago')}}"class="appointment-form" >
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="appointment_name" placeholder="Nombre Cliente">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="appointment_email" placeholder="Fecha Reserva">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control appointment_date" placeholder="Apellido Cliente">
                </div>    
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control appointment_time" placeholder="Hora Inicio">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="select-wrap">
                    <select name="" id="" class="form-control">
                        <option value="">Trabajador</option>
                        @foreach($empleado as $itemEmpleado)
                      <option value="{{$itemEmpleado->id_empleado}}">{{$itemEmpleado->nombre_empleado}} {{$itemEmpleado->apellido_empleado}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="phone" placeholder="Hora Termino">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                      <table id="users" class="table table-sm table-hover">
                          <thead>
                            <tr>
                              <th scope="col">Nombre</th>
                              <th scope="col">valor</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($Servicio as $itemServicio)
                            <tr>
                              <td>{{$itemServicio->nombre_servicio}}</td>
                              <td>${{number_format($itemServicio->valor_servicio,0,',','.')}}</td>
                              <td><input type="checkbox"></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                </div>
              </div>
            </div>
            <div class="form-group">
               <a href="" data-toggle="modal" data-target="#mimodalventa" class="btn btn-primary btm-sm" >PAGAR</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
    <!-- Modal -->
    <div class="modal fade" id="mimodalventa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header border-bottom-0">
              <h5 class="modal-title" id="exampleModalLabel">
                Finalizar Pago
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-image">
                <thead>
                  <tr>
                    <th scope="col">The Big Boss</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">valor</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="w-25">
                        <img width="150" height="150" class="img-circle elevation-3"
                        src="{{asset("assets/$theme2/dist/img/logobarber.jpg")}}">
                    </td>
                    <td>Corte de cabello</td>
                    <td>$14.000</td>
                    <td>2</td>
                    <td>$28.000</td>
                    <td>
                      <a href="#" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table> 
              <div class="d-flex justify-content-end">
                <h5>Total: <span class="price text-success">$ 28.000</span></h5>
              </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-success">Pagar</button>
            </div>
          </div>
        </div>
      </div>
       <!-- FIN Modal -->

        
@endsection