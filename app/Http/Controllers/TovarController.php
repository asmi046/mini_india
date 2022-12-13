<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TovarController extends Controller
{
    public function index() {
        return view('tovar');
    }
}
