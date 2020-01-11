@extends("theme.$theme2.layout")
@section('titulo')
Agregar Servicios
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
                <div class="card-header">{{ __('Servicios') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('servicios') }}">
                        @csrf
                        <!-- nombre servicio -->
                        <div class="form-group row">
                            <label for="nombre_servicio" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Servicio') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_servicio" type="text" class="form-control @error('nombre_servicio') is-invalid @enderror" name="nombre_servicio" value="{{ old('nombre_servicio') }}" required autocomplete="nombre_servicio" autofocus>

                                @error('nombre_servicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin nombre servicio -->

                        <!-- descripcion servicio -->
                        <div class="form-group row">
                            <label for="descripcion_servicio" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion Servicio') }}</label>

                            <div class="col-md-6">
                                <input id="descripcion_servicio" type="text" class="form-control @error('descripcion_servicio') is-invalid @enderror" name="descripcion_servicio" value="{{ old('descripcion_servicio') }}" required autocomplete="descripcion_servicio" autofocus>

                                @error('descripcion_servicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin descpripcion servicio -->
                        <!-- valor servicio -->
                        <div class="form-group row">
                            <label for="valor_servicio" class="col-md-4 col-form-label text-md-right">{{ __('Valor Servicio') }}</label>

                            <div class="col-md-6">
                                <input id="valor_servicio" type="number" class="form-control @error('valor_servicio') is-invalid @enderror" name="valor_servicio" value="{{ old('valor_servicio') }}" required autocomplete="valor_servicio" autofocus>

                                @error('valor_servicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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