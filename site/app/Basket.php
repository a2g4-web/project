<?php

namespace App;

class Basket
{
    public static function getBasket()
    {
        return \Illuminate\Support\Facades\Cookie::get('basket');
    }

    public static function setToBasket($elem)
    {

    }
}
