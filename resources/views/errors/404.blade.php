<x-layouts.page>
    <x-slot name="title">404 - Not Found</x-slot>
    <div class="min-h-[calc(100vh-14rem)] flex flex-col items-center justify-center text-center">
        <x-icons.ghost class="w-64 mb-4" />
        <span class="text-gray-500 text-2xl mb-4">La pagina que buscas no existe</span>
        <a href="{{ route('home') }}"
           class="text-gray-500 text-xl px-6 py-3">
            Volver al inicio
        </a>
    </div>
</x-layouts.page>
