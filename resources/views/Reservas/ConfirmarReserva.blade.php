@extends("theme.$theme.layout")
@section('style')
<link rel="stylesheet" href="{{asset("assets/$theme/css/style2.css")}}">
@endsection
@section('contenido')

<section class="ftco-section ftco-booking bg-light">
    <div class="container ftco-relative">
      <div class="row justify-content-center pb-3">
        <div class="col-md-10 heading-section text-center ftco-animate">
          <h2 class="mb-4">Confirmar Reserva</h2>
              <img width="150" height="150" class="img-circle elevation-3"
               src="{{asset("assets/$theme2/dist/img/logobarber.jpg")}}">
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-10 ftco-animate">
          <form  method="POST" action="{{route('addEvento')}}"class="appointment-form" >
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Nombre Trabajador</label>
                  <input type="text" class="form-control" readonly name="nombrecliente" id="nombretrabajador" value="{{$Barbero[0]->nombre_empleado}}" >
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Apellido Trabajador</label>
                  <input type="text" class="form-control"  readonly name="apellidotrabajador" id="apellidotrabajador" value="{{$Barbero[0]->apellido_empleado}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Rut Trabajador</label>
                  <input type="text" class="form-control appointment_date" readonly name="ruttrabajador" id="ruttrabajador" value="{{$Barbero[0]->rut_empleado}}">
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
                      <table id="users" class="table table-sm ">
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
                                  {{$cont=0}}
                                </div>
                                
                              @foreach($serviciosSeleccionados as $itemServiciopaso)
                            <tr>
                              <td>{{$itemServiciopaso->nombre_servicio}}</td>
                              <td>${{number_format($itemServiciopaso->valor_servicio,0,',','.')}}</td>

                                    {{-- @foreach ($cantidadDeServ as $item)
                                    <td>{{$item}}</td>
                                    <td>${{number_format($item*$itemServiciopaso->valor_servicio,0,',','.')}}</td>
                                    @break
                                    @endforeach --}}

                                @for ($cont; $cont < count($cantidadDeServ); )
                                    <td>{{$cantidadDeServ[$cont]}}</td>
                                    <td>${{number_format($cantidadDeServ[$cont]*$itemServiciopaso->valor_servicio,0,',','.')}}</td>
                                    @break
                                @endfor
                              
                            
                              <div style="display: none">{{$total += $cantidadDeServ[$cont]*$itemServiciopaso->valor_servicio}}</div>
                              <div style="display: none"> {{$cont=$cont+1}} </div>
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
                <div class="d-flex justify-content-around">Confirme La Reserva</div>
              </div>
              <hr>
            <hr>
            <div class="col-sm-6">
                <div>
                  
                  <input type="hidden" value="{{$params_array['nameUser']}}" name="nameUser">
                  <input type="hidden" value="{{$params_array['idUser']}}" name="idUser">
                  <input type="hidden" value="{{$params_array['idBarbero']}}" name="idBarbero">
                  <input type="hidden" value="{{$params_array['start_date']}}" name="start_date">
                  <input type="hidden" value="{{$params_array['bloques']}}" name="bloques">
                  @foreach ($servicios as $item)
                  <input type="hidden" value="{{$item}}" name="servicios[]">
                  @endforeach
                
                  @foreach ($cantidadDeServ as $item)
                  <input type="hidden" value="{{$item}}" name="cantidad[]">
                  @endforeach
                  
                  
               
                    <button type="submit" class="btn btn-success">Realizar Reserva</button>
                    <a href="{{route('ReservasCliente')}}" class="btn">Cancelar</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
        
@endsection