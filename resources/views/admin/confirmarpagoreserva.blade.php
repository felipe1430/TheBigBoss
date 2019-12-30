@extends("theme.$theme2.layout")
@section('contenido')


<section class="ftco-section ftco-booking bg-light">
    <div class="container ftco-relative">
      <div class="row justify-content-center pb-3">
        <div class="col-md-10 heading-section text-center ftco-animate">
          <h2 class="mb-4">Confirmar Pago</h2>
              <img width="150" height="150" class="img-circle elevation-3"
               src="{{asset("assets/$theme2/dist/img/logobarber.jpg")}}">
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-10 ftco-animate">
          <form  method="POST" action="{{route('confirmar')}}"class="appointment-form" >
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Nombre cliente</label>
                  <input type="text" class="form-control" readonly name="nombrecliente" id="nombretrabajador" value="{{$Serviciopasoreserva[0]->nombre_cliente_paso_reserva}}" >
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Apellido cliente</label>
                  <input type="text" class="form-control"  readonly name="apellidocliente" id="apellidocliente" value="{{$Serviciopasoreserva[0]->apellido_cliente_paso_reserva}}" >
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Trabajador</label>
                  <input type="text" class="form-control appointment_date" readonly name="trabajador" id="trabajador" value="{{$trabajador[0]->nombre_empleado}}" >
                </div>    
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Apellido Trabajador</label>
                  <input type="text" class="form-control appointment_time" readonly name="fechaservicio" id="fechaservicio" value="{{$trabajador[0]->apellido_empleado}}" >
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Hora Inicio Servicio</label>
                  <input type="text" class="form-control appointment_date" readonly name="ruttrabajador" id="ruttrabajador" value="{{$Serviciopasoreserva[0]->hora_inicio_paso_reserva}}">
                </div>    
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Hora Fin Servicio</label>
                  <input type="text" class="form-control appointment_time" readonly name="fechaservicio" id="fechaservicio" value="{{$Serviciopasoreserva[0]->hora_fin_paso_reserva}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                      <table id="users" class="table table-sm table-hover ">
                          <thead>
                            <tr class="table-success">
                              <th scope="col">Nombre</th>
                              <th scope="col">valor</th>
                              <th scope="col">Cantidad</th>
                              <th scope="col">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                              <div style="display: none">
                                {{-- variable suma --}}
                                  {{ $total = 0 }} 
                                </div>
                              @foreach($Serviciopasoreserva as $itemServiciopaso)
                            <tr>
                              <td>{{$itemServiciopaso->nombre_servicio_paso_reserva}}</td>
                              <td>${{number_format($itemServiciopaso->valor_paso_reserva,0,',','.')}}</td>
                              <td>{{$itemServiciopaso->cantidad}}</td>
                              <td>${{number_format($itemServiciopaso->total_paso_reserva,0,',','.')}}</td>
                              {{-- wea pulenta que me suma todo lo de la tabla "array" --}}
                              <div style="display: none">{{$total += $itemServiciopaso->total_paso_reserva}}</div>
                            </tr>
                            @endforeach
                          </tbody>
                          <tfoot>
                              <tr>
                                <td colspan="3"><strong>Total</strong> </td>
                                <td><span class="price text-success">${{number_format($total,0,',','.')}}</span></td>
                              </tr>
                            </tfoot>
                        </table>
                  </div>
              </div>
              <div class="col-sm-6">
                <div class="d-flex justify-content-start">´</div>
                <div class="d-flex justify-content-end">´</div>
                <div class="d-flex justify-content-center"><h3>Total: <span class="price text-success">${{number_format($total,0,',','.')}}</span></h3></div>
                <div class="d-flex justify-content-around">Confirme La Venta</div>
              </div>
              <hr>
            <hr>
            <div class="col-sm-6">
                <div>
                  <input type="hidden" value="{{$Serviciopasoreserva[0]->id_trabajador_paso_reserva}}" name="idempleado">
                  <input type="hidden" value="{{$total}}" name="total">
                    <button type="submit" class="btn btn-success">Realizar Pago</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
        
@endsection