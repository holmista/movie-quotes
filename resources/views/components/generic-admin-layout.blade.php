<x-generic-layout>
    <div class="sticky top-0 flex bg-red-400">
        <x-switch-language locale='en' type="admin" />
    </div>
    <div class="text-lg flex justify-end p-8 gap-x-4 sticky top-0">
        <p class="{{ Request::is('admin/movies') ? 'text-blue-500' : 'text-gray-900' }}">
            <a href="/admin/movies">movies</a>
        </p>
        <p class="{{ Request::is('admin') ? 'text-blue-500' : 'text-gray-900' }}">
            <a href="/admin">quotes</a>
        </p>
    </div>

    {{ $slot }}
</x-generic-layout>
