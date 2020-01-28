@extends("theme.$theme2.layout")
@section('titulo')
Reservas
@endsection
@section('styles')

<link rel="stylesheet" href="{{asset("assets/$theme2/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">

@endsection
@section('contenido')
    <div class="container my-4">
      <h1 class="display-4">Reservas
      </h1>
      <hr>
      <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Editar Usuarios</h3>
                <table id="users" class="table table-sm table-hover">
                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">Nombre Cliente</th>
                      <th scope="col">Apellido Cliente</th>
                      <th scope="col">Telefono Cliente</th>
                      <th scope="col">Barbero</th>
                      <th scope="col">Fecha reservada</th>
                      <th scope="col">Estado De Reserva</th>
                      <th scope="col">Servicios</th>
                      <th scope="col">Pagar</th>
                      <th scope="col">Cancelar Reserva</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($Reserva as $item)
                    <tr>
                      <th scope="row">{{$item->id_reserva}}</th>



                          <td>{{$item->user['name']}}</td>
                          <td>{{$item->user['surname']}}</td>
                          <td>{{$item->user['telefono']}}</td>


                          <td>{{$item->empleado['nombre_empleado']}}</td>

                      <td>{{$item->fecha_reserva}}</td>


        
                      @if ($item->estado_reserva == 'PENDIENTE')

                      <td class="bg-primary" style="text-align: center">Pendiente</td>

                      @elseif($item->estado_reserva == 'PAGADA')

                      <td class="bg-success" style="text-align: center">Pagada</td>

                      @elseif($item->estado_reserva == 'CANCELADA')
                      <td class="bg-danger" style="text-align: center">Cancelada</td>
                      @endif
                      
                     
                      <td> <center> <a
                        id="popo" 
                        type="button"  
                        data-toggle="popover" 
                        data-trigger="focus" 
                        title="Servicios De la Reserva" 
                        data-content="
                        
                        <ul>
                          @foreach ($item->servicios as $item2)
                          <li> {{$item2->nombre_servicio}} </li>
                          @endforeach
                        </ul>
                        ">
                        

                        <i class="fas fa-info-circle"></i>
                      </a > </center>

                      </td>


                      @if ($item->estado_reserva !='PENDIENTE')
                      <td><button class="btn btn-primary">Pagar</button></td>
                      @else
                      <td><a href="{{route('Reservaspagopagocajero', $item->id_reserva)}}" class="btn btn-primary" >Pagar</a></td>
                      @endif
                      @if ($item->estado_reserva=='PENDIENTE')
                      <td><a class="btn btn-danger" href="{{route('cancelarReserva', $item->id_reserva)}}">Cancelar</a> </td>
                      @else
                     <td><button type="button" class="btn btn-danger">Cancelar</button></td>
                      @endif
                      {{-- <td><button type="button" class="btn btn-warning">Cancelar</button></td> --}}
                    </tr>

                    
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-body">
                <div id="jsGrid1"></div>
    
              </div>
            </div>
          </section>
      
@endsection
@section('script')

<script src="{{asset("assets/$theme2/plugins/datatables/jquery.dataTables.js")}}"></script>
<script src="{{asset("assets/$theme2/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}"></script>

<script>
  $(document).ready( function () {
    $('#users').DataTable();
} );

</script>

    
@endsection