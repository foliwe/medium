<x-layout>
    <div class="">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Title

                        <th scope="col" class="px-6 py-3">
                            Auther
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{route('blogs.show',$blog->slug)}}">
                                {{$blog->short_title()}}
                            </a>
                        </th>
                        <td class="px-6 py-4">
                            {{$blog->user->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$blog->created_at}}
                        </td>
                        <td class="px-6 py-4 text-right space-x-1">
                            <a href="{{route('blogs.edit',$blog->slug)}}"
                                class="font-medium text-emerald-500 dark:text-blue-500 hover:underline">Edit</a>

                            <form method="POST" action="{{route('blogs.destroy', $blog->slug)}}" class="inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    class="  px-4 py-2 text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete
                                    Blog</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</x-layout>