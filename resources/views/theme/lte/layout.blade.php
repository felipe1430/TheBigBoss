<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')
    <title> @yield('titulo','Gestiones The Big Boss')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset("assets/$theme2/plugins/toastr/toastr.min.css")}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset("assets/$theme2/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css")}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("assets/$theme2/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset("assets/$theme2/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("assets/$theme2/dist/css/adminlte.min.css")}}">

      {{-- <!-- Full calendar -->
      <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fullcalendar/main.min.css")}}">
     
      <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fullcalendar-daygrid/main.min.css")}}">
      <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fullcalendar-timegrid/main.min.css")}}">
      <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fullcalendar-bootstrap/main.min.css")}}">
 --}}

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

@yield('styles')

</head>
<body class="sidebar-mini layout-fixed sidebar-collapse">
        <!-- Site wrapper -->
            <div class="wrapper"> 
                <!-- Inicio Header -->
                @include("theme/$theme2/nav")
                <!-- Fin Header -->

                <!-- Inicio aside -->
              
                <!-- Fin Header -->
                <div class="content-wrapper">
             <!-- Content Header (Page header) -->
                  <!-- Main content -->
                    <section class="content">
                        @yield('contenido')
                    </section>
          <!-- /.content -->
            </div>
        <!-- /.inicio footer -->    
        @include("theme/$theme2/footer")   
         <!-- /.termino footer -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        </div>




<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-155159268-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-155159268-1');
</script>






    


   <script src="{{asset("assets/$theme2/plugins/jquery/jquery.min.js")}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset("assets/$theme2/plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<script>
  $(function () {
  
  $('[data-toggle="popover"]').popover({
    trigger:'hover',
    html:true,
  

    
  })
})
</script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->  
 <script>

  $.widget.bridge('uibutton', $.ui.button)
</script> 
{{-- popover --}}
<script src="{{asset("js/popper.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("assets/$theme2/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset("assets/$theme2/plugins/moment/moment.min.js")}}"></script> 
<script src="{{asset("assets/$theme2/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset("assets/$theme2/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("assets/$theme2/dist/js/adminlte.js")}}"></script>
<!-- Toastr -->
<script src="{{asset("assets/$theme2/plugins/toastr/toastr.min.js")}}"></script>
<script src="{{asset("assets/$theme2/plugins/sweetalert2/sweetalert2.min.js")}}"></script>



<!-- Modal edit empleado -->
<script> $('#mimodal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id_empleado = button.data('id_empleado')
        var nombre_empleado = button.data('nombre_empleado') 
        var apellido_empleado = button.data('apellido_empleado') 
        var rut_empleado = button.data('rut_empleado') 
        var correo_empleado = button.data('correo_empleado') 
        var telefono_empleado = button.data('telefono_empleado') 
        var comision_empleado = button.data('comision_empleado') 
        var direccion_empleado = button.data('direccion_empleado')
        var fk_empleado_tipo_user = button.data('fk_empleado_tipo_user')
        var estado_empleado = button.data('estado_empleado')
      
        var modal = $(this)
        modal.find('.modal-body #id_empleado').val(id_empleado);
        modal.find('.modal-body #nombre_empleado').val(nombre_empleado);
        modal.find('.modal-body #apellido_empleado').val(apellido_empleado);
        modal.find('.modal-body #rut_empleado').val(rut_empleado);
        modal.find('.modal-body #correo_empleado').val(correo_empleado);
        modal.find('.modal-body #telefono_empleado').val(telefono_empleado);
        modal.find('.modal-body #comision_empleado').val(comision_empleado);
        modal.find('.modal-body #direccion_empleado').val(direccion_empleado);
        modal.find('.modal-body #fk_empleado_tipo_user').val(fk_empleado_tipo_user);
        modal.find('.modal-body #estado_empleado').val(estado_empleado);

        
  })</script>
<!-- Fin Modal edit empleado -->

<!-- Modal delete empleado -->
<script> $('#mimodaleliminar').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id_empleado = button.data('id_empleado')
  var estado_servicios = button.data('estado_servicios') 

  var modal = $(this)
  modal.find('.modal-body #id_empleado').val(id_empleado);
  modal.find('.modal-body #estado_servicios').val(estado_servicios);


  
})</script>
<!-- Fin Modal delete empleado -->

<!-- Modal edit servicios -->
<script> $('#mimodalservicios').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id_servicios = button.data('id_servicios')
  var nombre_servicio = button.data('nombre_servicio') 
  var descripcion_servicio = button.data('descripcion_servicio') 
  var valor_servicio = button.data('valor_servicio') 
  var estado_servicios = button.data('estado_servicios') 

  var modal = $(this)
  modal.find('.modal-body #id_servicios').val(id_servicios);
  modal.find('.modal-body #nombre_servicio').val(nombre_servicio);
  modal.find('.modal-body #descripcion_servicio').val(descripcion_servicio);
  modal.find('.modal-body #valor_servicio').val(valor_servicio);
  modal.find('.modal-body #estado_servicios').val(estado_servicios);

})</script>
<!-- Fin Modal edit servicios -->

<!-- Modal edit Usuarios -->
<script> $('#mimodalusuarios').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('id')
    var name = button.data('name') 
    var surname = button.data('surname') 
    var rut = button.data('rut') 
    var email = button.data('email') 
    var fecha_nacimiento = button.data('fecha_nacimiento') 
    var telefono = button.data('telefono') 
  
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #surname').val(surname);
    modal.find('.modal-body #rut').val(rut);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #fecha_nacimiento').val(fecha_nacimiento);
    modal.find('.modal-body #telefono').val(telefono);
  
  })</script>
  <!-- Fin Modal edit Usuarios -->

<script> $('#mimodalventa').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id_servicios = button.data('id_servicios')
    var nombre_servicio = button.data('nombre_servicio') 

  
    var modal = $(this)
    modal.find('.modal-body #id_servicios').val(id_servicios);
    modal.find('.modal-body #nombre_servicio').val(nombre_servicio);

  
  })</script>



@yield('script')


@include("theme/mensajes")


</body>
</html>