<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use NumberFormatter;

class CurrencyHelper
{
    public static function formatCurrency($value)
    {
        $currency = app('currency')->getCurrency();

        $formatter = new NumberFormatter(config('app.locale'), NumberFormatter::CURRENCY);
        $formatter->setTextAttribute(NumberFormatter::CURRENCY_CODE, $currency);

        return $formatter->formatCurrency($value, $currency);
    }
    public static function convertCurrency($amount)
    {
        $currency = Session::get("currency");
        
     
        switch ($currency) {
            case 'EUR':
                $convertedAmount = $amount * 0.85; // Assuming 1 MAD = 0.85 EUR
                break;
            case 'USD':
                $convertedAmount = $amount * 0.10; // Assuming 1 MAD = 0.10 USD
                break;
            default:
                $convertedAmount = $amount;
                break;
        }
        
        return $convertedAmount;
    }
}
