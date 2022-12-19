<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BascetController extends Controller
{
    public function index() {
        return view('bascet');
    }
}
