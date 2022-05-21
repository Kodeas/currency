<?php

namespace Kodeas\Currency\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kodeas\Currency\Currency
 */
class Currency extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'currency';
    }
}
