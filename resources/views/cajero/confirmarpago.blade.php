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
          <form  method="POST" action="{{route('confirmarpagocajero')}}"class="appointment-form" >
          <input type="hidden" name="id_user" value="{{$User[0]->id}}">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Nombre Trabajador</label>
                  <input type="text" class="form-control" readonly name="nombrecliente" id="nombretrabajador" value="{{$trabajador[0]->nombre_empleado}}" >
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Apellido Trabajador</label>
                  <input type="text" class="form-control"  readonly name="apellidotrabajador" id="apellidotrabajador" value="{{$trabajador[0]->apellido_empleado}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Nombre Cliente</label>
                  <input type="text" class="form-control appointment_date" readonly name="user" id="user" value="{{$User[0]->name.' '.$User[0]->surname}}">
                  <input type="hidden" class="form-control appointment_date" readonly name="ruttrabajador" id="ruttrabajador" value="{{$trabajador[0]->rut_empleado}}">
                </div>    
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Fecha Servicio</label>
                  <input type="text" class="form-control appointment_time" readonly name="fechaservicio" id="fechaservicio" value="{{$date}}">
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
                              @foreach($Serviciopaso as $itemServiciopaso)
                            <tr>
                              <td>{{$itemServiciopaso->nombre_servicio_paso}}</td>
                              <td>${{number_format($itemServiciopaso->valor_servicio_paso,0,',','.')}}</td>
                              <td>{{$itemServiciopaso->cantidad_servicio_paso}}</td>
                              <td>${{number_format($itemServiciopaso->total_paso,0,',','.')}}</td>
                              {{-- wea pulenta que me suma todo lo de la tabla "array" --}}
                              <div style="display: none">{{$total += $itemServiciopaso->total_paso}}</div>
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
                <div class="d-flex justify-content-around">Confirme La Ventas</div>
              </div>
              <hr>
            <hr>
            <div class="col-sm-6">
                <div>
                  <input type="hidden" value="{{$empleado}}" name="idempleado">
                  <input type="hidden" value="{{$total}}" name="total">
                    <button type="submit" class="btn btn-success">Realizar Pago</button>
                    <a href="{{route('ventas')}}"  class="btn btn-warning btm-sm" >Revertir</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
        
@endsection