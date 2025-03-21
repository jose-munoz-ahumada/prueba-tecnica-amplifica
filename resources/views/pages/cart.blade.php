<x-layouts.page>
    <x-slot name="title">Cart</x-slot>

    <div class="container">
        @if($cart->products->isEmpty())
            <div class="flex justify-center">
                <p class="mb-0">No hay productos en tu carrito.</p>
            </div>
        @else
            <div class="relative overflow-x-auto mb-8">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase border-b border-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Producto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cantidad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Subtotal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Peso total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart->products as $product)
                        <tr class="bg-white border-b border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $product->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->price_format }}
                            </td>
                            <td class="px-6 py-4">
                                x {{ $product->pivot->quantity }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->TotalPrice }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->TotalWeight }}
                            </td>
                            <td class="px-6 py-4">
                                <x-forms.button class="remove-from-cart" data-product-id="{{ $product->id }}">Eliminar</x-forms.button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-full flex justify-start md:justify-end">
                <div class="w-100">
                    <h2 class="mb-8">Buscar tarifas de envio</h2>
                    <form action="{{ route('shipping.rates') }}" id="getRates" method="post" class="w-full max-w-lg">
                        <div class="mb-4">
                            <x-forms.select label="Region" id="region">
                                <option value="">Seleccione</option>
                            </x-forms.select>
                        </div>
                        <div class="mb-4">
                            <x-forms.select label="Comuna" id="comuna">
                                <option value="">Seleccione</option>
                            </x-forms.select>
                        </div>
                        <div class="flex justify-end">
                            <x-forms.button type="submit">Buscar tarifas</x-forms.button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="ratesResponse"></div>

        @endif
    </div>
</x-layouts.page>
