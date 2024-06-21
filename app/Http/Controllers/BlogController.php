<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mail::to('clauviskumba@outlook.com')->send(new WelcomeMail());
        $blogs = Blog::with(['comments','likes'])->latest()->get();
        $popular_blogs = Blog::popular();
       return view('blogs.index', ['blogs' => $blogs, 'popular_blogs' => $popular_blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $title = "Creating Blog Post";
       return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:10|max:255',
            'excerpt' => 'required|min:100',
            'content' => 'required|min:100',
            'photo' => ['nullable', 'file', 'max:2000', 'mimes:png,jpg,webp'],
        ]);
        $path = null;
        if ($request->hasFile('photo')) {
           $path = Storage::disk('public')->put('blog_images', $request->photo);
        }

        // $validated['photo']= $request->file('photo')->store('photos');
        Auth::user()->blogs()->create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'photo' => $path
        ]);

    return to_route('blogs.index');

    }

    /**
     * Show the specified resource.
     */
    public function show($slug)
    {   $user = Auth::user();
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $isLiked = Auth::check() ? Auth::user()->likedBlogs()->where('blog_id', $blog->id)->exists() : false;
        return view('blogs.show', [ 'blog' => $blog, 'isLiked' => $isLiked]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $slug)
    {
        $blog = Blog::where('slug', $slug)->get()->first();
        Gate::authorize('update', $blog);
        return view('blogs.edit',[ 'blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {

       $blog = Blog::where('slug', $slug)->get()->first();
        Gate::authorize('update', $blog);
        $request->validate([
            'title' => 'required|min:10|max:255',
            'excerpt' => 'required|min:100',
            'content' => 'required|min:100',
            'photo' => ['nullable', 'file', 'max:2000', 'mimes:png,jpg,webp'],
        ]);

        $path = $blog->photo ?? null;
        if ($request->hasFile('photo')) {
            if ($blog->photo) {
                Storage::disk('public')->delete($blog->photo);
            }
            $path = Storage::disk('public')->put('blog_images', $request->photo);
        }


        $blog->update([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'photo' => $path
        ]);

        return to_route('blogs.show', $blog->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $blog = Blog::where('slug', $slug)->get()->first();
        Gate::authorize('delete', $blog);

        if ($blog->photo) {
        Storage::disk('public')->delete($blog->photo);
        }

        $blog->delete();
        return to_route('blogs.index');
    }
}