<?php

namespace Kodeas\Currency\Models;

use Illuminate\Database\Eloquent\Model;
use Kodeas\Currency\Casts\Currency;

class TestModel extends Model
{
    protected $guarded = [];

    protected $casts = [
        'amount_with_cast' => Currency::class,
    ];
}
