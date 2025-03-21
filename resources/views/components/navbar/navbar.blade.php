<navbar>
    <nav class="bg-white border-b border-gray-300 py-3">
        <div class="container flex flex-wrap items-center justify-between mx-auto py-4">
            <a href="{{  route('home') }}" class="flex items-center space-x-3">
                <span class="self-center text-2xl font-semibold whitespace-nowrap">{{ config('app.name') }}</span>
            </a>
            <div class="items-center justify-between flex w-auto">
                <ul class="flex flex-col font-medium p-0 border-gray-100 rounded-lg space-x-8 flex-row mt-0 border-0">
                    <li>
                        <a href="{{ route('cart') }}">
                            <x-icons.cart />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
      </nav>
</navbar>
