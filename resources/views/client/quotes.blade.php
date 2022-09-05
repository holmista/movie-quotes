<x-bg>
    <x-switch-language locale='en' />
    <x-signin-button />

    <div class="flex items-center flex-col h-screen w-full">
        <h1 class="text-[48px] text-white mt-[79px] w-[750px]">{!! $movieQuotes->title !!}</h1>
        <div class="space-y-16 mt-20">
            @foreach ($movieQuotes->quotes as $quote)
                <x-movie-quote quote="{!! $quote->body !!}" image="/storage/{{ $quote->thumbnail }}" />
            @endforeach
        </div>
    </div>
</x-bg>
