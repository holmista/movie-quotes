@props(['id'])

<div>
    <tr>
        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
            <a href="#" class="hover:cursor-pointer">{{ $slot }}</a>
        </td>
        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
            <a href="/admin/movies/edit/{{ $id }}" class="text-blue-600 hover:text-blue-900">edit</a>
        </td>
        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
            <form method="POST" action="/admin/movies/{{ $id }}">
                @csrf
                @method('delete')
                <button class="text-red-600 hover:text-red-900">
                    delete
                </button>
            </form>
            {{-- <a href="#" class="text-red-600 hover:text-red-900">delete</a> --}}
        </td>
    </tr>
</div>
