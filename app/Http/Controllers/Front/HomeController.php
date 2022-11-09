<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\About;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::select('id', 'title')->get();
        $post = Post::select('id', 'title','content')->get();
        return view('blog.front.home', compact('category', 'post'));
    }
}
