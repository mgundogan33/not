<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function front_post()
    {
        $post = Post::select('id','title','type','slug','content','category_id')->where('type', '=' , 1)->get();
        return view('blog.front.post',compact('post'));
    }
}
