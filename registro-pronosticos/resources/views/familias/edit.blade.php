<x-app-layout>
    <!-- Título del encabezado (Header) -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Familias') }}
        </h2>
    </x-slot>

    <!-- Contenido Principal -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    ¡Aquí va todo el contenido de tu vista!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
