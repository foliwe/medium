<x-layout>
    <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] ">


        <div class="md:px-10">
            @forelse ( $blogs as $blog)
            <div class="pb-6 md:p-4 flex justify-between items-center space-x-2">

                <div class="likes p-3 flex flex-col ">
                    <div class="">
                        @if ( $blog->likes()->count()<1) <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#fca5a5" class="size-6 md:size-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#991b1b" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="#b91c1c" class="size-6 md:size-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                            @endif

                    </div>
                    <span>{{$blog->likes()->count()}}</span>
                </div>

                <div class="content">
                    <div class="flex items-center space-x-2 py-3">
                        @if ($blog->user->image)

                        <img class="w-10 h-10 rounded-full" src="{{asset('storage/' . $blog->user->image)}}"
                            alt="Rounded avatar">
                        @else
                        <x-thumbnail />
                        @endif
                        <a href="{{route('users.show', $blog->user->slug)}}" class="text-sm">{{$blog->user->name}}</a>
                        <span class="text-sm">{{$blog->created_at->diffForHumans()}} </span>
                    </div>
                    <a href="{{route('blogs.show', $blog->slug)}}">
                        <div class="">
                            <x-heading>{{$blog->title}}</x-heading>


                            <p class="md:text-lg">{{ $blog->intro() }}</p>
                        </div>
                    </a>
                    <div class="flex justify-between py-10 border-b">
                        <div class="">
                            <a class="inline-flex bg-gray-300 px-3 dark:bg-gray-600 rounded-lg" href="#"> war</a>
                            <span class="text-sm"> 6 min read</span>
                        </div>
                        <div class="flex space-x-4">

                            <a class="" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                </svg>
                            </a>
                            {{--
                            <x-tooltip lable="save" tips="save" /> --}}

                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                            </a>
                            {{--
                            <x-tooltip lable="more" tips="more" /> --}}
                        </div>
                    </div>
                </div>

                <div class="image justify-self-end float-right">
                    @if ($blog->photo)
                    <img class="w-52 h-30" src="{{asset('storage/' . $blog->photo)}}" alt="" srcset="">
                    @else
                    <img class="w-52 h-30" src="https://placehold.co/300x200" alt="" srcset="">
                    @endif
                    {{-- <img src="http://picsum.photos/seed/{{rand(0,1000)}}/100/100" alt="" srcset=""> --}}
                </div>

            </div>

            @empty
            <div class="pb-6 md:p-4 flex flex-col justify-center items-center space-x-2 bg-white rounded-lg">
                <x-heading> No Blog</x-heading>

                <a class="text-sm py-2 text-emerald-500 underline" href="{{route('blogs.create')}}"> Create Your first
                    blog</a>
            </div>
            @endforelse
        </div>


        <div class=" hidden md:block p-4 px-10 sidebar  bg-white">

            <div class="sidebar_content  p-3">



                <h4 class="">Popular Articles</h4>


                @forelse ( $popular_blogs as $popular)
                <div class="flex flex-col py-3">
                    <div class="flex space-x-2 items-center py-2">
                        <div class="w-8 h-8">
                            @if ($popular->user->image)
                            <img class="rounded-full" src="{{asset('storage/' . $popular->user->image)}}"
                                alt="Rounded avatar">

                            @else
                            <img class=" rounded-full" src="https://i.pravatar.cc/100?img={{rand(1,50)}}"
                                alt="Rounded avatar">
                            @endif
                        </div>
                        <div class="font-bold text-xs">
                            <a href="{{route('blogs.show', $popular->slug)}}">{{$popular->side_title()}}</a>
                        </div>
                    </div>
                    <div class=" text-md font-bold">
                        <a href="{{route('blogs.show', $popular->slug)}}">{{$popular->side_excerpt()}}</a>

                    </div>
                </div>
                @empty
                <div class="pb-6 md:p-4 flex flex-col justify-center items-center space-x-2 bg-white rounded-lg">
                    <x-heading> No Blog</x-heading>

                    <a class="text-sm py-2 text-emerald-500 underline" href="{{route('blogs.create')}}"> Creat Your
                        first blog</a>
                </div>
                @endforelse






                <x-link> see full list</x-link>

                <h4 class="py-8">Recommended topics</h4>

                <div class="flex flex-wrap space-x-3 gap-2 text-sm justify-start">
                    <a href="" class="inline-flex bg-gray-200 py-2 px-3 rounded-xl">
                        Sports
                    </a>
                    <a href="" class="inline-flex bg-gray-200 py-2 px-3 rounded-xl">
                        Media
                    </a>

                    <a href="" class="inline-flex bg-gray-200 py-2 px-3 rounded-xl">
                        History
                    </a>
                    <a href="" class="inline-flex bg-gray-200 py-2 px-3 rounded-xl">
                        Photography
                    </a>

                    <a href="" class="inline-flex bg-gray-200 py-2 px-3 rounded-xl">
                        Self Improvement
                    </a>

                    <a href="" class="inline-flex bg-gray-200 py-2 px-3 rounded-xl">
                        Math
                    </a>

                    <a href="" class="inline-flex bg-gray-200 py-2 px-3 rounded-xl">
                        Docker
                    </a>



                </div>

                <x-link> see more topics</x-link>

                <h4 class="py-6">Who to follow</h4>

                <div class="flex justify-between gap-3 mb-4">
                    <div class=" w-14 h-14 self-start">
                        <x-thumbnail width='9' height='9' />
                    </div>
                    <div class=" space-y-1">
                        <p class="text-md font-bold">Sufyan Maan, M.Eng</p>

                        <p class="text-xs">Exploring my curiosity and sharing what I learn along the way. |
                        </p>
                    </div>
                    <div class="self-center">
                        <a href="" class="font-light border border-gray-700 rounded-xl py-2 px-3">Follow</a>
                    </div>
                </div>

                <div class="flex justify-between gap-3 mb-4">
                    <div class=" w-14 h-14 self-start">
                        <x-thumbnail width='9' height='9' />
                    </div>
                    <div class=" space-y-1">
                        <p class="text-md font-bold">Danny Wolf</p>

                        <p class="text-xs">Exploring my curiosity and sharing what I learn along the way. |
                        </p>
                    </div>
                    <div class="self-center">
                        <a href="" class="font-light border border-gray-700 rounded-xl py-2 px-3">Follow</a>
                    </div>
                </div>

                <div class="flex justify-between gap-3 mb-4">
                    <div class=" w-14 h-14 self-start">
                        <x-thumbnail width='9' height='9' />
                    </div>
                    <div class=" space-y-1">
                        <p class="text-md font-bold">Dr. Ashish Bamania</p>

                        <p class="text-xs">Exploring my curiosity and sharing what I learn along the way. |
                        </p>
                    </div>
                    <div class="self-center">
                        <a href="" class="font-light border border-gray-700 rounded-xl py-2 px-3">Follow</a>
                    </div>
                </div>

                <x-link> see more suggestions</x-link>

                <h4 class="py-6">Recently Saved</h4>

                <div class="flex flex-col">
                    <div class="flex space-x-2 items-center py-2">
                        <div class="">
                            <x-thumbnail width='6' height='6' />
                        </div>
                        <div class="font-bold text-xs">Lorem ipsum dolor sit amet consectetur adipisicing
                        </div>
                    </div>
                    <div class=" text-md font-bold">
                        What 10 Years at Uber, Meta and Startups Taught Me About Data Analytics
                    </div>
                </div>





                <x-link> see all(5)</x-link>
            </div>

        </div>



    </div>

</x-layout>

<script>
    window.onscroll = () => {
            const viewportHeight = window.innerHeight;
            let sidebar = document.querySelector(".sidebar");
            let scrollTop = window.scrollY;
            let sideContent = document.querySelector(".sidebar_content");
            let contentHeight = sideContent.getBoundingClientRect().height;
            let contentBottom = sideContent.getBoundingClientRect().bottom;
            let contentPosition = sideContent.getBoundingClientRect().top + contentHeight; // Bottom position of content
            let sidebarTop = sidebar.getBoundingClientRect().top;

            console.log('content bottom is ' + contentBottom);
            console.log('Viewpoert height is  ' + viewportHeight);
            console.log('Content height is ' + contentHeight);
            console.log('scroll Y is ' + scrollTop );
            console.log('Position is  ' + contentPosition );

            // Check if the bottom of the content aligns with the bottom of the viewport

        };
</script>