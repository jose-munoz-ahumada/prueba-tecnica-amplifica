<div id="rates" class="mt-4">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Tarifas Disponibles</h3>

    <div class="space-y-4">
        @foreach($rates as $rate)
            <div class="bg-white p-4 rounded-md shadow-md">
                <div class="flex justify-between items-center">
                    <h4 class="text-xl font-bold text-gray-800">{{ $rate['name'] }}</h4>
                    <span class="text-lg font-semibold text-indigo-600">{{ number_format($rate['price'], 0, ',', '.') }}</span>
                </div>
                <div class="mt-2 text-gray-600">
                    <p><strong>Código:</strong> {{ $rate['code'] }}</p>
                    <p><strong>Días de tránsito:</strong> {{ $rate['transitDays'] }} días</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
