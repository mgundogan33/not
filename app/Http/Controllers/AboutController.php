<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data = About::all();
        return view('blog.about.index', compact('data'));
    }
    public function create()
    {
        return view('blog.about.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'desc' => 'required',
                'resim' => 'required',
            ],
            [
                'title.required'   => 'Başlık Alanı Zorunludur.',
                'resim.required'   => 'Resim Alanı Zorunludur.',
                'desc.required' => 'Açıklama Alanı Zorunludur.'
            ]
        );
        // rand(0,1000).'-'.
        $resim = date('d-m-Y-h-i-s') . '-' . $request->file('resim')->getClientOriginalName();
        $request->file('resim')->move(public_path('images'), $resim);

        $data = new About();
        $data->title = $request->title;
        $data->desc = $request->desc;
        $data->save();

        //return $resim.'--'.$yol;
        $data->image()->create([
            'url' =>  $resim,
        ]);

        \Yoeunes\Toastr\Facades\Toastr::success('İşlem Başarılı...', 'Başarılı!');
        return redirect()->route('about.index');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $about = About::find($id);
        return view('blog.about.edit', compact('about'));
    }
    public function update(Request $request, About $about)
    {
        $data =  $request->except('_token', '_method');
        if (count($data) == 1 && isset($data['type'])) {
            $about->update($data);
            \Yoeunes\Toastr\Facades\Toastr::success('Statu Güncellendi...', 'Başarılı!');
            return redirect()->route('about.index');
        } else {
            $request->validate(
                [
                    'title' => 'required',
                    'resim' => 'nullable',
                ],
                [
                    'title.required'   => 'Başlık Alanı Zorunludur.',
                ]
            );
            if ($request->has('resim')) {
                if (file_exists(public_path('images/' . $about->image->url))) {
                    unlink(public_path('images/' . $about->image->url));
                }
                $resim = date('d-m-Y-h-i-s') . '-' . $request->file('resim')->getClientOriginalName();
                $request->file('resim')->move(public_path('images'), $resim);
            }
            $about->update([
                'title'         => $request->title,
                'type'           => isset($request->type)? $request->type : $about->type,
                'desc'          => $request->desc
            ]);
            $about->image()->update([
                'url' =>  isset($resim) ? $resim : $about->image()->resim,
            ]);

            \Yoeunes\Toastr\Facades\Toastr::success('Kayıt Başarılı...', 'Başarılı!');
            return redirect()->route('about.index');
        }
    }
    public function destroy(About $about)
    {
        if (file_exists(public_path('images/' . $about->image->url))) {
            unlink(public_path('images/' . $about->image->url));
        }

        // $about->image()->delete;
        $about->delete();
        \Yoeunes\Toastr\Facades\Toastr::success('Hakkımda Yazısı Başarıyla Silindi.', 'Başarılı');
        return redirect()->route('about.index');
    }
}
