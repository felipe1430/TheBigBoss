@extends("theme.$theme2.layout")
@section('meta')
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
@endsection
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
          <form  method="POST" action="{{route('enviarpagocajero')}}"class="appointment-form" >
            @csrf


            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="select-wrap">
                    <label for="validationTooltip01">Nombre Trabajador</label>
                    <select name="trabajador" id="trabajador" required class="form-control">
                        <option value="">Trabajador</option>
                        @foreach($empleado as $itemEmpleado)
                      <option  value="{{$itemEmpleado->id_empleado}}">{{$itemEmpleado->nombre_empleado}} {{$itemEmpleado->apellido_empleado}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="select-wrap">
                    <label for="validationTooltip01">Usuario</label>
                    <select name="User" id="User" required class="form-control">
                      <option value="">Usuarios</option>
                     
                       
                    </select>
                  </div>
                </div>
              </div>
            </div>


              <div class="row">
                <div class="col-sm-12">
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
                <button type="submit" class="btn btn-primary">Realizar Pago</button>
            </div>
          </form>

        </div>

        <div class="col-md-2 ftco-animate">
          <label for="validationTooltip01">Buscar USer</label>
          <input type="text" name="" id="SearchText">
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


</script>

<script>
  var controladorTiempo = "";
  $("#SearchText").on("keyup", function() {
    clearTimeout(controladorTiempo);
    controladorTiempo = setTimeout(BuscarUserCaja, 250);
});

function BuscarUserCaja(){
        var valor = document.getElementById('SearchText').value;
        if(valor!=""){
          console.log(valor);
          // document.getElementById('bloques').style.display = "";
          // document.getElementById('bloques').disabled =false;

          $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: "{{ url('Cajero/BuscarUser') }}",
                data: {
                     "_token":"{{ csrf_token() }}",//pass the CSRF_TOKEN()
                     "Nombre": valor,
                    
                },
                success: function(data) {

                  
                       //console.log(data.Users);
                     addOptions('User',data.Users);
                    

                }
            });

        }else{
         
            console.log('campo vacio ');

        }
}

    function addOptions(domElement, array) {
 var select = document.getElementsByName(domElement)[0];
 var option = document.createElement("option");
 var option2 = document.createElement("option");
 select.innerHTML='';
 option.text='....';
 select.add(option);
 option2.text='NO REGISTRADO';
 option2.value=0;
 select.add(option2);
 for (value in array) {
  var option = document.createElement("option");
  option.value=array[value].id;
  option.text = array[value].name +" "+array[value].surname+"--"+array[value].email ;
  select.add(option);
 }

}

</script>


@endsection