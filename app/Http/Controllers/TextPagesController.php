<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TextPagesController extends Controller
{
    public function obmen() {
        return view('obmen');
    }

    public function delivery() {
        return view('delivery');
    }

    public function policy() {
        return view('policy');
    }

    public function contacts() {
        return view('contacts');
    }

}
