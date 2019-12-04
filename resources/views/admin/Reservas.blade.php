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
                      <th scope="col">Nombre</th>
                      <th scope="col">Descripcion</th>
                      <th scope="col">Valor</th>
                      <th scope="col">Estado</th>
                      <th scope="col">Aciones</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($Reserva as $item)
                    <tr>
                      <th scope="row">{{$item->id_reserva}}</th>
                      <td>{{$item->title}}</td>
                      <td>{{$item->color}}</td>
                      <td>{{$item->start_date}}</td>
                      <td>{{$item->end_date}}</td>
                      <td><a href="" data-toggle="modal" data-target="#mimodalservicios"
                         class="btn btn-primary btm-sm">Pagar</a></td>
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