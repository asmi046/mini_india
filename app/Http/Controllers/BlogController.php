<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    public function show_page($slug) {
        $post = Blog::where('slug', $slug)->first();
        if($post == null) abort('404');

        return view('blog-page', ['post' => $post]);
    }

    public function show() {
        $posts = Blog::orderBy('created_at', 'desc')->paginate(12);
        return view('blog', ['posts' => $posts]);
    }
}
