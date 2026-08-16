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
                    <form action="{{ route('pronosticos.store') }}" method="POST">
                        @csrf

                        {{-- FILTROS: Usuario y Familia --}}
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">👤 Usuario</label>
                                <select name="user_id" id="user_id" class="form-select" required>
                                    <option value="">-- Selecciona un usuario --</option>
                                    @foreach ($usuarios as $u)
                                        <option value="{{ $u->id }}"
                                            {{ old('user_id') == $u->id ? 'selected' : '' }}>
                                            {{ $u->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">👨‍👩‍👧‍👦 Familia</label>
                                <select name="familia_id" id="familia_id" class="form-select" required>
                                    <option value="">-- Primero selecciona una familia --</option>
                                    @foreach ($familias as $f)
                                        <option value="{{ $f->id }}"
                                            {{ old('familia_id') == $f->id ? 'selected' : '' }}>
                                            {{ $f->fam_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- ÁREA DE PRODUCTOS (se llena automáticamente) --}}
                        <div id="area-productos" class="mt-4" style="display:none;">
                            <h4 class="fw-bold mb-3">📦 Productos de esta Familia (selecciona los que pronosticarás)
                            </h4>
                            <p class="text-muted mb-2">Marca los productos y escribe el pronóstico de cada mes:</p>

                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width:40px;">✅</th>
                                            <th>Producto</th>
                                            <th>Ene</th>
                                            <th>Feb</th>
                                            <th>Mar</th>
                                            <th>Abr</th>
                                            <th>May</th>
                                            <th>Jun</th>
                                            <th>Jul</th>
                                            <th>Ago</th>
                                            <th>Sep</th>
                                            <th>Oct</th>
                                            <th>Nov</th>
                                            <th>Dic</th>
                                        </tr>
                                    </thead>
                                    <tbody id="lista-productos">
                                        {{-- JavaScript llenará aquí las filas dinámicamente --}}
                                    </tbody>
                                </table>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">💾 Guardar Pronósticos</button>
                        </div>

                        {{-- Mensaje cuando no hay familia seleccionada --}}
                        <div id="mensaje-seleccion" class="alert alert-info mt-4">
                            👆 Selecciona una <strong>Familia</strong> para ver sus productos y llenar los pronósticos.
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('familia_id').addEventListener('change', function() {
        const familiaId = this.value;
        const area = document.getElementById('area-productos');
        const mensaje = document.getElementById('mensaje-seleccion');
        const lista = document.getElementById('lista-productos');

        if (!familiaId) {
            area.style.display = 'none';
            mensaje.style.display = 'block';
            lista.innerHTML = '';
            return;
        }

        fetch(`/pronosticos/productos-por-familia/${familiaId}`)
            .then(res => res.json())
            .then(productos => {
                lista.innerHTML = '';

                if (productos.length === 0) {
                    lista.innerHTML =
                        `<tr><td colspan="14" class="text-center text-muted">No hay productos registrados en esta familia.</td></tr>`;
                    area.style.display = 'block';
                    mensaje.style.display = 'none';
                    return;
                }

                // ✅ Generar filas con nombres CORRECTOS
                productos.forEach((prod, indice) => {
                    const fila = document.createElement('tr');
                    fila.innerHTML = `
                    <td class="text-center">
                        {{-- El checkbox SOLO habilita, NO envía el ID directamente --}}
                        <input type="checkbox" class="form-check-input producto-check" data-indice="${indice}">
                    </td>
                    <td><strong>${prod.pro_nombre}</strong></td>
                    <td><input type="number" name="productos[${indice}][producto_id]" value="${prod.id}" class="d-none">
                        <input type="number" name="productos[${indice}][ene]" class="form-control form-control-sm" disabled min="0" value="0"></td>
                    <td><input type="number" name="productos[${indice}][feb]" class="form-control form-control-sm" disabled min="0" value="0"></td>
                    <td><input type="number" name="productos[${indice}][mar]" class="form-control form-control-sm" disabled min="0" value="0"></td>
                    <td><input type="number" name="productos[${indice}][abr]" class="form-control form-control-sm" disabled min="0" value="0"></td>
                    <td><input type="number" name="productos[${indice}][may]" class="form-control form-control-sm" disabled min="0" value="0"></td>
                    <td><input type="number" name="productos[${indice}][jun]" class="form-control form-control-sm" disabled min="0" value="0"></td>
                    <td><input type="number" name="productos[${indice}][jul]" class="form-control form-control-sm" disabled min="0" value="0"></td>
                    <td><input type="number" name="productos[${indice}][ago]" class="form-control form-control-sm" disabled min="0" value="0"></td>
                    <td><input type="number" name="productos[${indice}][sep]" class="form-control form-control-sm" disabled min="0" value="0"></td>
                    <td><input type="number" name="productos[${indice}][oct]" class="form-control form-control-sm" disabled min="0" value="0"></td>
                    <td><input type="number" name="productos[${indice}][nov]" class="form-control form-control-sm" disabled min="0" value="0"></td>
                    <td><input type="number" name="productos[${indice}][dic]" class="form-control form-control-sm" disabled min="0" value="0"></td>
                `;
                    lista.appendChild(fila);
                });

                // ✅ Al marcar → activar TODO el bloque
                lista.addEventListener('change', function(e) {
                    if (e.target.classList.contains('producto-check')) {
                        const indice = e.target.dataset.indice;
                        const fila = e.target.closest('tr');
                        const todosInputs = fila.querySelectorAll('input[type="number"]');

                        // Activar/desactivar TODOS los campos de esta fila
                        todosInputs.forEach(input => {
                            // NO desactivar el campo oculto del ID
                            if (input.name.includes('[producto_id]')) {
                                input.disabled = !e.target.checked;
                            } else {
                                input.disabled = !e.target.checked;
                                if (!e.target.checked) input.value = '';
                            }
                        });
                    }
                });

                area.style.display = 'block';
                mensaje.style.display = 'none';
            })
            .catch(err => {
                alert('Error al cargar productos. Intenta de nuevo.');
                console.error(err);
            });
    });
</script>
