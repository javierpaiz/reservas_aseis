<div>

    <style>
        <style>.service_section {
            text-align: center;
            color: #383a90;
            background-color: white;
            background-size: 100% 100%;
            padding-top: 275px;
            padding-bottom: 125px;
            background-repeat: no-repeat;
            margin-top: -150px;
        }

        .welcome_section .custom_heading-container h2 {
            border-color: #f9fcfb;
            color: #383a90;
        }

        .welcome_section .service_container {
            color: #383a90;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .welcome_section .service_container .service_box {
            color: #383a90;
            width: 30%;
            min-width: 300px;
            margin: 35px 15px;
        }

        .welcome_section .service_container .service_box .img-box {
            border-radius: 18px;
            overflow: hidden;
        }

        .welcome_section .service_container .service_box .img-box img {
            width: 100%;
        }

        .welcome_section .service_container .service_box .detail-box {
            margin-top: 30px;
        }

        .welcome_section .service_container .service_box .detail-box h4 {
            font-weight: bold;
        }

        .welcome_section a {
            display: inline-block;
            padding: 12px 40px;
            background-color: #feb543;
            color: #f9fcfb;
            border-radius: 25px;
            -webkit-box-shadow: 0px 2px 7px 0px rgba(32, 50, 117, 0.26);
            box-shadow: 0px 2px 7px 0px rgba(32, 50, 117, 0.26);
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            border: none;
        }

        .welcome_section a:hover {
            -webkit-transform: translateY(-7px);
            transform: translateY(-7px);
        }

        .sub_page .welcome_section {
            margin-top: 00px;
            margin-bottom: 150px;
        }
    </style>
    </style>
    <link rel="stylesheet" href="css/estilonoticias.css">
    <link rel="stylesheet" href="{{ asset('css/estilonoticias.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <section class=" layout_padding welcome_section">
        <div class="container">
            <div class="custom_heading-container">
                <h2>
                    Actividades
                </h2>
            </div>
            <div class="service_container layout_padding2">
                @foreach ($dataActividad as $item_actividad)
                    @php
                        //verificando cupo
                        $conteoInscripcion = $this->verificaInscripcion($item_actividad->idActividad);
                        $cupo = $item_actividad->capacidad - $conteoInscripcion;
                    @endphp
                    <div class="service_box">
                        <div class="img-box">
                            <img src="{{ asset($item_actividad->imagen) }}" alt="" />
                        </div>
                        <div class="detail-box">
                            <h4>
                                {{ $item_actividad->nombreActividad }} <br />
                            </h4>
                            <p>
                                {{ $item_actividad->descripcionActividad }} <br>
                            <p><b>Categoria: </b>{{ $item_actividad->descripcion }} | <b>Lugar:
                                </b>{{ $item_actividad->lugar }}</p>
                            </p>
                            @if ($cupo <= 0)
                                <p class="badge badge-danger">Ya no te puedes inscribir cupo lleno</p>
                            @else
                                <p><b>Cupo disponible: </b> {{ $cupo }} <b> | Costo: </b>
                                    ${{ $item_actividad->costo }}</p>
                                <a href="{{ route('regitro_actividad', $item_actividad->idActividad) }}">Inscribirme</a>
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
