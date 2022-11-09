<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $post = Post::latest()->paginate(10);
        return view('blog.post.index', compact('post'));
    }


    public function create()
    {
        $category = \App\Models\Category::select('id', 'title')->get();
        return view('blog.post.create', compact('category'));
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => 'required',
                'resim' => 'required',
                'content' => 'required',
                'category_id' => 'required'
            ],
            [
                'title.required'   => 'Başlık Alanı Zorunludur.',
                'resim.required'   => 'Resim Alanı Zorunludur.',
                'category_id.required'   => 'Kategori seçiniz.',
                'content.required' => 'Açıklama Alanı Zorunludur.'

            ]
        );
        // rand(0,1000).'-'.
        $resim = date('d-m-Y-h-i-s') . '-' . $request->file('resim')->getClientOriginalName();
        $request->file('resim')->move(public_path('images'), $resim);

        $data = new Post();
        $data->title = $request->title;
        // $data->type = $request->type;
        $data->slug  = Str::slug($request->title);
        $data->content = $request->content;
        $data->category_id    = $request->category_id;
        $data->save();

        //return $resim.'--'.$yol;
        $data->image()->create([
            'url' =>  $resim,
        ]);

        \Yoeunes\Toastr\Facades\Toastr::success('Kayıt Başarılı...', 'Başarılı!');
        return redirect()->route('post.index');
    }


    public function show(Post $post)
    {
        return view('blog.front.post_detay',compact('post'));
    }


    public function edit(Post $post)
    {
        $category = \App\Models\Category::select('id', 'title')->get();
        return view('blog.post.edit', compact('category', 'post'));
    }


    public function update(Request $request, Post $post)
    {
        $data =  $request->except('_token', '_method');
        if (count($data) == 1 && isset($data['type'])) {
            $post->update($data);
            \Yoeunes\Toastr\Facades\Toastr::success('Statu Güncellendi...', 'Başarılı!');
            return redirect()->route('post.index');
        } else {
            $request->validate(
                [
                    'title' => 'required',
                    'resim' => 'nullable',
                    'content' => 'required',
                    'category_id' => 'required'
                ],
                [
                    'title.required'   => 'Başlık Alanı Zorunludur.',
                    'category_id.required'   => 'Kategori seçiniz.',
                    'content.required' => 'Açıklama Alanı Zorunludur.'

                ]
            );
            if ($request->has('resim')) {
                if (file_exists(public_path('images/' . $post->image->url))) {
                    unlink(public_path('images/' . $post->image->url));
                }
                $resim = date('d-m-Y-h-i-s') . '-' . $request->file('resim')->getClientOriginalName();
                $request->file('resim')->move(public_path('images'), $resim);
            }
            $post->update([
                'title'          => $request->title,
                'slug'           => Str::slug($request->title),
                'content'        => $request->content,
                'type'           => isset($request->type)? $request->type : $post->type,
                'category_id'    => $request->category_id
            ]);
            $post->image()->update([
                'url' =>  isset($resim) ? $resim : $post->image()->resim,
            ]);

            \Yoeunes\Toastr\Facades\Toastr::success('Kayıt Başarılı...', 'Başarılı!');
            return redirect()->route('post.index');
        }
    }


    public function destroy(Post $post)
    {
        if (file_exists(public_path('images/' . $post->image->url))) {
            unlink(public_path('images/' . $post->image->url));
        }
        $post->image()->delete();
        $post->delete();
        \Yoeunes\Toastr\Facades\Toastr::success('Kategori Başarıyla Silindi.', 'Başarılı');
        return redirect()->route('category.index');
    }
}
