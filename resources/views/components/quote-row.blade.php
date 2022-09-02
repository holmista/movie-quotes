@props(['id', 'image'])

<div>
    <tr>
        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
            <a href="#" class="hover:cursor-pointer">{{ $slot }}</a>
        </td>
        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
            <a href="/admin/quotes/edit/{{ $id }}" class="text-blue-600 hover:text-blue-900">edit</a>
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
                <img src="{{ $image }}" class="w-full">
            </div>
        </td>
    </tr>
</div>
