@props([
'blog'
])

<div class="display-comment">
    @foreach ($blog->comments as $comment)
    <div class="p-2 bg-gray-100 my-2">
        <p class="text-xs bg-gray-300 inline-block p-1 rounded-lg">{{$comment->user->name}}</p> <span
            class="text-xs px-3"> Posted
            {{$comment->created_at->diffForHumans()}}</span>
        <p class="text-sm   p-2">{{$comment->body}}</p>
    </div>
    @endforeach
    <a href="" id="reply"></a>

</div>