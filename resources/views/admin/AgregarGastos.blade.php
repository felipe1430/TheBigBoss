@extends("theme.$theme2.layout")
@section('titulo')
Agregar Gastos
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
                <div class="card-header">{{ __('Gastos') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('confirmargastos') }}">
                        @csrf

                        <!-- descripcion gasto -->
                        <div class="form-group row">
                            <label for="descripcion_gasto" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion Gasto') }}</label>

                            <div class="col-md-6">
                                <input id="descripcion_gasto" type="text" class="form-control @error('descripcion_gasto') is-invalid @enderror" name="descripcion_gasto" value="{{ old('descripcion_gasto') }}" required autocomplete="descripcion_gasto" autofocus>

                                @error('descripcion_gasto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin descpripcion gasto -->
                        <!-- valor servicio -->
                        <div class="form-group row">
                            <label for="valor_gasto" class="col-md-4 col-form-label text-md-right">{{ __('Valor') }}</label>

                            <div class="col-md-6">
                                <input id="valor_gasto" type="number" class="form-control @error('valor_gasto') is-invalid @enderror" name="valor_gasto" value="{{ old('valor_gasto') }}" required autocomplete="valor_gasto" autofocus>

                                @error('valor_gasto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- fin valor servicio -->
                        <!-- fecha servicio -->
                        <div class="form-group row">
                            <label for="fecha_gasto" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_gasto" type="date" class="form-control @error('fecha_gasto') is-invalid @enderror" name="fecha_gasto" value="{{ old('fecha_gasto') }}" required autocomplete="fecha_gasto" autofocus>

                                @error('fecha_gasto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- fin fecha gasto -->

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