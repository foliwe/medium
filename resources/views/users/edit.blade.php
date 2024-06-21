<x-single>
    <x-heading> Edit User</x-heading>

    <div class="">


        <form method="POST" action="{{route('users.update', $user->slug)}}" enctype="multipart/form-data">
            @csrf



            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input"> Upload
                    Profile</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="image" name="image" type="file">

                @error('image')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>





            <div class="mb-6">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
            </div>

        </form>
    </div>
</x-single>