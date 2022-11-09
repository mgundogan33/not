<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $data = Category::select('id', 'title', 'slug', 'type')->latest()->paginate();

        return view('blog.kategori.index', compact('data'));
    }

    public function create()
    {
        return view('blog.kategori.create');
    }

    public function store(Request $request)
    {

        $request->validate(
            ['title' => 'required', 'resim' => 'required',],
            ['title.required' => 'Başlık Alanı Zorunludur.', 'resim.required' => 'Resim Alanı Zorunludur.']
        );
        // rand(0,1000).'-'.
        $resim = date('d-m-Y-h-i-s') . '-' . $request->file('resim')->getClientOriginalName();
        $request->file('resim')->move(public_path('images'), $resim);

        $data = new Category();
        $data->title = $request->title;
        // $data->type = $request->type;
        $data->slug  = Str::slug($request->title);
        $data->save();

        //return $resim.'--'.$yol;
        $data->image()->create([
            'url' =>  $resim,
        ]);

        \Yoeunes\Toastr\Facades\Toastr::success('Kayıt Başarılı...', 'Başarılı!');
        return redirect()->route('category.index');
    }

    public function show(Category $category)
    {
        return view('blog.front.detay',compact('category'));
    }

    public function edit(Category $category)
    {
        return view('blog.kategori.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
       $data =  $request->except('_token', '_method');
        if (count($data) == 1 && isset($data['type'])) {
            $category->update($data);
            \Yoeunes\Toastr\Facades\Toastr::success('Statu Güncellendi...', 'Başarılı!');
            return redirect()->route('category.index');
        } else {
            $request->validate(
                ['title' => 'required', 'resim' => 'nullable',],
                ['title.required' => 'Başlık Alanı Zorunludur.']
            );

            if ($request->has('resim')) {
                if (file_exists(public_path('images/' . $category->image->url))) {
                    unlink(public_path('images/' . $category->image->url));
                }
                $resim = date('d-m-Y-h-i-s') . '-' . $request->file('resim')->getClientOriginalName();
                $request->file('resim')->move(public_path('images'), $resim);
                $category->image()->update([
                    'url' =>  isset($resim) ? $resim : $category->image->resim,
                ]);
            }
            $category->update([
                'title' => $request->title,
                'type' => isset($request->type)? $request->type : $category->type,
                'slug' => Str::slug($request->title),
            ]);
            \Yoeunes\Toastr\Facades\Toastr::success('Kategori Güncelleme Başarılı...', 'Başarılı!');
            return redirect()->route('category.index');
        }
    }


    public function destroy(Category $category)
    {

        if (file_exists(public_path('images/' . $category->image->url))) {
            unlink(public_path('images/' . $category->image->url));
        }

        $category->image()->delete();
        $category->delete();
        \Yoeunes\Toastr\Facades\Toastr::success('Kategori Başarıyla Silindi.', 'Başarılı');
        return redirect()->route('category.index');
    }
}
