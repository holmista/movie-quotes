<x-generic-layout>
    <div class="mt-40 flex justify-center items-center">
        <div class="w-full max-w-xs ">
            <h1 class="text-center text-lg text-gray-700 font-bold">create a movie!</h1>
            <form method="POST" action="/admin/movies" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title_en">
                        name in english
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title_en" name="title_en" type="text">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title_ka">
                        name in georgian
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title_ka" name="title_ka" type="text">
                </div>
                <div class="flex justify-center">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-max"
                        type="submit">
                        create
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-generic-layout>
