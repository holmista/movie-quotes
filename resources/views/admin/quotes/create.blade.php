<x-generic-admin-layout>
    <div class="mt-40 flex justify-center items-center">
        <div class="w-full max-w-xs ">
            <h1 class="text-center text-lg text-gray-700 font-bold">{{ __('texts.create_a_quote!') }}</h1>
            <form method="POST" action="/admin/quotes" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="en">
                        {{ __('texts.quote_in_english') }}
                    </label>
                    <input required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="en" name="en" type="text">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="ka">
                        {{ __('texts.quote_in_georgian') }}
                    </label>
                    <input required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="ka" name="ka" type="text">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="thumbnail">
                        {{ __('texts.quote_image') }}
                    </label>
                    <input required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="thumbnail" name="thumbnail" type="file">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="movie">
                        {{ __('texts.quote_movie') }}
                    </label>
                    <select name="movie" id="movie" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline hover:cursor-pointer">
                        @foreach ($movies as $movie)
                            <option value="{{ $movie->id }}">{{ $movie->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-center">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-max"
                        type="submit">
                        {{ __('texts.create') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-generic-admin-layout>
