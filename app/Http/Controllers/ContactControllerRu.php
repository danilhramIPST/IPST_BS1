<?php

namespace App\Http\Controllers;

use App\Mail\TestMailRu;
use App\Http\Requests\StoreArticleRequestRu;
use Illuminate\Support\Facades\Mail;

class ContactControllerRu extends Controller
{

    public function index()
    {
        return view('contactRu');
    }

    public function send(StoreArticleRequestRu $request)
    {


        if ($request->method() == 'POST') {
            $textMail = "<p><b>ФИО:</b>{$request->input('name')}</p><br>";
            $textMail .= "<p><b>Телефон:</b>{$request->input('phone')}</p><br>";
            $textMail .= "<p><b>Email:</b>{$request->input('email')}</p><br>";
            $textMail .= "<p><b>Уровень владения английским:</b>{$request->input('language')}</p><br>";
            $textMail .= "<p><b>Желаемая роль в команде:</b>{$request->input('role')}</p><br>";
            $textMail .= "<p><b>Сообщение:</b>{$request->input('aboutOneSelf')}</p><br>";
        }

        Mail::to('hdiipstomsk@gmail.com')->send(new TestMailRu($textMail, $request->file('file')));

        return response()->json([
            "status" => true,
            "request" => $request->only('name', 'phone', 'email','language' , 'role','aboutOneSelf', 'file')
        ])->setStatusCode(201, 'email sent');

    }

}


