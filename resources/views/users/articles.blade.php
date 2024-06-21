<x-layout>

    <div class="md:px-10">
        @forelse ( $blogs as $blog)
        <div class="pb-6 md:p-4 flex justify-between items-center space-x-2">

            <div class="likes p-3 flex flex-col w-0.5/6 ">
                <div class="">
                    @if ( $blog->likes()->count()<1) <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#fca5a5" class="size-6 md:size-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#991b1b" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#b91c1c" class="size-6 md:size-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                        @endif

                </div>
                <span>{{$blog->likes()->count()}}</span>
            </div>

            <div class="content w-4/6">
                <div class="flex items-center space-x-2 py-3">
                    @if ($blog->user->image)

                    <img class="w-10 h-10 rounded-full" src="{{asset('storage/' . $blog->user->image)}}"
                        alt="Rounded avatar">
                    @else
                    <x-thumbnail />
                    @endif
                    <a href="{{route('users.show', $blog->user->slug)}}" class="text-sm">{{$blog->user->name}}</a>
                    <span class="text-sm">{{$blog->created_at->diffForHumans()}} </span> <span class="text-sm"> 6
                        min read</span>
                </div>
                <a href="{{route('blogs.show', $blog->slug)}}">
                    <div class="">
                        <x-heading>{{$blog->short_title()}}</x-heading>


                        <p class="md:text-lg">{{ $blog->intro() }}</p>
                    </div>
                </a>

                <div class="flex justify-between py-5 border-b">

                    <div class="flex space-x-4">

                        <a class="" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                            </svg>
                        </a>
                        {{--
                        <x-tooltip lable="save" tips="save" /> --}}

                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </a>
                        {{--
                        <x-tooltip lable="more" tips="more" /> --}}
                    </div>
                </div>
            </div>

            <div class="image justify-self-end  w-1/6">
                @if ($blog->photo)
                <img class="w-full" src="{{asset('storage/' . $blog->photo)}}" alt="" srcset="">
                @else
                <img class="w-52 h-30" src="https://placehold.co/300x200" alt="" srcset="">
                @endif
                {{-- <img src="http://picsum.photos/seed/{{rand(0,1000)}}/100/100" alt="" srcset=""> --}}
            </div>

        </div>

        @empty
        <div class="pb-6 md:p-4 flex flex-col justify-center items-center space-x-2 bg-white rounded-lg">
            <x-heading> No Saved Blog</x-heading>

            <a class="text-sm py-2 text-emerald-500 underline" href="{{route('blogs.index', 'hello')}}"> Home</a>
        </div>
        @endforelse
    </div>

</x-layout>