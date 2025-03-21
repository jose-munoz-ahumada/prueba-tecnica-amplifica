<div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
    <div class="h-56 w-full">
        <a href="#">
            <img class="mx-auto h-full" src="{{ $product->image }}" alt="" />
        </a>
    </div>

    <div class="pt-6">
        <div class="min-h-20">
            <a href="#" class="text-lg font-medium leading-tight text-gray-900 line-clamp-3 hover:underline">{{ $product->name }}</a>
        </div>
        <p class="text-2xl font-extrabold leading-tight text-gray-900 pt-2 pb-4">{{ $product->price_format }}</p>
        <div class="w-full">
            <x-forms.button data-product-id="{{ $product->id }}" type="button" class="w-full add-to-cart">Agregar al carro</x-forms.button>
        </div>
    </div>
</div>
