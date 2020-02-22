@extends("theme.$theme2.layout")
@section('titulo')
Agregar Empleados
@endsection
@section('styles')


@endsection
@section('contenido')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ingresar Empleados') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('empleados') }}">
                        @csrf
                        <!-- nombre Empleado -->
                        <div class="form-group row">
                            <label for="nombre_empleado" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_empleado" type="text" class="form-control @error('nombre_empleado') is-invalid @enderror" name="nombre_empleado" value="{{ old('nombre_empleado') }}" required autocomplete="nombre_empleado" autofocus>

                                @error('nombre_empleado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin nombre empleado -->

                        <!-- Apellido Empleado -->
                        <div class="form-group row">
                            <label for="apellido_empleado" class="col-md-4 col-form-label text-md-right">{{ __('Apellido ') }}</label>

                            <div class="col-md-6">
                                <input id="descripcion_servicio" type="text" class="form-control @error('apellido_empleado') is-invalid @enderror" name="apellido_empleado" value="{{ old('apellido_empleado') }}" required autocomplete="apellido_empleado" autofocus>

                                @error('apellido_empleado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin apellido Empleado -->
                        <!-- RUT -->
                        <div class="form-group row">
                            <label for="rut_empleado" class="col-md-4 col-form-label text-md-right">{{ __('RUT ') }}</label>

                            <div class="col-md-6">
                                <input id="rut_empleado" type="text" class="form-control @error('rut_empleado') is-invalid @enderror" name="rut_empleado" value="{{ old('rut_empleado') }}" required autocomplete="rut_empleado" autofocus>

                                @error('rut_empleado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin RUT -->
                        <!-- EMAIL -->
                        <div class="form-group row">
                            <label for="correo_empleado" class="col-md-4 col-form-label text-md-right">{{ __('Email ') }}</label>

                            <div class="col-md-6">
                                <input id="correo_empleado" type="email" class="form-control @error('correo_empleado') is-invalid @enderror" name="correo_empleado" value="{{ old('correo_empleado') }}" required autocomplete="correo_empleado" autofocus>

                                @error('correo_empleado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin EMAIL -->
                        <!-- telefono -->
                        <div class="form-group row">
                            <label for="telefono_empleado" class="col-md-4 col-form-label text-md-right">{{ __('Telefono ') }}</label>

                            <div class="col-md-6">
                                <input id="telefono_empleado" type="text" class="form-control @error('telefono_empleado') is-invalid @enderror" name="telefono_empleado" value="{{ old('telefono_empleado') }}" required autocomplete="telefono_empleado" autofocus>

                                @error('telefono_empleado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin telefono -->
                        <!-- comision -->
                        <div class="form-group row">
                            <label for="comision_empleado" class="col-md-4 col-form-label text-md-right">{{ __('Comision') }}</label>

                            <div class="col-md-6">
                                <input id="comision_empleado" type="number" class="form-control @error('comision_empleado') is-invalid @enderror" name="comision_empleado" value="{{ old('comision_empleado') }}" required autocomplete="comision_empleado" autofocus>

                                @error('comision_empleado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin comision -->
                        <!-- descripcion -->
                        <div class="form-group row">
                            <label for="descripcion_empleado" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                            <div class="col-md-6">
                                <input id="descripcion_empleado" type="text" class="form-control @error('descripcion_empleado') is-invalid @enderror" name="descripcion_empleado" value="{{ old('descripcion_empleado') }}" required autocomplete="descripcion_empleado" autofocus>

                                @error('descripcion_empleado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin descripcion -->
                        <!-- direccion -->
                        <div class="form-group row">
                            <label for="direccion_empleado" class="col-md-4 col-form-label text-md-right">{{ __('Direccion ') }}</label>

                            <div class="col-md-6">
                                <input id="direccion_empleado" type="text" class="form-control @error('direccion_empleado') is-invalid @enderror" name="direccion_empleado" value="{{ old('direccion_empleado') }}" required autocomplete="direccion_empleado" autofocus>

                                @error('direccion_empleado')
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
                            <select id="tipo" list="tipo" class="form-control" name="tipo" value="" required >
                                <option value="1">Administrador</option> 
                                <option value="2">Barbero</option>
                                <option value="3">Cliente</option> 
                             </select>
                        </div>
                    </div>
                    <!-- FIN Tipo de Usuario -->

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Agregar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection