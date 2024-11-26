<div>
    <style>
        .swal2-html-container,
        .swal2-title {
            color: white !important;
        }
    </style>
    <section class="contact_section layout_padding">
        <div class="container contact_heading text-center">
            <h2>
                Listado de actividades
            </h2>
            
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="table-responsive col-md-10">
                    <table class="table table-hover mx-auto">
                        <thead class="text-center">
                            <tr>
                                <th>Actividad</th>
                                <th>Fecha</th>
                                <th>Cupo</th>
                                <th>Inscritos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($actividades as $item_actividad)
                                <tr>
                                    <td>{{ $item_actividad->nombreActividad }}</td>
                                    <td>{{ $item_actividad->fecha }}</td>
                                    <td>{{ $item_actividad->capacidad }}</td>
                                    <td>{{ $this->verificaInscripcion($item_actividad->idActividad) }}</td>
                                    <td>
                                        <a class="btn btn-outline-primary rounded-pill"
                                            href="{{ route('informe', ['idActividad' => $item_actividad->idActividad]) }}">Ver
                                            informe de inscritos</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            
        </div>
        <div class="d-flex justify-content-center">
            <a href="/" class="btn btn-outline-secondary m-2 rounded-pill">Ir a la pagina principal</a>
        </div>
    </section>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('error', (mensaje) => {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    iconColor: 'white',
                    background: '#7a230c',
                    timer: 3000
                });
                Toast.fire({
                    icon: 'error',
                    title: mensaje
                });
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
                Toast.fire({
                    icon: 'success',
                    title: mensaje
                });
            });
        });
    </script>
</div>
