<x-generic-layout>
    <div class="sticky top-0 flex bg-red-400">
        <x-switch-language locale='en' type="admin" />
    </div>
    {{-- <p class="text-lg {{ Request::is('admin/movies') ? 'text-blue-500' : 'text-gray-900' }}">
        <a href="/admin/movies">movies</a>
    </p>
    <p class="text-lg {{ Request::is('admin/movies') ? 'text-blue-500' : 'text-gray-900' }}">
        <a href="/admin">quotes</a>
    </p> --}}
    {{ $slot }}
</x-generic-layout>
