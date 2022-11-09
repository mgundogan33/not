<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index()
    {
        $data = Mail::select('id', 'name', 'last_name', 'country', 'age', 'desc')->get();
        return view('blog.contact.index', compact('data'));
    }
    public function create()
    {
        // 
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        $mail = Mail::find($id);
        $mail->delete();
        \Yoeunes\Toastr\Facades\Toastr::success('Mail Başarıyla Silindi.', 'Başarılı');
        return redirect()->route('contact.index');
    }
}
