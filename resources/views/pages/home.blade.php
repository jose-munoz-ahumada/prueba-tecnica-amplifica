<x-layouts.page>
    <x-slot name="title">Home</x-slot>

    <div class="container">
        <x-page.title>Últimos productos</x-page.title>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($newest as $product)
                <x-product.card :product="$product" />
            @endforeach
        </div>
    </div>
</x-layouts.page>
