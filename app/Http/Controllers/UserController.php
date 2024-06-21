<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;







class UserController extends Controller
{


    /**
     * Display the specified resource.
     */
    public function show($slug)
    {

        $user = User::where('slug', $slug)->get()->first();
        return view('users.show',[ 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)

    {
        $user = User::where('slug', $slug)->firstOrFail();
        if(Auth::user()->id === $user->id)
        {
            return view('users.edit',[ 'user' => $user]);

        }else{
            return to_route('blogs.index');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)

    {
        // dd($request);
       $user = User::where('slug', $slug)->firstOrFail();
        $validated= request()->validate([

        'image' => ['nullable', 'file', 'max:2000', 'mimes:png,jpg,webp'],
        ]);

        $path = $blog->image ?? null;
       if ($request->hasFile('image')) {
            if ($user->image) {
            Storage::disk('public')->delete($user->image);
            }
            $path = $request->file('image')->store('profile', 'public');
            $validated['image'] = $path;

        }

    $user->update($validated);





        return to_route('users.show', $user->slug);
    }
}