@props(['locale', 'type'])

@if ($type === 'client')
    <div class="h-screen flex items-center ml-14 absolute">
        <div class="space-y-4 w-fit">
            <form method="get" action="/language/en">
                @csrf
                <button type="submit"
                    class="rounded-full w-14 h-14 border-solid border-white border-2
                        font-normal text-2xl text-white flex items-center justify-center
                        hover: cursor-pointer {{ $locale === 'en' ? 'bg-white text-[#171717]' : '' }}">
                    <span>en</span>
                </button>
            </form>
            <form method="get" action="/language/ka">
                <button type="submit"
                    class="rounded-full w-14 h-14 border-solid border-white border-2
                    font-normal text-2xl text-white flex items-center justify-center
                    hover: cursor-pointer {{ $locale === 'ka' ? 'bg-white text-[#171717]' : '' }}">
                    <span>ka</span>
                </button>
            </form>
        </div>
    </div>
@endif

@if ($type === 'admin')
    <div class="h-screen flex items-center ml-14 absolute">
        <div class="space-y-4 w-fit">
            <form method="GET" action="/language/en">
                @csrf
                <button type="submit"
                    class="rounded-full w-14 h-14 border-solid border-blue-500 border-2
                    font-normal text-2xl flex items-center justify-center text-[#171717]
                    hover: cursor-pointer {{ $locale === 'en' ? 'bg-blue-200' : '' }}">
                    <span>en</span>
                </button>
            </form>
            <form method="GET" action="/language/ka">
                <button type="submit"
                    class="rounded-full w-14 h-14 border-solid border-blue-500 border-2
                    font-normal text-2xl flex items-center justify-center text-[#171717]
                    hover: cursor-pointer {{ $locale === 'ka' ? 'bg-blue-200' : '' }}">
                    <span>ka</span>
                </button>
            </form>
        </div>
    </div>
@endif
