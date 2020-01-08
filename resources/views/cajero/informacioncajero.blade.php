@extends("theme.$theme2.layout")
@section('titulo')
    Informacion
@endsection

@section('contenido')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Contacto Desarrolladores</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<div class="card-body" style="display: block;">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
        <div class="row">
          <div class="col-12 col-sm-6">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Leandro Sepulveda</span>
                <span class="info-box-number text-center text-muted mb-0">leandrofernando739@gmail.com</span>
                <span class="info-box-number text-center text-muted mb-0">+56962682737</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Felipe Martinez</span>
                <span class="info-box-number text-center text-muted mb-0">felipe.martinez.hernandezh1@gmail.com</span>
                <span class="info-box-number text-center text-muted mb-0">+56971768598</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h4>Informacion The Big Boss</h4>
              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="{{asset("assets/$theme2/dist/img/logobarber.jpg")}}" alt="user image">
                  <span class="username">
                    <a href="#">Creada</a>
                  </span>
                  <span class="description">
                    Enero 2020</span>
                </div>
                <!-- /.user-block -->
                <p>
                    TheBigBoss ©2019 Todos los derechos reservados.
                </p>

                <p>
                  <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i></a>
                </p>
              </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
        <h3 class="text-primary"><i class="fas fa-paint-brush"></i>The Big Boss</h3>
        <p class="text-muted">Software dedicado principalmente para el control y  generación de consultas a los sistemas informáticos de la empresa, con opciones como las de exportaciones en PDF, Excel y controles de Usuarios llevando las finansas y ventas de esta misma.</p>
        <br>
        <div class="text-muted">
          <p class="text-sm">Felipe Martinez
            <b class="d-block">Ingeniero Informatico</b>
          </p>
          <p class="text-sm">Leandro Sepulveda
            <b class="d-block">Ingeniero Informatico</b>
          </p>
        </div>

        <h5 class="mt-5 text-muted">
            Archivos de proyecto</h5>
        <ul class="list-unstyled">
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Exportaciones de Archivos.docx</a>
          </li>
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> Exportaciones de Archivos.pdf</a>
          </li>
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i>Consultas De reportabilidad</a>
          </li>
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Archivos.png</a>
          </li>
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Generaciones de DTE.doc</a>
          </li>
        </ul>
        <div class="text-center mt-5 mb-3">

        </div>
      </div>
    </div>
  </div>
@endsection

