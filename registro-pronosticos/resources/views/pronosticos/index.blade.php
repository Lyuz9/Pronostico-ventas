<x-app-layout>
    <!-- Título del encabezado (Header) -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Consultar Pronosticos') }}
        </h2>
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
                    <div class="mt-2">
                        <a href=" {{ route('pronosticos.create') }} " class="btn btn-primary">
                            Nuevo Producto
                        </a>
                    </div>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Vendedor</th>
                                <th scope="col">Familia</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Ene</th>
                                <th scope="col">Feb</th>
                                <th scope="col">Mar</th>
                                <th scope="col">Abr</th>
                                <th scope="col">May</th>
                                <th scope="col">Jun</th>
                                <th scope="col">Jul</th>
                                <th scope="col">Ago</th>
                                <th scope="col">Sep</th>
                                <th scope="col">Oct</th>
                                <th scope="col">Nov</th>
                                <th scope="col">Dic</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pronosticos as $pronostico)
                                <tr>
                                    <th scope="row"> {{ $pronostico->id }} </th>
                                    <td> {{ $pronostico->user->name }} </td>
                                    <td> {{ $pronostico->familia->fam_nombre }} </td>
                                    <td> {{ $pronostico->producto->pro_nombre }} </td>
                                    <td> {{ $pronostico->ene }} </td>
                                    <td> {{ $pronostico->feb }} </td>
                                    <td> {{ $pronostico->mar }} </td>
                                    <td> {{ $pronostico->abr }} </td>
                                    <td> {{ $pronostico->may }} </td>
                                    <td> {{ $pronostico->jun }} </td>
                                    <td> {{ $pronostico->jul }} </td>
                                    <td> {{ $pronostico->ago }} </td>
                                    <td> {{ $pronostico->sep }} </td>
                                    <td> {{ $pronostico->oct }} </td>
                                    <td> {{ $pronostico->nov }} </td>
                                    <td> {{ $pronostico->dic }} </td>
                                    <td>
                                        <a href="{{ route('pronosticos.edit', $pronostico) }}" class="btn btn-warning">
                                            Editar
                                        </a>

                                        <form action="{{ route('productos.destroy', $pronostico ) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar pronostico?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
