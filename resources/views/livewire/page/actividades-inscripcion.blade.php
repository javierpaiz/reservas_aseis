<div>
    <link rel="stylesheet" href="css/estilonoticias.css">
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
                    <div class="service_box">
                        <div class="img-box">
                            <img src="{{asset($item_actividad->imagen)}}" alt="" />
                        </div>
                        <div class="detail-box">
                            <h4>
                                {{$item_actividad->nombreActividad}} <br />
                                
                            </h4>
                            <p>
                                {{$item_actividad->descripcionActividad}} <br>
                                <p><b>Categoria: </b>{{$item_actividad->descripcion}}</p>
                            </p>
                            <a href="{{route('regitro_actividad', $item_actividad->idActividad)}}">Inscribirme</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
