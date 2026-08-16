<x-app-layout>
    <!-- Título del encabezado (Header) -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Pronósticos') }}
        </h2>
        {{-- ✅ Mostrar errores de validación CLARAMENTE --}}
        @if ($errors->any())
            <div
                style="color: red; background: #ffebee; padding: 15px; margin-bottom: 20px; border-radius: 6px; border: 1px solid red;">
                <strong>⚠️ No se pudo guardar. Corrige esto:</strong>
                <ul class="mt-2 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous">
    </script>

    <!-- Contenido Principal -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('pronosticos.update', $pronostico) }}" method="POST" class="row g-3">
                        @csrf
                        @method('PUT')

                        {{-- Usuario --}}
                        <div class="col-md-4">
                            <label class="form-label">Usuario</label>
                            <input type="text" class="form-control" value="{{ $pronostico->user->name }}" disabled>
                            <input type="hidden" name="user_id" value="{{ $pronostico->user_id }}">
                        </div>

                        {{-- Familia --}}
                        <div class="col-md-4">
                            <label class="form-label">Familia</label>
                            <input type="text" class="form-control" value="{{ $pronostico->familia->fam_nombre }}"
                                disabled>
                            <input type="hidden" name="familia_id" value="{{ $pronostico->familia_id }}">
                        </div>

                        {{-- Producto --}}
                        <div class="col-md-4">
                            <label class="form-label">Producto</label>
                            <input type="text" class="form-control" value="{{ $pronostico->producto->pro_nombre }}"
                                disabled>
                            <input type="hidden" name="producto_id" value="{{ $pronostico->producto_id }}">
                        </div>

                        {{-- Meses con valores cargados --}}
                        <div class="row g-3 mt-2">
                            <div class="col">
                                <label class="form-label text-center d-block">Ene</label>
                                <input type="number" name="ene" class="form-control" value="{{ $pronostico->ene }}"
                                    required min="0">
                            </div>
                            <div class="col">
                                <label class="form-label text-center d-block">Feb</label>
                                <input type="number" name="feb" class="form-control"
                                    value="{{ $pronostico->feb }}" required min="0">
                            </div>
                            <div class="col">
                                <label class="form-label text-center d-block">Mar</label>
                                <input type="number" name="mar" class="form-control"
                                    value="{{ $pronostico->mar }}" required min="0">
                            </div>
                            <div class="col">
                                <label class="form-label text-center d-block">Abr</label>
                                <input type="number" name="abr" class="form-control"
                                    value="{{ $pronostico->abr }}" required min="0">
                            </div>
                            <div class="col">
                                <label class="form-label text-center d-block">May</label>
                                <input type="number" name="may" class="form-control"
                                    value="{{ $pronostico->may }}" required min="0">
                            </div>
                            <div class="col">
                                <label class="form-label text-center d-block">Jun</label>
                                <input type="number" name="jun" class="form-control"
                                    value="{{ $pronostico->jun }}" required min="0">
                            </div>
                            <div class="col">
                                <label class="form-label text-center d-block">Jul</label>
                                <input type="number" name="jul" class="form-control"
                                    value="{{ $pronostico->jul }}" required min="0">
                            </div>
                            <div class="col">
                                <label class="form-label text-center d-block">Ago</label>
                                <input type="number" name="ago" class="form-control"
                                    value="{{ $pronostico->ago }}" required min="0">
                            </div>
                            <div class="col">
                                <label class="form-label text-center d-block">Sep</label>
                                <input type="number" name="sep" class="form-control"
                                    value="{{ $pronostico->sep }}" required min="0">
                            </div>
                            <div class="col">
                                <label class="form-label text-center d-block">Oct</label>
                                <input type="number" name="oct" class="form-control"
                                    value="{{ $pronostico->oct }}" required min="0">
                            </div>
                            <div class="col">
                                <label class="form-label text-center d-block">Nov</label>
                                <input type="number" name="nov" class="form-control"
                                    value="{{ $pronostico->nov }}" required min="0">
                            </div>
                            <div class="col">
                                <label class="form-label text-center d-block">Dic</label>
                                <input type="number" name="dic" class="form-control"
                                    value="{{ $pronostico->dic }}" required min="0">
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-success">💾 Guardar Cambios</button>
                            <a href="{{ route('pronosticos.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
