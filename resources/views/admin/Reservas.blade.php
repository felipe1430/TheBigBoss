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
                      <th scope="col">Pagar</th>
                      <th scope="col">Cancelar Reserva</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($Reserva as $item)
                    <tr>
                      <th scope="row">{{$item->id_reserva}}</th>
                      <td>{{$item->name}}</td>
                      <td>{{$item->surname}}</td>
                      <td>{{$item->telefono}}</td>
                      <td>{{$item->nombre_empleado}}</td>
                      <td>{{$item->fecha_reserva}}</td>
                      <td>{{$item->estado_reserva}}</td>
                      <td><a href="{{route('Reservaspago', $item->id_reserva)}}" class="btn btn-primary" >Pagar</a></td>
                      <td><button type="button" class="btn btn-warning">Cancelar</button></td>
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