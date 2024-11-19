<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <section class="service_section">
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
                            <img src="images/s-1.jpg" alt="" />
                        </div>
                        <div class="detail-box">
                            <h4>
                                {{$item_actividad->nombreActividad}} <br />
                                categoria

                            </h4>
                            <p>
                                Descripcion de la actividad
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
            <div>
                <a href="">
                    Read More
                </a>
            </div>
        </div>
    </section>
</div>
