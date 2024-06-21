<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('admin.index' ,['blogs' => $blogs]);
    }
}