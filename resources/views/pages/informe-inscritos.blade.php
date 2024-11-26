<x-header />
<link rel="stylesheet" href="../css/estilonoticias.css">
<link rel="stylesheet" href="{{asset('css/estilonoticias.css')}}">
<link rel="stylesheet" href="../css/estilonoticias.css">
<link rel="stylesheet" href="{{asset('css/estilonoticias.css')}}">
<link href="{{asset('css/style.css')}}" rel="stylesheet" />
<link href="../css/style.css" rel="stylesheet" />
<link href="../css/responsive.css" rel="stylesheet" />
<link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

<section class="contact_section layout_padding">
    <div class="container contact_heading">
        <h2 class="text-center">
            Listado de personas inscritas a la actividad: <br>
            <b style="color:darkblue">{{$actividad->nombreActividad}}</b>
        </h2>
    </div>
    <div class="container">

        <div class="form-row justify-content-center">
            <div class="table-responsive">
                <table class="table table-hover mx-auto" style="width: auto;">
                    <thead class="text-center">
                        <tr>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Carnet</th>
                            <th>Equipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inscritos as $item_inscritos)
                            <tr>
                                <td>{{ $item_inscritos->nombre }}</td>
                                <td>{{ $item_inscritos->telefono }}</td>
                                <td>{{ $item_inscritos->correo }}</td>
                                <td>{{ $item_inscritos->carnet }}</td>
                                <td>{{ $item_inscritos->miembros }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{route('inscripcion_general')}}" class="btn btn-outline-secondary m-2 rounded-pill">Regresar</a>
        </div>
    </div>
</section>
<x-footer />
