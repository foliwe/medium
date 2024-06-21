@props([
'width' => 10,
'height' => 10


])

<img class="w-{{$width}} h-{{$height}} rounded-full" src="https://i.pravatar.cc/100?img={{rand(1,50)}}"
    alt="Rounded avatar">