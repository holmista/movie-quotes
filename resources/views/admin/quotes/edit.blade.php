<x-generic-layout>
    <div class="mt-40 flex justify-center items-center">
        <div class="w-full max-w-xs ">
            <h1 class="text-center text-lg text-gray-700 font-bold">edit a quote!</h1>
            <form method="POST" action="/admin/quotes/{{ $quote->id }}" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                @method('patch')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="en">
                        quote in english
                    </label>
                    <input required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="en" name="en" type="text" value="{{ $quote->getTranslation('body', 'en') }}">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="ka">
                        quote in georgian
                    </label>
                    <input required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="ka" name="ka" type="text" value="{{ $quote->getTranslation('body', 'ka') }}">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="thumbnail">
                        quote image
                    </label>
                    <input required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="thumbnail" name="thumbnail" type="file" value="{{ $quote->thumbnail }}">
                    <div class="w-[256px] h-[150px] overflow-hidden flex justify-center items-center">
                        <img src="/storage/{{ $quote->thumbnail }}" class="w-full">
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="movie_id">
                        quote movie
                    </label>
                    <select name="movie_id" id="movie_id" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline hover:cursor-pointer">
                        @foreach ($movies as $movie)
                            <option value="{{ $movie->id }}" {{ $movie->id === $quote->movie_id ? 'selected' : '' }}>
                                {{ $movie->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-center">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-max"
                        type="submit">
                        edit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-generic-layout>
