<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\SubscribeMail;

class SenderController extends Controller
{
    public function send_subscribe(Request $request) {
        $data = $request->validate([
            "emailsub" => ['required','email:rfc,dns']
        ]);

        Mail::to(["asmi046@gmail.com","Miniindia@mail.ru"])->send(new SubscribeMail($data));

        return view('thencs');
    }

}
