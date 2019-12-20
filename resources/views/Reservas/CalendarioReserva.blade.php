@extends("theme.$theme.layout")
@section('titulo')
 Reservas
@endsection
@section('style')
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css"/>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang/es.js"></script>
  
    <style type="text/css">
        .fc-title {
          color: white;
          }
        .fc-time{
        color: white;
        }
        .fc-month-button{
        border: none;
        background: #3a7999;
        color: #f2f2f2;
        padding: 10px;
        font-size: 18px;
        border-radius: 5px;
        position: relative;
        box-sizing: border-box;
        transition: all 500ms ease;
        }

       .scroll{ 
                height: 700px;
                border: 1px solid #ddd;
                overflow-y: scroll;
       }
       .scroll2{ 
                height: 500px;
                border: 1px solid #ddd;
                overflow-y: scroll;
       }
       tr > td > span{
        color: black;
       }
       .cant{
        width : 50px; 
        heigth : 50px;
       }

        </style>


<link rel="stylesheet" href="{{asset("assets/$theme/css/style2.css")}}">
@endsection

@section('contenido')

<section class="ftco-section ftco-no-pt ftco-no-pb">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a href="" class="btn btn-success">Agregar evento </a>
            <a href="" class="btn btn-primary">Editar Evento</a>
            <a href="" class="btn btn-danger">Eliminar evento </a>
        </div>
    </div>
    <hr>
    <hr>

    <div class="row">
        <div class="col-md-6  ">
            <div class="panel panel-default scroll" >

                <div class="panel-heading" >
                    full calendar

                </div>
                <div class="panel-body" >
                    {!!$calendar->calendar() !!}
                    {!!$calendar->script() !!}
                </div>

            </div>

        </div> 
        <div class="col-md-6 " >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <h3>Rerserva Tus Servicios</h3>
                            <form action="{{route('addEvento')}}" method="POST" id="form1" >
                                @csrf
                                <label style="font-size: 10px" for="">Escriba su nombre</label>
                                <input type="text" name="nameUser" class="form-control" placeholder="Nombre..."  value="{{auth()->user()->name}}">
                                <input type="hidden" name="idUser" class="form-control" placeholder="Nombre..."  value="{{auth()->user()->id}}">
                                <input type="hidden" name="idBarbero" class="form-control" placeholder="Nombre..."  value="{{$barberos->id_empleado}}">
                                <label for="">Fecha comienso</label>
                                <input type="datetime-local" name="start_date" class="date form-control" required>
                                <label for="">Fecha Fin</label>
                                <input type="datetime-local" class="date form-control" name="end_date" required>
                                <br>
                                {{-- <input type="submit" class="btn btn-primary"> --}}
                                <div class="scroll2">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">servicio</th>
                                                <th scope="col">valor</th>
                                                <th scope="col">Selecciona</th>
                                                <th scope="col">Cantidad</th>
                                                       
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                    
                                                @foreach ($servicios as $item)

                                                <tr>
                                                
                                                    <td> <label class="form-check-label" for="{{$item->id_servicios}}">{{$item->nombre_servicio}}</label></td>
                                                    <td>{{' $'.$item->valor_servicio}}</td>
                                                    <td> <input type="checkbox"  name="servicios[]" value="{{$item->id_servicios}}"   onChange="comprobar(this);">  </td>
                                                <td><input type="number" class="cant" name="cantidad[]" id="{{$item->id_servicios}}" min="1"  style="display:none" required disabled></td>
                                                </tr>
                                                @endforeach
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                            <div class="form-group col-md-12 btn-group btn-group-block">
                                                <button type="submit" class="btn btn-success" >Reservar</button>
                                            </div>

                            </form> 
                              
                    </div>
     
                    </div>
              
                </div>

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

