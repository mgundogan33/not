<?php

namespace App\Http\Controllers;

// use Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index()
    {
        $mail_data = \App\Models\Mail::all();
        return view('blog.front.contact', compact('mail_data'));
    }
    public function sendMail(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'age' => 'required',
            'desc' => 'required'

        ], [
            'name.required' => 'Ad Alanı Zorunludur !',
            'last_name.required' => 'Soyad Alanı Zorunludur !',
            'country.required' => 'Ülke Alanı Zorunludur !',
            'age.required' => 'Yaş Alanı Zorunludur !',
            'desc.required' => 'İçerik Alanı Zorunludur !'
        ]);

        // recaptcha
        $input = $request->all();
        $recaptcha_secret = '6LcrW9YiAAAAAMW5y0-fdViJ50JhnSS-nhhx8pBr';
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret="
            . $recaptcha_secret . "&response=" . $input["g-recaptcha-response"]);
        $response = json_decode($response, true);
        if ($response['success'] === true) {
            echo "Form Başarıyla Gönderildi";
        } else {
            echo "Sen bir Robotsun";
        }
        // recaptcha bıtıs

        // send mail
        $mail_data = new \App\Models\Mail();
        $mail_data->name = $request->name;
        $mail_data->last_name = $request->last_name;
        $mail_data->country = $request->country;
        $mail_data->age = $request->age;
        $mail_data->desc = $request->desc;
        $mail_data->save();

        \Mail::to('gundogan.mehmet33@gmail.com')->send(new sendMail($mail_data));

        \Yoeunes\Toastr\Facades\Toastr::success('Mail Başarıyla Gönderildi...', 'Başarılı!');
        return redirect()->back();
        // send mail end

    }
}
