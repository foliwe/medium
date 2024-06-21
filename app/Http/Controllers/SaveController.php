<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveController extends Controller
{
    public function save($slug)
        {
            $user = Auth::user();
            $blog = Blog::where('slug', $slug)->firstOrFail();
            if (!$user->savedBlogs()->where('blog_id', $blog->id)->exists()) {
            $user->savedBlogs()->attach($blog->id);
            }
            return to_route('blogs.show', $blog->slug);

        }

    public function remove($slug)
        {

            $user = Auth::user();
            $blog = Blog::where('slug', $slug)->firstOrFail();

            // Detach the blog from the user's likes if already liked
            if ($user->savedBlogs()->where('blog_id', $blog->id)->exists()) {
            $user->savedBlogs()->detach($blog->id);
            }

            return to_route('blogs.show', $blog->slug);
        }


    public function articles(Request $request)

    {
            $user = Auth::user();
                $blogs = $user->savedBlogs;

                return view('users.articles', [ 'blogs' => $blogs]);


    }
}