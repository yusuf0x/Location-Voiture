<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function changeCurrency($currency)
    {
        session(['currency' => $currency]);

        return back();
    }
}
