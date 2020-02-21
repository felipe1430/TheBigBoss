@extends("theme.$theme2.layout")
@section('titulo')
Lista De Trabajadores
@endsection
@section('styles')

<link rel="stylesheet" href="{{asset("assets/$theme2/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">

@endsection
@section('contenido')
    <div class="container my-4">
      <h1 class="display-4">Lista De Trabajadores
      </h1>
      <hr>
      <a href="{{route('agregarempleado')}}" type="button" class="btn btn-success">Agregar Trabajador</a>
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
                      <th scope="col">Apellido</th>
                      <th scope="col">Email</th>
                      <th scope="col">Descripcion</th>
                      <th scope="col">Comision</th>
                      <th scope="col">Direccion</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Estado</th>
                      <th scope="col">Servicios</th>
                      <th scope="col">Editar</th>
                      <th scope="col">Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($empleados as $item)
                    <tr>
                      <th scope="row">{{$item->id_empleado}}</th>
                      <td>{{$item->nombre_empleado}}</td>
                      <td>{{$item->apellido_empleado}}</td>
                      <td>{{$item->correo_empleado}}</td>
                      <td>{{$item->descripcion_empleado}}</td>
                      <td>{{$item->comision_empleado}}%</td>
                      <td>{{$item->direccion_empleado}}</td>
                      @if ($item->fk_empleado_tipo_user =='1')
                      <td>Administrador</td>
                      @elseif ($item->fk_empleado_tipo_user =='2')
                      <td>barbero</td>
                      @else
                      <td>cliente</td>
                      @endif
                      @if ($item->estado_empleado =='1')
                      <td>Activo</td>
                      @else
                      <td>No Activo</td>
                      @endif
                      <td><a href="{{route('agregarservempleado', $item->id_empleado)}}" class="btn btn-primary">Agregar</a></td>
                      <td><a href="" data-toggle="modal" data-target="#mimodal"
                        data-id_empleado='{{$item->id_empleado}}' data-nombre_empleado='{{$item->nombre_empleado}}' data-apellido_empleado='{{$item->apellido_empleado}}' data-rut_empleado='{{$item->rut_empleado}}' data-correo_empleado='{{$item->correo_empleado}}'  data-telefono_empleado='{{$item->telefono_empleado}}' data-comision_empleado='{{$item->comision_empleado}}' data-direccion_empleado='{{$item->direccion_empleado}}' data-descripcion_empleado='{{$item->descripcion_empleado}}' data-estado_empleado='{{$item->estado_empleado}}' data-fk_empleado_tipo_user='{{$item->fk_empleado_tipo_user}}' class="btn btn-warning">Editar</a></td>
                        <td><a href="" data-toggle="modal" data-target="#mimodaleliminar"
                            data-id_empleado='{{$item->id_empleado}}' class="btn btn-danger btm-sm">Eliminar</a></td>
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
   <div class="modal fade" id="mimodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="myModalLabel">Editar Usuarios</h4>
         </div>
         <div class="modal-body">
            <div class="card-body">
                <form method="POST" action="{{route('actualizarempleados')}}">
                  {{method_field('post')}}
      	          	{{csrf_field()}}
                    @csrf
                    <input type="hidden" name="id_empleado" id="id_empleado" value="">
                    <!-- nombre -->
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="nombre_empleado" type="text" class="form-control @error('name') is-invalid @enderror" name="nombre_empleado" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Fin. nombre -->
                    <!-- Apellido -->
                    <div class="form-group row">
                            <label for="Apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
    
                            <div class="col-md-6">
                                <input id="apellido_empleado" type="text" class="form-control @error('name') is-invalid @enderror" name="Apellido" value="{{ old('Apellido') }}" required autocomplete="Apellido" autofocus>
    
                                @error('Apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin apellido -->
                        <!-- RUT -->
                    <div class="form-group row">
                            <label for="Apellido" class="col-md-4 col-form-label text-md-right">{{ __('RUT') }}</label>
    
                            <div class="col-md-6">
                                <input id="rut_empleado" type="text" class="form-control @error('RUT') is-invalid @enderror" name="RUT" value="{{ old('RUT') }}" required autocomplete="RUT" autofocus>
    
                                @error('RUT')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin RUT -->
                        <!-- Correo electrónico -->
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                        <div class="col-md-6">
                            <input id="correo_empleado" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Fin Correo electrónico -->
                    <!-- telefono -->
                    <div class="form-group row">
                            <label for="Apellido" class="col-md-4 col-form-label text-md-right">{{ __('telefono') }}</label>
    
                            <div class="col-md-6">
                                <input id="telefono_empleado" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
    
                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin telefono -->
                        <!-- comision -->
                    <div class="form-group row">
                            <label for="comision" class="col-md-4 col-form-label text-md-right">{{ __('Comision') }}</label>
    
                            <div class="col-md-6">
                                <input id="comision_empleado" type="text" class="form-control @error('comision') is-invalid @enderror" name="comision" value="{{ old('comision') }}" required autocomplete="comision" autofocus>
    
                                @error('comision')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin comision -->
                         <!-- Descripcion -->
                    <div class="form-group row">
                      <label for="Descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                      <div class="col-md-6">
                          <input id="descripcion_empleado" type="text" class="form-control @error('Descripcion') is-invalid @enderror" name="Descripcion" value="{{ old('Descripcion') }}" required autocomplete="Descripcion" autofocus>

                          @error('Descripcion')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                  <!-- Fin Descripcion -->
                        <!-- direccion -->
                    <div class="form-group row">
                            <label for="Direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>
    
                            <div class="col-md-6">
                                <input id="direccion_empleado" type="text" class="form-control @error('Direccion') is-invalid @enderror" name="Direccion" value="{{ old('Direccion') }}" required autocomplete="Direccion" autofocus>
    
                                @error('Direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin direccion -->
                    <!-- Tipo de Usuario -->
                    <div class="form-group row">
                        <label for="Tipo" class="col-md-4 col-form-label text-md-right">Tipo Usuario</label>

                        <div class="col-md-6">
                            <select id="fk_empleado_tipo_user" list="fk_empleado_tipo_user" class="form-control" name="fk_empleado_tipo_user" value="" required >
                                <option value="1">Administrador</option> 
                                <option value="2">Barbero</option>
                                <option value="3">Cliente</option> 
                             </select>
                        </div>
                    </div>
                    <!-- Estado -->
                    <div class="form-group row">
                        <label for="Estado" class="col-md-4 col-form-label text-md-right">Eliminar Usuario</label>

                        <div class="col-md-6">
                            <select id="estado_empleado" list="Estado" class="form-control" name="Estado" value="" required >
                                <option value="1">Activo</option> 
                                <option value="0">Eliminar</option>
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





    <!-- Modal ELIMINAR-->
   <div class="modal fade" id="mimodaleliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Eliminar Trabajador</h4>
        </div>
        <div class="modal-body">
           <div class="card-body">
               <form method="POST" action="{{route('eliminarempleados')}}">
                 {{method_field('post')}}
                       {{csrf_field()}}
                   @csrf
                   <input type="hidden" name="id_empleado" id="id_empleado" value="">
                   <input type="hidden" name="Estado" id="estado_empleado" value="0">
                   <h5>¿Esta Seguro Que Desea Elimianar El Trabajador?<span class="badge badge-secondary"></span></h5>
                   <div class="modal-footer">
                     <button type="submit" class="btn btn-danger">Si</button>
                     <button type="button" data-dismiss="modal" class="btn btn-secondary">No</button>
                  </div>
               </form>
             </div>
        </div>
      </div>
    </div>
  </div>
   <!-- FIN Modal ELIMINAR -->
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