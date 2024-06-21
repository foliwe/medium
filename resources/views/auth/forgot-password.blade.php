<x-single>
    <x-heading> Reset Password</x-heading>

    <div class="">


        <form method="POST" action="{{route('password.email')}}">
            @csrf
            <div class="mb-6">
                @error('email')
                <div class=" flex text-red-500 text-sm items-center justify-center py-2">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <div class="">{{ $message }}</div>


                </div>
                @enderror
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    Email</label>
                <input type="text" name='email' id="email"
                    class=" @error('email') border-red-500 @enderror block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            </div>


            <div class="mb-6">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reset
                    Password</button>
            </div>

        </form>
    </div>
</x-single>