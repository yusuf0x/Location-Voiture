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
        
        // Perform the currency conversion based on the selected currency
        // You can use the "laravel-currency" package or any other method here
        // and return the converted amount.
        
        // Example conversion using a fixed rate
        switch ($currency) {
            case 'EUR':
                $convertedAmount = $amount * 0.85; // Assuming 1 USD = 0.85 EUR
                break;
            case 'MAD':
                $convertedAmount = $amount * 10.2; // Assuming 1 USD = 10.2 MAD
                break;
            default:
                $convertedAmount = $amount;
                break;
        }
        
        return $convertedAmount;
    }
}