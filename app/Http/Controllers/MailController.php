<?php

namespace App\Http\Controllers;

use App\Mail\Gmail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function send_email(){
        $data = [
            'title' => 'mail form kitapura',
            'body' => 'email dari kita semua'
        ];

        Mail::to('ibalpalaloi@gmail.com')->send(new Gmail($data));
        return "email send";
        
    }
}
