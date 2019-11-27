@extends("theme.$theme.layout")
@section('titulo')
 Reservas
@endsection
@section('style')
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css"/>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang/es.js"></script>
    <style type="text/css">
        .fc-title {
          color: white;
          }
        .fc-time{
        color: white;
        }
        .fc-month-button{
        border: none;
        background: #3a7999;
        color: #f2f2f2;
        padding: 10px;
        font-size: 18px;
        border-radius: 5px;
        position: relative;
        box-sizing: border-box;
        transition: all 500ms ease;
        }
        </style>

<link rel="stylesheet" href="{{asset("assets/$theme/css/style2.css")}}">
@endsection

@section('contenido')
<div class="container">
        

    <div class="row">
        <div class="col-md-12">
            <a href="" class="btn btn-success">Agregar evento </a>
            <a href="" class="btn btn-primary">Editar Evento</a>
            <a href="" class="btn btn-danger">Eliminar evento </a>
        </div>
    </div>
    <hr>
    <hr>

    <div class="row">
        <div class="col-md-8 ">
            <div class="panel panel-default">

                <div class="panel-heading" >
                    full calendar

                </div>
                <div class="panel-body">
                    {!!$calendar->calendar() !!}
                    {!!$calendar->script() !!}
                </div>

            </div>

        </div> 
        <div class="col-md-4">
            <div class="container">
        <form action="" method="POST" class="form-group">
            @csrf
                <label for="">Nombre Del Evento</label>
                <input type="text" name="title" class="form-control" placeholder="Nombre..." >
                <label for="">color</label>
                <input type="color" name="color" class="form-control" placeholder="Selecciona un color ">
                <label for="">Fecha comienso</label>
                <input type="datetime-local" name="start_date" class="date form-control">
                <label for="">Fecha Fin</label>
                <input type="datetime-local" class="date form-control" name="end_date">
                <br>
                <input type="submit" class="btn btn-success">
            </form>
        </div>   
    </div>
    </div>  
     

</div>
@endsection