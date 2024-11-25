<div>
  
    <style>
        .swal2-html-container,
        .swal2-title {
            color: white !important;
        }
    </style>
    @php
        //definicion de variables a utilizar
        $idTipoActividad = 0;
    @endphp
    {{-- Do your work, then step back. --}}
    <section class="contact_section layout_padding">
        <div class="container contact_heading">
            @foreach ($actividad as $item_actividad)
                @php
                    $idTipoActividad = $item_actividad->idTipoActividad;
                @endphp
                <div class="row">
                    <div class="row">
                        <h2>{{ $item_actividad->nombreActividad }}</h2>
                    </div>
                </div>
                <div class="why_section layout_padding row ">
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
                        @if ($idTipoActividad == 1)
                            <div class="img-box" style="">
                                <img src="{{ asset('images/multiple-users-silhouette.png') }} " alt="" />
                            </div>
                        @else
                            <div class="img-box" style="">
                                <img src="{{ asset('images/smiley.png') }} " alt="" />
                            </div>
                        @endif

                        <div class="detail-box">
                            <h3>
                                <p>Tipo: {{ $item_actividad->descripcion_tipo }}</p>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
            <h2>
                Registrate
            </h2>
            <p>
                Estas por registrarte en una actividad, completa la siguiente informacion
            </p>
        </div>
        <div class="container">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName4">Nombre completo</label>
                        <input type="text" class="form-control  rounded-pill" id="inputName4" wire:model="nombre" />
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control rounded-pill" id="inputEmail4" wire:model="correo" />
                        @error('correo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNumber4">Numero telefono</label>
                        <input type="tel" class="form-control rounded-pill" id="inputNumber4" wire:model="telefono" />
                        @error('telefono')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNumber4">Numero de carnet</label>
                        <input type="tel" class="form-control rounded-pill" id="inputNumber4" wire:model="numero_carnet" />
                        @error('numero_carnet')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if ($idTipoActividad == 1)
                    <div class="form-group">
                        <label for="inputMessage">Integrantes del equipo</label>
                        <input type="text" class="form-control rounded-pill" id="inputMessage" placeholder=""
                            wire:model="miembros" />
                    </div>
                @endif

        </div>
        </form>
        <div class="d-flex justify-content-center">
            <span class="text-red" id="Errores"></span>
            <div class="alert alert-primary rounded-pill">
                <p>Se usara tu correo electronico como identificador con el podras consultar tus inscripciones en el
                    siguiente en enlace</p>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="/" class="btn btn-outline-secondary m-2 rounded-pill">Cancelar</a>
            <button wire:click="registrar()" type="" class="btn  m-2 rounded-pill"
                style="background: #383a90; color:white">Registrarme</button>
        </div>
    </section>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('error', (mensaje) => {
                $('#Errores').text(mensaje);
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
