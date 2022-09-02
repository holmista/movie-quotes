@props(['id', 'image'])

<div class="">
    <tr>
        <td class="w py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 max-w-[300px] inline-block break-all">
            <p class="">
                {{ $slot }}
            </p>
        </td>
        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
            <form method="GET" action="/admin/quotes/edit/{{ $id }}">
                @csrf
                <button class="text-blue-600 hover:text-blue-900">
                    edit
                </button>
            </form>
        </td>
        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
            <form method="POST" action="/admin/quotes/{{ $id }}">
                @csrf
                @method('delete')
                <button class="text-red-600 hover:text-red-900">
                    delete
                </button>
            </form>
        </td>
    </tr>
    <tr>
        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
            <div class="w-[320px] h-[150px] overflow-hidden flex justify-center items-center">
                <img src="/storage/{{ $image }}" class="w-full">
            </div>
        </td>
    </tr>
</div>
