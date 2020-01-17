@extends("theme.$theme2.layout")
@section('titulo')
Lista De Usuarios
@endsection
@section('styles')

<link rel="stylesheet" href="{{asset("assets/$theme2/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">

@endsection
@section('contenido')
    <div class="container my-4">
      <h1 class="display-4">Lista De Usuarios
      </h1>
      <hr>
      <br>
      <hr>
      <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <table id="users" class="table table-sm table-hover">
                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Apellido</th>
                      <th scope="col">Rut</th>
                      <th scope="col">Email</th>
                      <th scope="col">Fecha Nacimiento</th>
                      <th scope="col">Telefono</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($usuarios as $item)
                    <tr>
                      <th scope="row">{{$item->id}}</th>
                      <td>{{$item->name}}</td>
                      <td>{{$item->surname}}</td>
                      <td>{{$item->rut}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->fecha_nacimiento}}</td>
                      <td>{{$item->telefono}}</td>
                      <td><a href="" data-toggle="modal" data-target="#mimodalusuarios" class="btn btn-primary btm-sm"
                        data-id='{{$item->id}}' data-name='{{$item->name}}' data-surname='{{$item->surname}}' data-rut='{{$item->rut}}' data-email='{{$item->email}}' data-fecha_nacimiento='{{$item->fecha_nacimiento}}' data-telefono='{{$item->telefono}}'>Editar</a></td>
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
   <div class="modal fade" id="mimodalusuarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>
         </div>
         <div class="modal-body">
            <div class="card-body">
                <form method="POST" action="{{route('actualizarusuariosCaja')}}">
                  {{-- {{method_field('post')}}
      	          	{{csrf_field()}} --}}
                    @csrf
                    <input type="hidden" name="id" id="id" value="">
                    <!-- nombre -->
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Fin.  nombre -->
                    <!-- Apellido -->
                    <div class="form-group row">
                            <label for="Apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
    
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('name') is-invalid @enderror" name="surname" value="{{ old('Apellido') }}" required autocomplete="Apellido" autofocus>
    
                                @error('Apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin Apellido -->
                        <!-- RUT -->
                    <div class="form-group row">
                            <label for="Apellido" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>
    
                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control @error('name') is-invalid @enderror" name="rut" value="{{ old('Apellido') }}" required autocomplete="Apellido" autofocus>
    
                                @error('Apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- FIN RUT -->
                        <!-- Email -->
                    <div class="form-group row">
                            <label for="Apellido" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
    
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ old('Apellido') }}" required autocomplete="Apellido" autofocus>
    
                                @error('Apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin Email-->
                        <!-- fecha nacimiento -->
                    <div class="form-group row">
                            <label for="Apellido" class="col-md-4 col-form-label text-md-right">{{ __('Fecha De Nacimiento') }}</label>
    
                            <div class="col-md-6">
                                <input id="fecha_nacimiento" type="date" class="form-control @error('name') is-invalid @enderror" name="fecha_nacimiento" value="{{ old('Apellido') }}" required autocomplete="Apellido" autofocus>
    
                                @error('Apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin FECHA NACIMENTO-->
                        <!-- Telefono -->
                    <div class="form-group row">
                            <label for="Apellido" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
    
                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control @error('name') is-invalid @enderror" name="telefono" value="{{ old('Apellido') }}" required autocomplete="Apellido" autofocus>
    
                                @error('Apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin Telefono-->

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