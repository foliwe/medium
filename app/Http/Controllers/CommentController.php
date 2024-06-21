<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $slug)
    {
    	$input = $request->validate([
            'body'=>'required|min:5',
        ]);

        $input['user_id'] = auth()->user()->id;
        $input['blog_id'] = $slug;

        Comment::create($input);

        return back();
    }
}