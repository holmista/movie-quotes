<div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
    <form method="GET" action="#">
        {{-- @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif --}}
        <input type="text" name="search" placeholder="Find something"
            class="bg-transparent placeholder-black font-semibold text-sm outline-0" value="{{ request('search') }}">
    </form>
</div>
