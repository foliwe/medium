<x-single>
    <x-heading> Register</x-heading>

    <div class="">


        <form method="POST" action="{{route('register.store')}}">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name='name' id="name"
                    class=" @error('title') border-red-500 @enderror block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{old('name')}}">
                @error('name')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name='email' id="email"
                    class=" @error('email') border-red-500 @enderror block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{old('email')}}">
                @error('email')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name='password' id="password"
                    class=" @error('password') border-red-500 @enderror block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('password')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Confirmation</label>
                <input type="password" name='password_confirmation' id="password_confirmation"
                    class=" @error('password_confirmation') border-red-500 @enderror block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('password_confirmation')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>





            <div class="mb-6">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Register</button>
            </div>

        </form>
    </div>
</x-single>