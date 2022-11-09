<?php

namespace App\Http\Controllers\Front;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function front_about()
    {
        $about = About::select('id', 'title', 'type', 'desc')->where('type', '=', 1)->get();
        return view('blog.front.about', compact('about'));
    }
}
