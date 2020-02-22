@extends("theme.$theme.layout")
@section('titulo')
    login
@endsection
@section('contenido')
<section class="hero-wrap js-fullheight" style="background-image: url(../assets/thebigboss/images/fotos/fondo.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight justify-content-center align-items-center">
        <div class="col-lg-12 ftco-animate d-flex align-items-center">
          <div class="text text-center">
              <br>
              <br>
              <br>
                <div class="container ftco-relative">
                        <div class="row justify-content-center pb-12">
                          <div class="col-md-8 heading-section text-center ftco-animate">
                                <span class="subheading">The Big Boss</span>
                        <h1 class="mb-4">Inicio de sesión</h1>
                    </div>
                </div>
                    <div class="row justify-content-center">
                          <div class="col-md-6 ftco-animate">
                            <form action="{{ route('login_post') }}" class="appointment-form" method="POST">
                                    @csrf
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                        <input class="input100" type="email" placeholder="usuario" name="email">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                        <input class="input100" type="password" placeholder="password" name="password">
                                  </div>    
                                </div>
                              </div>
                              <button type="submit"  class="btn btn-primary btn-outline-primary px-4 py-2">Ingresar</button>
                              <br>
                              <br>
                              <p><a href="#"  data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-outline-primary px-4 py-2">Registrate</a></p>

                            </form>
                          </div>
                        </div>
                      </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
   <!-- Modal -->
   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Registro de Usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{route('register')}}">
                            @csrf
    
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
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('contraseña') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>             
            </div>
            <div class="modal-footer">
                
                            
                      <button type="submit" class="btn btn-primary">
                          {{ __('Registrar') }}
                      </button>
                  
                        
            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- fin Modal -->
  @endsection



    