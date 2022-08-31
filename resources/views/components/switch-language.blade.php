@props(['locale'])

<div class="h-screen flex items-center ml-14">
    <div class="space-y-4 w-fit">
        <div
            class="rounded-full w-14 h-14 border-solid border-white border-2
                font-normal text-2xl text-white flex items-center justify-center
                hover: cursor-pointer {{ $locale === 'en' ? 'bg-white text-[#171717]' : '' }}">
            <span>en</span>
        </div>
        <div
            class="rounded-full w-14 h-14 border-solid border-white border-2
                font-normal text-2xl text-white flex items-center justify-center
                hover: cursor-pointer {{ $locale === 'ka' ? 'bg-white text-[#171717]' : '' }}">
            <span>ka</span>
        </div>
    </div>
</div>
