<div>
    <style>
        .swal2-html-container,
        .swal2-title {
            color: white !important;
        }
    </style>
    {{-- Do your work, then step back. --}}
    <section class="contact_section layout_padding">
        <div class="container contact_heading">
            <h2>
                Verifica
            </h2>
            <p>
                Aqui podras consultar las actividades a las que te inscribiste
            </p>
        </div>
        <div class="container">

            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputName4">Escribe tu direccion de correo con el que te registraste</label>
                    <input type="text" class="form-control rounded-pill" id="inputName4" wire:model="correo" />
                    @error('correo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-4 p-4">
                    <button wire:click="buscar_correo()" type="" class="btn  m-2 rounded-pill"
                        style="background: #383a90; color:white">Buscar</button>
                </div>
                <div class="alert alert-primary rounded-pill">
                    <p>Se usara tu direccion de correo electronico como identificador con el podras consultar tus
                        inscripciones en el siguiente en enlace</p>
                </div>
            </div>

            @foreach ($actividad as $item_actividad)
                <div class="row">
                    <div class="row">
                        <h2>{{ $item_actividad->nombreActividad }}</h2>
                    </div>
                </div>
                <div class="why_section layout_padding row">
                    <div class="col-md-3 col-sm-6 p-2">
                        <div class="img-box" style="">
                            <img src="{{ asset('images/bar-chart.png') }} " alt="" />
                        </div>
                        <div class="detail-box">
                            <h3>
                                <p>Fecha: {{ $item_actividad->fecha }}</p>
                            </h3>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 p-2">
                        <div class="img-box" style="">
                            <img src="{{ asset('images/monitor.png') }} " alt="" />
                        </div>
                        <div class="detail-box">
                            <h3>
                                <p>Hora: {{ $item_actividad->hora }}</p>
                            </h3>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 p-2">
                        <div class="img-box" style="">
                            <img src="{{ asset('images/smiley.png') }} " alt="" />
                        </div>
                        <div class="detail-box">
                            <h3>
                                <p>Tipo: {{ $item_actividad->descripcion_tipo }}</p>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center">

            </div>
            <div class="d-flex justify-content-center">
                <a href="/" class="btn btn-outline-secondary m-2 rounded-pill">Cancelar</a>
            </div>
    </section>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('error', (mensaje) => {
                // $('#mensaje').text(mensaje);
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    iconColor: 'white',
                    background: '#7a230c',
                    timer: 3000
                });
                // Manejar el evento aquí
                ///console.log('Se ha actualizado el DataTable');
                Toast.fire({
                    icon: 'error',
                    title: mensaje
                })
            });
            Livewire.on('exito', (mensaje) => {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    iconColor: 'white',
                    background: '#383a90',
                    timer: 3000
                });
                // Manejar el evento aquí
                ///console.log('Se ha actualizado el DataTable');
                Toast.fire({
                    icon: 'success',
                    title: mensaje
                })
            });
        });
    </script>
</div>
