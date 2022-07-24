<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function cek()
    {
        $isi=[
            'nama'=>'irfan',
            'email'=>'ini isis email',
        ];

        Mail::to('contohemail@gmail.com')->send(new SendEmail($isi));
        return 'Berhasil yey';
    }
    
}