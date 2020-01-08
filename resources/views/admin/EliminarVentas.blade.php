@extends("theme.$theme2.layout")
@section('titulo')
Eliminar Ventas
@endsection
@section('styles')

<link rel="stylesheet" href="{{asset("assets/$theme2/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">

@endsection
@section('contenido')
<div class="container-fluid">
    <h3 class="display-3">Eliminar Ventas</h3>
    <div class="row">
    <div class="col-md-12">

        <form action="{{route('eliminarventa')}}" method="post"  id="desvForm" class="form-inline">
          @csrf
                Codigo De Venta 
                <div class="form-group mb-2">
                  @if (empty($fecha1))
                  <input type="number" id="codigo" class="form-control" required name="codigo" >
                  @else
                <input type="number" id="codigo" class="form-control" name="codigo" required  value="{{$codigo}}">
                  @endif
           
                </div>
                <button type="submit" class="btn btn-primary mb-2">Buscar</button>
            
               
              </form>
              <hr>
        </div>
    
      </div>
   
      <div class="row">
      
      <div class="col-md-8">
          <table id="reporteventa" class="table table-bordered table-hover dataTable">
              <thead>
                <tr>
                    <th scope="col">Servicio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Valor</th>
                  </tr>
              </thead>
              <tbody> 
                @if (empty($servicios))
                    
                @else
                @foreach($servicios as $item)
                <tr>
                    <th scope="row">{{$item->nombre_servicio}}</th>
                    <th scope="row">{{$item->cantidad_detalle_venta}}</th>
                    <td style="text-align:center">{{number_format($item->valor_servicio,0,',','.')}}</td>
                </tr>
              @endforeach
                    
                @endif
            </tbody>
        </table>
      </div>
      <div class="col-md-4">
        @if (empty($encabezado[0]))
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationTooltip01">cliente</label>
            <input type="text" class="form-control" id="validationTooltip01" readonly  required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationTooltip02">Trabajador</label>
            <input type="text" class="form-control" id="validationTooltip02" readonly  required>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationTooltip03">Total Venta</label>
            <input type="text" class="form-control" readonly  id="validationTooltip03" >
          </div>
          <div class="col-md-6 mb-3">
                <label for="validationTooltip03">Fecha De Compra</label>
                <input type="text" class="form-control" readonly id="validationTooltip03" >
              </div>
        </div>
        

            @else
            <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="validationTooltip01">cliente</label>
                      <input type="text" class="form-control" id="validationTooltip01" value="{{$cliente[0]->name}}" readonly  required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="validationTooltip02">Trabajador</label>
                      <input type="text" class="form-control" id="validationTooltip02" value="{{$trabajador[0]->nombre_empleado}}" readonly  required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="validationTooltip03">Total Venta</label>
                      <input type="text" class="form-control" readonly value="{{number_format($encabezado[0]->total_venta,0,',','.')}}" id="validationTooltip03" >
                    </div>
                    
                    <div class="col-md-6 mb-3">
                          <label for="validationTooltip03">Fecha De Compra</label>
                          <input type="text" class="form-control" readonly id="validationTooltip03" value="{{$encabezado[0]->fecha_venta}}" >
                          <form action="{{route('eliminarventafinal')}}" method="post"  id="desvForm" >
                            @csrf
                          <input type="hidden" class="form-control" readonly id="cod" name="cod" value="{{$codigo}}" >
                        </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <button type="submit" class="btn btn-danger">Eliminar Venta</button></div>
                   
                  </div>
                </form>
              @endif
    </div>
</div>

    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
      $('#reporteventa').DataTable( {
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
<script src="{{asset("assets/$theme2/plugins/datatables/jquery.dataTables.js")}}"></script>
<script src="{{asset("assets/$theme2/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}"></script>

  <link rel="stylesheet" href="{{asset("assets/$theme2/plugins/datatables-bs4/css/buttons.dataTables.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/$theme2/plugins/datatables-bs4/css/jquery.dataTables.min.css")}}">
  <script src="{{asset("js/jquery-3.3.1.js")}}"></script>
  <script src="{{asset("js/jquery.dataTables.min.js")}}"></script>
  <script src="{{asset("js/dataTables.buttons.min.js")}}"></script>
  <script src="{{asset("js/buttons.flash.min.js")}}"></script>
  <script src="{{asset("js/jszip.min.js")}}"></script>
  <script src="{{asset("js/pdfmake.min.js")}}"></script>
  <script src="{{asset("js/vfs_fonts.js")}}"></script>
  <script src="{{asset("js/buttons.html5.min.js")}}"></script>
  <script src="{{asset("js/buttons.print.min.js")}}"></script>

{{-- <script>
  $(document).ready( function () {
    $('#users').DataTable();
} );

</script> --}}

    
@endsection