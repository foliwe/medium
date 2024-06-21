<x-single>


    <div class="">


        <x-title>{{$blog->title}}</x-title>

        <div class="flex items-center space-x-2 py-3">
            <div class="">
                @if ($blog->user->image)

                <img class="w-10 h-10 rounded-full" src="{{asset('storage/' . $blog->user->image)}}"
                    alt="Rounded avatar">
                @else
                <x-thumbnail />
                @endif
            </div>
            <div class=" flex flex-col">
                <div class="flex items-center space-x-3">
                    <a href="{{route('users.show', $blog->user->slug)}}" class="text-sm">{{$blog->user->name}}</a>
                    <a href="#" class="text-emerald-500">Follow</a>
                </div>

                <div class="flex  items-center space-x-4">
                    <span class="text-sm text-gray-500">{{$blog->created_at->diffForHumans()}}</span>
                    <span class="text-sm text-gray-500">7 mins read</span>
                </div>
            </div>


        </div>

        <div class="flex justify-between my-3 py-4 border-y">
            <div class="flex space-x-6 items-center">

                <div class="" data-tooltip-target="tooltip-likes">
                    <x-like :$blog :$isLiked />
                    <span class="text-sm">{{$blog->likes()->count()}}</span>


                    <x-tooltip lable="likes" tips="likes" />

                </div>

                <div class="">

                    <a href="" data-tooltip-target="tooltip-responds">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class=" inline-block size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                        </svg>
                    </a>
                    <span class="text-sm">{{$blog->comments->count()}}</span>

                    <x-tooltip lable="responds" tips="responds" />
                </div>

            </div>

            <div class="flex space-x-8 items-center">

                <a href="#" data-tooltip-target="tooltip-save">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                    </svg>
                </a>

                <x-tooltip lable="save" tips="save" />

                <a href="#" data-tooltip-target="tooltip-share">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15m0-3-3-3m0 0-3 3m3-3V15" />
                    </svg>
                </a>


                <x-tooltip lable="share" tips="share" />

                <a class="hover:cursor-pointer" id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    data-tooltip-target="tooltip-more">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </a>
                <x-tooltip lable="more" tips="more" />

                {{-- Dropdown --}}
                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-200 rounded-md shadow-lg w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        @can('update', $blog)
                        <li>
                            <a href="{{route('blogs.edit', $blog->slug)}}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit
                                Blog</a>
                        </li>
                        @endcan

                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Follow
                                Author</a>
                        </li>
                        @can('update',$blog)
                        <li>
                            <form method="POST" action="{{route('blogs.destroy', $blog->slug)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    class=" inline-flex px-4 py-2 text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete
                                    Blog</button>
                            </form>

                        </li>
                        @endcan
                        {{-- <li>
                            <a href="#"
                                class="block px-4 py-2 text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report
                                Blog</a>
                        </li> --}}

                    </ul>
                </div>
                {{-- endDropdown --}}

            </div>
        </div>

        <div class=" flex justify-center items-center p-5">
            @if ($blog->photo)
            <img src="{{asset('storage/' . $blog->photo)}}" alt="" srcset="">
            @else
            <img src="https://placehold.co/800x600" alt="" srcset="">
            @endif
        </div>
        <div class="p-6">
            <p class="md:text-xl">{!! $blog->content !!}</p>
        </div>



    </div>


    <x-heading>Commets</x-heading>
    <div class="clear">

        <form method="post" action="{{ route('blog.comments.store',$blog) }}">
            @csrf
            <div class="form-group">
                <form class="max-w-sm mx-auto">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        message</label>
                    <textarea id="body" name="body" rows="2"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Leave a comment..."></textarea>
                    @error('body')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </form>
                <div class="form-group">
                    <button class=" bg-emerald-500 text-white px-2 py-3 my-2">Post comment</button>

                </div>
        </form>
    </div>
    <x-comments :$blog />



</x-single>