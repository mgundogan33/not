<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function front_category()
    {
        $category = Category::select('id','title','type','slug')->where('type', '=' , 1)->get();
        return view('blog.front.category',compact('category'));
    }

}
