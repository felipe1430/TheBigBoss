@extends("theme.$theme2.layout")
@section('titulo')
Lista De Servicios
@endsection
@section('styles')

<link rel="stylesheet" href="{{asset("assets/$theme2/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">

@endsection
@section('contenido')
    <div class="container my-4">
      <h1 class="display-4">Lista De Servicios
      </h1>
      <hr>
      <a href="{{route('inicio')}}" type="button" class="btn btn-success">Agregar Servicio</a>
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
                      <th scope="col">Comision</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Estado</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($Servicio as $item)
                    <tr>
                      <th scope="row">{{$item->id_servicios}}</th>
                      <td>{{$item->nombre_servicio}}</td>
                      <td>{{$item->descripcion_servicio}}</td>
                      <td>{{$item->valor_servicio}}</td>
                      @if ($item->estado_servicios =='1')
                      <td>Activo</td>
                      @else
                      <td>No Activo</td>
                      @endif
                      <td><a href="" data-toggle="modal" data-target="#mimodalservicios"
                        data-id_servicios='{{$item->id_servicios}}'  data-nombre_servicio='{{$item->nombre_servicio}}' data-descripcion_servicio='{{$item->descripcion_servicio}}' data-valor_servicio='{{$item->valor_servicio}}'  data-estado_servicios='{{$item->estado_servicios}}'
                         class="btn btn-primary btm-sm">Editar</a></td>
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
      

   <!-- Modal -->
   <div class="modal fade" id="mimodalservicios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="myModalLabel">Editar Servicios</h4>
         </div>
         <div class="modal-body">
            <div class="card-body">
                <form method="POST" action="{{route('actualizarempleados')}}">
                  {{method_field('post')}}
      	          	{{csrf_field()}}
                    @csrf
                    <input type="hidden" name="id_servicios" id="id_servicios" value="">
                    <!-- servicio nombre -->
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Servicio') }}</label>

                        <div class="col-md-6">
                            <input id="nombre_servicio" type="text" class="form-control @error('name') is-invalid @enderror" name="nombre_servicio" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Fin. servicio nombre -->
                    <!-- descripcion servicio -->
                    <div class="form-group row">
                            <label for="Apellido" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>
    
                            <div class="col-md-6">
                                <input id="descripcion_servicio" type="text" class="form-control @error('name') is-invalid @enderror" name="descripcion_servicio" value="{{ old('Apellido') }}" required autocomplete="Apellido" autofocus>
    
                                @error('Apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin descripcion servicio -->
                        <!-- valor -->
                    <div class="form-group row">
                            <label for="valor_servicio" class="col-md-4 col-form-label text-md-right">{{ __('valor') }}</label>
    
                            <div class="col-md-6">
                                <input id="valor_servicio" type="text" class="form-control @error('Valor') is-invalid @enderror" name="valor_servicio" value="{{ old('valor_servicio') }}" required autocomplete="valor_servicio" autofocus>
    
                                @error('valor_servicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin valor -->
                    <!-- Estado -->
                    <div class="form-group row">
                        <label for="Estado" class="col-md-4 col-form-label text-md-right">Estado Del Servicio</label>

                        <div class="col-md-6">
                            <select id="estado_servicios" list="estado_servicios" class="form-control" name="estado_servicios" value="" required >
                                <option value="1">Activo</option> 
                                <option value="0">No Activo</option>
                             </select>
                        </div>
                    </div>
                    <!-- Fin Estado -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Editar</button>
                      <button type="button" data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
                   </div>
                </form>
              </div>
         </div>
       </div>
     </div>
   </div>
    <!-- FIN Modal -->
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