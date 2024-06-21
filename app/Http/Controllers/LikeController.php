<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($slug)
        {
            $user = Auth::user();
            $blog = Blog::where('slug', $slug)->firstOrFail();
            if (!$user->likedBlogs()->where('blog_id', $blog->id)->exists()) {
            $user->likedBlogs()->attach($blog->id);
            }
            return to_route('blogs.show', $blog->slug);

        }

    public function unlike($slug)
        {

            $user = Auth::user();
            $blog = Blog::where('slug', $slug)->firstOrFail();

            // Detach the blog from the user's likes if already liked
            if ($user->likedBlogs()->where('blog_id', $blog->id)->exists()) {
            $user->likedBlogs()->detach($blog->id);
            }

            return to_route('blogs.show', $blog->slug);
        }
}