<x-layout>



    <div x-data="{ openSettings: false }" class="absolute right-12 mt-4 rounded">
        <button @click="openSettings = !openSettings"
            class="border border-gray-400 p-2 rounded text-gray-300 hover:text-gray-300 bg-gray-100 bg-opacity-10 hover:bg-opacity-20"
            title="Settings">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                </path>
            </svg>
        </button>
        <div x-show="openSettings" @click.away="openSettings = false"
            class="bg-white absolute right-0 w-40 py-2 mt-1 border border-gray-200 shadow-2xl">
            <div class="py-2 border-b">
                <p class="text-gray-400 text-xs px-6 uppercase mb-1">Settings</p>
                @if (Auth::user())

                <a href="{{route('users.edit',  $user->slug)}}"
                    class="w-full flex items-center px-6 py-1.5 space-x-2 hover:bg-gray-200">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75a4.5 4.5 0 0 1-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 1 1-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 0 1 6.336-4.486l-3.276 3.276a3.004 3.004 0 0 0 2.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008Z" />
                    </svg>



                    <span class="text-sm text-gray-700">Edit Profile</span>
                </a>
                @endif
                <button class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                        </path>
                    </svg>
                    <span class="text-sm text-gray-700">Block User</span>
                </button>
                <button class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm text-gray-700">More Info</span>
                </button>
            </div>
            <div class="py-2">
                <p class="text-gray-400 text-xs px-6 uppercase mb-1">Feedback</p>
                <button class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                    <span class="text-sm text-gray-700">Report</span>
                </button>
            </div>
        </div>
    </div>
    <div class=" h-[250px]">
        <img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg"
            class="h-full rounded-tl-lg rounded-tr-lg">
    </div>
    <div class="flex flex-col items-center -mt-20">
        @if ($user->image)
        <img src="{{asset('storage/' . $user->image)}}" class=" w-40 border-4 border-white rounded-full">
        @else

        <img src="https://i.pravatar.cc/100?img={{rand(1,50)}}" class="w-40 border-4 border-white rounded-full">


        @endif
        <div class="flex items-center space-x-2 mt-2">
            <p class="text-2xl">{{$user->name}}</p>
            <span class="bg-emerald-500 rounded-full p-1" title="Verified">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7">
                    </path>
                </svg>
            </span>
        </div>
        <p class="text-gray-700">Senior Software Engineer at Tailwind CSS </p>
        <p class="text-sm text-gray-500">New York, USA</p>
    </div>
    <div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
        <div class="flex items-center space-x-4 mt-2">
            <button
                class="flex items-center bg-emerald-600 hover:bg-emerald-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                    </path>
                </svg>
                <span>Follow</span>
            </button>
            <button
                class="flex items-center bg-emerald-600 hover:bg-emerald-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                        clip-rule="evenodd"></path>
                </svg>
                <span>Message</span>
            </button>
        </div>
    </div>





</x-layout>