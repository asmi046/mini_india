<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    public function show_page($slug) {
        $post = Blog::where('slug', $slug)->first();
        if($post == null) abort('404');

        return view('blog_page', ['post' => $post]);
    }

    public function show() {
        $posts = Blog::paginate(12);
        return view('blog', ['posts' => $posts]);
    }
}
