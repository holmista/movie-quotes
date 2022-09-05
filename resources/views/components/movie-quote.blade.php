@props(['quote', 'image'])

<div>
    <div class="w-[750px] h-[350px] overflow-hidden flex justify-center items-center">
        <img src="{{ $image }}" class="w-full">
    </div>
    <p class="text-[#3D3B3B] text-[36px] bg-white px-4 py-8 w-[750px] text-center">{!! $quote !!}</p>
</div>
