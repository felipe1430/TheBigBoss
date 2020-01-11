@extends("theme.$theme2.layout")
@section('titulo')
Servicios Barbero
@endsection

@section('styles')

<link rel="stylesheet" href="{{asset("assets/$theme2/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">


@endsection
@section('contenido')

<div class="container-fluid">
    <h5 class="display-4">Servicos Del Trabajador</h5>
    <div class="row">
    <div class="col-md-8">
              <hr>
        </div>    
      </div>
      <div class="row">
      
      <div class="col-md-6">
        <div class="panel panel-danger">Servicios Del trabajador </div>
        <table class="table table-bordered table-hover dataTable">
          <tr>
            <th>Seleccion</th>
            <th>Id Servicio</th>
            <th>Nombre Servico</th>
            <th>Valor Servicio</th>
          </tr>
          <tr>
            <form action="{{route('eliminarservicioempleado')}}" method="post"  id="FormActivacion" class="form-inline">
              @csrf
            <tbody> 
              @if (empty($empleados))
              @else
            @foreach($empleados as $item)
            <td><input type="checkbox" class="case" name="case[]"  value="{{$item->id_servicios}}"></td>
            <td>{{$item->id_servicios}}</td>
            <td>{{$item->nombre_servicio}}</td>
            <td>{{number_format($item->valor_servicio,0,',','.')}}</td>
          </tr>
          @endforeach 
          @endif
        </table>
      </tbody>
      <div class="col-md-6">

        <input type="hidden" value="{{$id}}" name="id_trabajador" id="id_trabajador">

        <button type="submit" class="btn btn-danger">Eliminar Servicio</button>
    </div>
    </form>
      </div>
      <div class="col-md-6">
        <div class="panel panel-danger">Lista De Servicios</div>
        <table class="table table-bordered table-hover dataTable">
          <tr>
            <th>Seleccion</th>
            <th>Id Servicio</th>
            <th>Nombre Servico</th>
            <th>Valor Servicio</th>
          </tr>
          <tr>
            <form action="{{route('agregarservicioempleado')}}" method="post"  id="FormActivacion" class="form-inline">
              @csrf
            <tbody> 
              @if (empty($servicios))
              @else
            @foreach($servicios as $item)
            <td><input type="checkbox" class="case" name="case[]"  value="{{$item->id_servicios}}"></td>
            <td>{{$item->id_servicios}}</td>
            <td>{{$item->nombre_servicio}}</td>
            <td>{{number_format($item->valor_servicio,0,',','.')}}</td>
          </tr>
          @endforeach 
          @endif
        </table>
      </tbody>
      <div class="col-md-6">

        <input type="hidden" value="{{$id}}" name="id_trabajador" id="id_trabajador">

        <button type="submit" class="btn btn-primary">Agregar Servicio</button>
    </div>
      </form>
      </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
      $('#cambioPrec').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ],
          "language":{
        "info": "_TOTAL_ registros",
        "paginate":{
          "next": "Siguiente",
          "previous": "Anterior",
        
      },
      "loadingRecords": "cargando",
      "processing": "procesando",
      "emptyTable": "no hay resultados",
      "zeroRecords": "no hay coincidencias",
      "infoEmpty": "",
      "infoFiltered": ""
      }
      });
    } );
    </script>
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-bs4/css/buttons.dataTables.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-bs4/css/jquery.dataTables.min.css")}}">
  <script src="{{asset("js/jquery-3.3.1.js")}}"></script>
  <script src="{{asset("js/jquery.dataTables.min.js")}}"></script>
  <script src="{{asset("js/dataTables.buttons.min.js")}}"></script>
  <script src="{{asset("js/buttons.flash.min.js")}}"></script>
  <script src="{{asset("js/jszip.min.js")}}"></script>
  <script src="{{asset("js/pdfmake.min.js")}}"></script>
  <script src="{{asset("js/vfs_fonts.js")}}"></script>
  <script src="{{asset("js/buttons.html5.min.js")}}"></script>
  <script src="{{asset("js/buttons.print.min.js")}}"></script>
  <script src="{{asset("js/validarRUT.js")}}"></script>

  <script src="{{asset("js/ValidaCheck.js")}}"></script>






@endsection