<?php

use Kodeas\Currency\Currency;
use Kodeas\Currency\Exceptions\InvalidCurrencyFormatException;
use Kodeas\Currency\Models\TestModel;

it('it casts from cents', function () {
    $amount = Currency::fromCents(100);

    $model = TestModel::make([
        'amount_with_cast' => $amount,
        'amount_without_cast' => 1,
    ]);

    expect($model->amount_with_cast)
        ->toBeInstanceOf(Currency::class)
        ->toEqual($amount);

    $this->assertEquals($model->amount_without_cast, 1);
    $this->assertEquals(json_encode($model->amount_with_cast), '"1.00"');
    $this->assertEquals($model->amount_with_cast->toCents(), 100);
    $this->assertEquals($model->amount_with_cast->toUsd(), 1);
    $this->assertEquals($model->amount_with_cast->toReadable(), '1.00');
    $this->assertEquals($model->amount_with_cast->toReadable('$'), '$1.00');
});

it('it casts from usd', function () {
    $amount = Currency::fromUsd(1);

    $model = TestModel::make([
        'amount_with_cast' => $amount,
        'amount_without_cast' => 1,
    ]);

    expect($model->amount_with_cast)
        ->toBeInstanceOf(Currency::class)
        ->toEqual($amount);

    $this->assertEquals($model->amount_without_cast, 1);
    $this->assertEquals(json_encode($model->amount_with_cast), '"1.00"');
    $this->assertEquals($model->amount_with_cast->toCents(), 100);
    $this->assertEquals($model->amount_with_cast->toUsd(), 1);
    $this->assertEquals($model->amount_with_cast->toReadable(), '1.00');
    $this->assertEquals($model->amount_with_cast->toReadable('$'), '$1.00');
});

it('throws type exception', function () {
    $model = TestModel::make([
        'amount_with_cast' => 1,
        'amount_without_cast' => 1,
    ]);
})->throws(InvalidCurrencyFormatException::class);
