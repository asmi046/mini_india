<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function to_pay_form() {

    }

    public function pay_confirm(Request $request) {
        return view("payconfirm");
    }


}
