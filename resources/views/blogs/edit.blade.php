<x-layout>
    <x-heading> Create</x-heading>

    <x-tinyapi />

    <div class="">


        <form method="POST" action="{{route('blogs.update',$blog->slug)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name='title' id="title"
                    class=" @error('title') border-red-500 @enderror block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('title', $blog->title)}}">
                @error('title')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6 text-xl">
                <label for="excerpt"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Excerpt</label>
                <input type="text" name='excerpt' id="excerpt"
                    class=" block w-full text-gray-900 border
                                                @error('excerpt') border-red-500 @enderror
                                                border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{old('excerpt',$blog->excerpt)}}">
                @error('excerpt')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">

                <x-textarea>{{ old('content', $blog->content)}}</x-textarea>
            </div>

            @if ($blog->photo)
            <div class="mb-6 overflow-hidden rounded-lg">
                <label for="" class="text-sm">Current Image:</label>
                <img class="w-20 h-20" src="{{asset('storage/' . $blog->photo)}}" alt="" srcset="">
            </div>
            @endif

            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                    file</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="photo" name="photo" type="file">

                @error('photto')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-6">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
            </div>

        </form>
    </div>
</x-layout>