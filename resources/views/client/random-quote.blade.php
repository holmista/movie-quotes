<x-bg>
    <div class="flex flex-row">
        <x-switch-language locale="{{ app()->getLocale() }}" type="client" />
        <x-signin-button />

        <div class="flex flex-col items-center w-screen justify-center h-screen">
            <div>
                <img src="/storage/{{ $quote->thumbnail }}">
            </div>
            <div class="text-white text-[48px] flex flex-col justify-center items-center">
                <p class="mt-[65px]">{!! $quote->body !!}</p>
                <p class="mt-[114px] underline">{!! $quote->movie->title !!}</p>
            </div>
        </div>
    </div>
</x-bg>
