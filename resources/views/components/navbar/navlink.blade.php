@props( ['active' => false] )

<li>
    <a href="#" 
        class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:dark:text-blue-500" aria-current="page">
        {{ $slot }}
    </a>
</li>