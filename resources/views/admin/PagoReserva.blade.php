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
          <form  method="POST" action="{{route('enviarpagoreserva')}}"class="appointment-form" >
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Nombre Cliente</label>
                  <input type="text" class="form-control" id="appointment_name" name="nombrecliente" id="nombrecliente" value="{{$cliente[0]->name}}" placeholder="Nombre Cliente">
                  <input type="hidden" class="form-control appointment_time" name="idcliente" id="" value="{{$cliente[0]->id}}" placeholder="trabajador">
                  <input type="hidden" class="form-control appointment_time" name="idreserva" id="" value="{{$id_reserva}}" placeholder="trabajador">


                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Fecha Reserva</label>
                  <input type="text" class="form-control" id="appointment_email" name="fechareserva" id="fechareserva" value="{{$encabezado[0]->fecha_reserva}}" placeholder="Fecha Reserva">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Apellido Cliente</label>
                  <input type="text" class="form-control appointment_date" name="apellidocliente" id="apellidocliente" value="{{$cliente[0]->surname}}" placeholder="Apellido Cliente">
                </div>    
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Hora De Inicio</label>
                  <input type="text" class="form-control appointment_time" name="horainicio" id="horainicio" value="{{$encabezado[0]->start_date}}" placeholder="Hora Inicio">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="select-wrap">
                    <label for="validationTooltip01">Trabajador</label>
                    <input type="text" class="form-control appointment_time" name="trabajador" id="" value="{{$trabajador[0]->nombre_empleado}}" placeholder="trabajador">
                    <input type="hidden" class="form-control appointment_time" name="idtrabajador" id="" value="{{$trabajador[0]->id_empleado}}" placeholder="trabajador">
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="validationTooltip01">Hora De Termino</label>
                  <input type="text" class="form-control" id="phone" name="horatermino" id="horatermino" value="{{$encabezado[0]->end_date}}" placeholder="Hora Termino">
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
                            @foreach($Servicio as $itemServicio)
                          <tr>
                            <td>{{$itemServicio->nombre_servicio}}</td>
                            <td>${{number_format($itemServicio->valor_servicio,0,',','.')}}</td>
                            <td><input type="number" name="cantidad[]" min="1" id="{{$itemServicio->id_servicios}}" value=""   class="cant" style="display:none "   required disabled></td>
                            <td><input type="checkbox" name="servicios[]"  id="servicios" onChange="comprobar(this);" value="{{$itemServicio->id_servicios}}" ></td>
                          </tr>
                          @endforeach
                        </tbody>
                        </table>
                </div>
                
              </div>
            </div>
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
   } else{
      
document.getElementById(''+id+'').style.display = "none";
document.getElementById(''+id+'').value = "";
document.getElementById(''+id+'').disabled =true;
   }     
}


</script>


@endsection