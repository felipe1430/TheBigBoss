@extends("theme.$theme2.layout")
@section('titulo')
Total De servicios
@endsection
@section('styles')

<link rel="stylesheet" href="{{asset("assets/$theme2/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">

@endsection
@section('contenido')
<div class="container-fluid">
    <h3 class="display-3">Ventas Unitarias Servicios</h3>
    <div class="row">
    <div class="col-md-12">

        <form action="{{route('reportetotalesserviciosfiltrar')}}" method="post"  id="desvForm" class="form-inline">
          @csrf
                 Desde  
                <div class="form-group mb-2">
                  @if (empty($fecha1))
                  <label for="staticEmail2" class="sr-only">Fecha 1</label>
                  <input type="date" id="fecha1" class="form-control" name="fecha1" >
                  @else
                <input type="date" id="fecha1" class="form-control" name="fecha1"  value="{{$fecha1}}">
                  @endif
           
                </div>
                 Hasta  
                <div class="form-group mx-sm-3 mb-2">
                  
                  @if (empty($fecha2))
                  <label for="inputPassword2" class="sr-only">Fecha 2</label>
                  <input type="date" id="fecha2" name="fecha2" class="form-control">
                  @else
                <input type="date" id="fecha2" name="fecha2" class="form-control" value="{{$fecha2}}">
                  @endif
             
                </div>
                <button type="submit" class="btn btn-primary mb-2">Filtrar</button>
            
               
              </form>
              <hr>
        </div>
    
      </div>
   
      <div class="row">
      
      <div class="col-md-12">
          <table id="reporteventa" class="table table-bordered table-hover dataTable">
              <thead>
                <tr>
                    <th scope="col">Nombre Servicio</th>
                    <th style="text-align:center" scope="col">Cantidad</th>
                    <th style="text-align:center" scope="col">Valor Unitario</th>
                    <th style="text-align:center" scope="col">Total</th>
                  </tr>
              </thead>
              <tbody> 
                @if (empty($consulta))
                    
                @else
                <div style="display: none">
                  {{-- variable suma --}}
                    {{ $total = 0 }} 
                  </div>
                @foreach($consulta as $item)
                <tr>
                    <th scope="row">{{$item->nombre_servicio}}</th>
                    <td style="text-align:center">{{number_format($item->cantidad,0,',','.')}}</td>
                    <td style="text-align:center">${{number_format($item->valorserv,0,',','.')}}</td>
                    <td style="text-align:center">${{number_format($item->total,0,',','.')}}</td>
                    <div style="display: none">{{$total += $item->total}}</div>
                </tr>
              @endforeach
                    
                @endif
          
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3"><strong>Total</strong> </td>
                @if(empty($total))
                <td><span class="price text-success">$</span></td>
                @else
                <td style="text-align:center"><span class="price text-success">${{number_format($total,0,',','.')}}</span></td>
                @endif
              </tr>
            </tfoot>
        </table>
        {{-- {{$porcentaje->links()}} --}}
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

<script>
  $(document).ready( function () {
    $('#users').DataTable();
} );

</script>

    
@endsection