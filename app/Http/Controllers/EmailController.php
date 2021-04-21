<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use PHPUnit\Util\Test;

class EmailController extends Controller
{
    //
    public function index(){
        return view('dentall');
    }
    public function send(Request $request){

        $data = [
              'name' => $request->name,
              'surname' => $request->surname,
              'email' => $request->email,
              'image' => $request->file('image')
        ];

        $to = "arailym.lollipop12@gmail.com";

        \Mail::to($to)->send(new TestMail($data));

         return view('mails');

    }
}
