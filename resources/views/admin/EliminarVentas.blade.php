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
                <div class="card-header">{{ __('Ventas') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('eliminarventa') }}">
                        @csrf

                        <!-- descripcion gasto -->
                        <div class="form-group row">
                            <label for="codigo_venta" class="col-md-4 col-form-label text-md-right">{{ __('Codigo De Venta') }}</label>

                            <div class="col-md-6">
                                <input id="codigo_venta" type="number" class="form-control @error('codigo_venta') is-invalid @enderror" name="codigo_venta" value="{{ old('codigo_venta') }}" required autocomplete="codigo_venta" autofocus>

                                @error('descripcion_gasto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- fin descpripcion gasto -->

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Eliminar') }}
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