@extends("theme.$theme2.layout")
@section('contenido')


<section class="ftco-section ftco-booking bg-light">
    <div class="container ftco-relative">
      <div class="row justify-content-center pb-3">
        <div class="col-md-10 heading-section text-center ftco-animate">
          {{-- <span class="subheading">The Big Boss</span> --}}
          <h2 class="mb-4">The Big Boss</h2>
              <img width="150" height="150" class="img-circle elevation-3"
               src="{{asset("assets/$theme2/dist/img/logothebigboss.png")}}">
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-10 ftco-animate">
          <form  method="POST" action="{{route('enviarpagoreserva')}}"class="appointment-form" id="FormPagoReserva" name="f1" >
            @csrf
            <div class="row">
              <div class="col-sm-6">


                <div class="form-group">
                    <label for="validationTooltip01">Nombre Cliente</label>
                   @foreach ($Reserva as $item)
                       
                  
                    
                    <input type="text" class="form-control" id="appointment_name" name="nombrecliente" id="nombrecliente" value="{{$item->user['name']}}" placeholder="Nombre Cliente">
                    <input type="hidden" class="form-control appointment_time" name="idcliente" id="" value="{{$item->user['id']}}" placeholder="trabajador">
                    <input type="hidden" class="form-control appointment_time" name="idreserva" id="" value="{{$item->id_reserva}}" placeholder="trabajador">
                   

                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Fecha Reserva</label>
                  <input type="text" class="form-control" id="appointment_email" name="fechareserva" id="fechareserva" value="{{$item->start_date}}" placeholder="Fecha Reserva">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Apellido Cliente</label>
                  <input type="text" class="form-control appointment_date" name="apellidocliente" id="apellidocliente" value="{{$item->user['surname']}}" placeholder="Apellido Cliente">
                </div>    
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Hora De Inicio</label>
                  <input type="text" class="form-control appointment_time" name="" id="horainicio" value="{{substr($item->start_date,-8)}}" placeholder="Hora Inicio">
                  <input type="hidden" class="form-control appointment_time" name="horainicio" id="horainicio" value="{{$item->start_date}}" placeholder="Hora Inicio">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="select-wrap">
                    <label for="validationTooltip01">Trabajador</label>
                    <input type="text" class="form-control appointment_time" name="trabajador" id="" value="{{$item->empleado['nombre_empleado']}}" placeholder="trabajador">
                    <input type="hidden" class="form-control appointment_time" name="idtrabajador" id="" value="{{$item->empleado['id_empleado']}}" placeholder="trabajador">
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Hora De Termino</label>
                <input type="text" class="form-control" id="phone" name="" id="horatermino" value="{{substr($item->end_date,-8)}}" placeholder="Hora Termino">
                <input type="hidden" class="form-control" id="phone" name="horatermino" id="horatermino" value="{{$item->end_date}}" placeholder="Hora Termino">
                </div>
              </div>

              
              <div class="col-sm-6">
                <div class="form-group">
                      <table id="users" class="table table-sm table-hover">
                          <thead>
                            <tr class="table-primary">
                              <th scope="col">Nombre</th>
                              <th scope="col">valor</th>
                              <th scope="col">Cantidad</th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($ServiciosReservados as $itemServicio)
                          <tr>
                            <td>{{$itemServicio->nombre_servicio}}</td>
                            <td>${{number_format($itemServicio->valor_servicio,0,',','.')}}</td>
                          <td><input type="number" name="cantidad[]" min="1" id="{{$itemServicio->id_servicios}}" value="{{$itemServicio->CantidadServicio}}"   class="cant"   required ></td>
                            <td><input type="checkbox" name="servicios[]"  id="servicios" onChange="comprobar(this);" checked = "checked" value="{{$itemServicio->id_servicios}}" ></td>
                          </tr>
                            @endforeach
                            @foreach ($ServiciosNoReservados as $item)
                            <tr>
                            <td>{{$item->nombre_servicio}}</td>
                            <td>${{number_format($item->valor_servicio,0,',','.')}}</td>
                            <td><input type="number" name="cantidad[]" min="1" id="{{$item->id_servicios}}" value=""   class="cant" style="display:none "   required disabled></td>
                            <td><input type="checkbox" name="servicios[]"  id="servicios" onChange="comprobar(this);" value="{{$item->id_servicios}}" ></td>
                          </tr>
                            @endforeach
                           
                        </tbody>
                        </table>
                </div>
                
              </div>
            </div>
            @endforeach
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Pagar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

        
@endsection


@section('script')

<script src="{{asset("js/ValidaCheck.js")}}"></script>

<script>
function comprobar(obj)

{ 
      id= obj.value;
    if (obj.checked){
      //console.log(obj.value);
id= obj.value;
 document.getElementById(''+id+'').style.display = "";
 document.getElementById(''+id+'').disabled =false;
 document.getElementById(''+id+'').value =1;
   } else{
      
document.getElementById(''+id+'').style.display = "none";
document.getElementById(''+id+'').value = "";
document.getElementById(''+id+'').disabled =true;
   }     
}


$('FormPagoReserva').submit(function(e){
  
  // $('input[type=checkbox]:checked=0');
  e.preventDefault();
  
});


</script>


@endsection