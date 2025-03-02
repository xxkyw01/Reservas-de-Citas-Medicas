@extends('layouts.admin')
@section('content')
    <div class="row">
        <h3><b>Bienvenido: </b>{{Auth::user()->email}} / <b>Rol:</b> {{Auth::user()->roles->pluck('name')->first()}} </h3>
    </div>

    <hr>

    <div class="row">

        @can('admin.usuarios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$total_usuarios}}</h3>
                        <p>Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-file-person"></i>
                    </div>
                    <a href="{{url('admin/usuarios')}}" class="small-box-footer">Más información <i class="fas bi bi-file-person"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.secretarias.index')
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{$total_secretarias}}</h3>
                            <p>Secretarias</p>
                        </div>
                        <div class="icon">
                            <i class="ion fas bi bi-person-circle"></i>
                        </div>
                        <a href="{{url('admin/secretarias')}}" class="small-box-footer">Más información <i class="fas bi bi-file-person"></i></a>
                    </div>
                </div>
        @endcan

        @can('admin.pacientes.index')
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$total_pacientes}}</h3>
                            <p>Pacientes</p>
                        </div>
                        <div class="icon">
                            <i class="ion fas bi bi-person-fill-check"></i>
                        </div>
                        <a href="{{url('admin/pacientes')}}" class="small-box-footer">Más información <i class="fas bi bi-file-person"></i></a>
                    </div>
                </div>
            @endcan

        @can('admin.consultorios.index')
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$total_consultorios}}</h3>
                            <p>Consultorios</p>
                        </div>
                        <div class="icon">
                            <i class="ion fas bi bi-building-fill-add"></i>
                        </div>
                        <a href="{{url('admin/consultorios')}}" class="small-box-footer">Más información <i class="fas bi bi-file-person"></i></a>
                    </div>
                </div>
            @endcan

        @can('admin.doctores.index')
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$total_doctores}}</h3>
                            <p>Doctores</p>
                        </div>
                        <div class="icon">
                            <i class="ion fas bi bi-person-lines-fill"></i>
                        </div>
                        <a href="{{url('admin/doctores')}}" class="small-box-footer">Más información <i class="fas bi bi-file-person"></i></a>
                    </div>
                </div>
            @endcan

        @can('admin.horarios.index')
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{$total_horarios}}</h3>
                            <p>Horarios</p>
                        </div>
                        <div class="icon">
                            <i class="ion fas bi bi-calendar2-week"></i>
                        </div>
                        <a href="{{url('admin/horarios')}}" class="small-box-footer">Más información <i class="fas bi bi-file-person"></i></a>
                    </div>
                </div>
            @endcan


            @can('admin.horarios.index')
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$total_eventos}}</h3>
                            <p>Reservas</p>
                        </div>
                        <div class="icon">
                            <i class="ion fas bi bi-calendar2-check"></i>
                        </div>
                        <a href="" class="small-box-footer"> <i class="fas bi-calendar2-check"></i></a>
                    </div>
                </div>
            @endcan

            @can('admin.horarios.index')
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{$total_configuraciones}}</h3>
                            <p>Configuraciones</p>
                        </div>
                        <div class="icon">
                            <i class="ion fas bi bi-gear"></i>
                        </div>
                        <a href="{{url('/admin/configuraciones')}}" class="small-box-footer"> Más información<i class="fas bi bi-gear"></i></a>
                    </div>
                </div>
            @endcan


    </div>

    @can('cargar_datos_consultorios')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <dv class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="card-title">Calendario de atención de doctores</h3>
                            </div>
                            <div class="col-md-4">
                                <div style="float: right">
                                    <label for="">Consultorios</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select name="consultorio_id" id="consultorio_select" class="form-control">
                                    <option value="">Seleccione un consultorio...</option>
                                    @foreach($consultorios as $consultorio)
                                        <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicacion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </dv>
                    <div class="card-body">
                        <script>
                            $('#consultorio_select').on('change',function () {
                                var consultorio_id = $('#consultorio_select').val();
                                //alert(consultorio_id);

                                if(consultorio_id){
                                    $.ajax({
                                        url: "{{url('/consultorios/')}}" + '/' + consultorio_id,
                                        type: 'GET',
                                        success: function (data) {
                                            $('#consultorio_info').html(data);
                                        },
                                        error: function () {
                                            alert('Error al obtener los datos del consultorio java');
                                        }
                                    });
                                }else{
                                    $('#consultorio_info').html('');
                                }
                            });
                        </script>
                        <hr>
                        <div id="consultorio_info">

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-warning">
                    <dv class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="card-title">Calendario de reserva de citas medicas</h3>
                            </div>
                            <div class="col-md-4">
                                <div style="float: right">
                                    <label for="">Doctores</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select name="doctor_id" id="doctor_select" class="form-control">
                                    <option value="">Seleccione su doctor...</option>
                                    @foreach($doctores as $doctore)
                                        <option value="{{$doctore->id}}">{{$doctore->nombres." ".$doctore->apellidos." - ".$doctore->especialidad}}</option>
                                    @endforeach
                                </select>
                                <script>
                                    $('#doctor_select').on('change',function () {
                                        var doctor_id = $('#doctor_select').val();
                                        //alert(doctor_id);

                                        var calendarEl = document.getElementById('calendar');
                                        var calendar = new FullCalendar.Calendar(calendarEl, {
                                            initialView: 'dayGridMonth',
                                            locale: 'es',
                                            events: [],
                                        });

                                        if(doctor_id){
                                            $.ajax({
                                                url: "{{url('/cargar_reserva_doctores/')}}" + '/' + doctor_id,
                                                type: 'GET',
                                                dataType: 'json',
                                                success: function (data) {
                                                    calendar.addEventSource(data);
                                                },
                                                error: function () {
                                                    alert('Error al obtener los datos del consultorio java');
                                                }
                                            });
                                        }else{
                                            $('#doctor_info').html('');
                                        }
                                        calendar.render();
                                    });
                                </script>
                            </div>
                        </div>
                    </dv>

                    <div class="card-body">
                        <div class="row">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Registrar cita medica
                            </button>

                            <a href="{{url('/admin/ver_reservas',Auth::user()->id)}}" class="btn btn-success"> <i class="bi bi-calendar2-check"></i> Ver las reservas</a>

                            <!-- Modal -->
                            <form action="{{url('/admin/eventos/create')}}" method="post">
                                @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reserva de cita medica</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Doctor</label>
                                                            <select name="doctor_id" id="" class="form-control">
                                                                @foreach($doctores as $doctore)
                                                                    <option value="{{$doctore->id}}">
                                                                        {{$doctore->nombres." ".$doctore->apellidos." - ".$doctore->especialidad}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Fecha de reserva</label>
                                                            <input type="date" id="fecha_reserva" value="<?php echo date('Y-m-d');?>" name="fecha_reserva" class="form-control">
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    const fechaReservaInput = document.getElementById('fecha_reserva');

                                                                    // Escuchar el evento de cambio en el campo de fecha de reserva
                                                                    fechaReservaInput.addEventListener('change', function() {
                                                                        let selectedDate = this.value; // Obtener la fecha seleccionada

                                                                        // Obtener la fecha actual en formato ISO (yyyy-mm-dd)
                                                                        let today = new Date().toISOString().slice(0, 10);

                                                                        // Verificar si la fecha seleccionada es anterior a la fecha actual
                                                                        if (selectedDate < today) {
                                                                            // Si es así, establecer la fecha seleccionada en null
                                                                            this.value = null;
                                                                            alert('No se puede reservar en una fecha pasada.');
                                                                        }
                                                                    });
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Hora de reserva</label>
                                                            <input type="time" name="hora_reserva" id="hora_reserva" class="form-control">
                                                            @error('hora_reserva')
                                                            <small style="color:red">{{$message}}</small>
                                                            @enderror
                                                            @if( (($message = Session::get('hora_reserva'))) )
                                                                <script>
                                                                    document.addEventListener('DOMContentLoaded', function() {
                                                                        $('#exampleModal').modal('show');
                                                                    });
                                                                </script>
                                                                <small style="color:red">{{$message}}</small>
                                                            @endif
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    const horaReservaInput = document.getElementById('hora_reserva');

                                                                    horaReservaInput.addEventListener('change', function() {
                                                                        let selectedTime = this.value; // Obtener el valor de la hora seleccionada

                                                                        // Asegurar que solo se capture la parte de la hora
                                                                        if (selectedTime) {
                                                                            selectedTime = selectedTime.split(':'); // Dividir la cadena en horas y minutos
                                                                            selectedTime = selectedTime[0] + ':00'; // Conservar solo la hora, ignorar los minutos
                                                                            this.value = selectedTime; // Establecer la hora modificada en el campo de entrada
                                                                        }

                                                                        // Verificar si la hora seleccionada está fuera del rango permitido
                                                                        if (selectedTime < '08:00' || selectedTime > '20:00') {
                                                                            // Si es así, establecer la hora seleccionada en null
                                                                            this.value = null;
                                                                            alert('Por favor, seleccione una hora entre las 08:00 y las 20:00.');
                                                                        }
                                                                    });
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Registrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    @endcan


    @if(Auth::check() && Auth::user()->doctor)
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <dv class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="card-title">Calendario de reservas</h3>
                            </div>
                        </div>
                    </dv>
                    <div class="card-body">

                        <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                            <thead style="background-color: #c0c0c0">
                            <tr>
                                <td style="text-align: center"><b>Nro</b></td>
                                <td style="text-align: center"><b>Usuario</b></td>
                                <td style="text-align: center"><b>Fecha de reserva</b></td>
                                <td style="text-align: center"><b>Hora de reserva</b></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $contador = 1; ?>
                            @foreach($eventos as $evento)
                                @if(Auth::user()->doctor->id == $evento->doctor_id)
                                    <tr>
                                        <td style="text-align: center">{{$contador++}}</td>
                                        <td>{{$evento->user->name}}</td>
                                        <td style="text-align: center">{{ \Carbon\Carbon::parse($evento->start)->format('Y-m-d') }}</td>
                                        <td style="text-align: center">{{ \Carbon\Carbon::parse($evento->start)->format('H:i') }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(function () {
                                $("#example1").DataTable({
                                    "pageLength": 5,
                                    "language": {
                                        "emptyTable": "No hay información",
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Reservas",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",
                                        "infoFiltered": "(Filtrado de _MAX_ total Reservas)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Reservas",
                                        "loadingRecords": "Cargando...",
                                        "processing": "Procesando...",
                                        "search": "Buscador:",
                                        "zeroRecords": "Sin resultados encontrados",
                                        "paginate": {
                                            "first": "Primero",
                                            "last": "Ultimo",
                                            "next": "Siguiente",
                                            "previous": "Anterior"
                                        }
                                    },
                                    "responsive": true, "lengthChange": true, "autoWidth": false,
                                    buttons: [{
                                        extend: 'collection',
                                        text: 'Reportes',
                                        orientation: 'landscape',
                                        buttons: [{
                                            text: 'Copiar',
                                            extend: 'copy',
                                        }, {
                                            extend: 'pdf'
                                        },{
                                            extend: 'csv'
                                        },{
                                            extend: 'excel'
                                        },{
                                            text: 'Imprimir',
                                            extend: 'print'
                                        }
                                        ]
                                    },
                                        {
                                            extend: 'colvis',
                                            text: 'Visor de columnas',
                                            collectionLayout: 'fixed three-column'
                                        }
                                    ],
                                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    @endif




@endsection
