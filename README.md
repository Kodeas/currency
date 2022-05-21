
![currency](https://user-images.githubusercontent.com/56773461/169656521-7f61df41-aaf6-4252-a18b-427fce6688a3.png)

# A simple currency cast for Laravel
[![Latest Version on Packagist](https://img.shields.io/packagist/v/kodeas/currency.svg?style=flat-square)](https://packagist.org/packages/kodeas/currency)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/kodeas/currency/run-tests?label=tests)](https://github.com/kodeas/currency/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/kodeas/currency/Check%20&%20fix%20styling?label=code%20style)](https://github.com/kodeas/currency/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kodeas/currency.svg?style=flat-square)](https://packagist.org/packages/kodeas/currency)

This package is created to eliminate the ambiguity involved in storing and retrieving currencies.
Currently, for simplicity the terminology surrounding the package is in US currency, however there is nothing 
stopping anyone from using this for any other 2 decimal currencies. 

## Installation

You can install the package via composer:

```bash
composer require kodeas/currency
```

## Usage
```php
MyModel extends Model
{
    protected $casts = [
        'amount' => Kodeas\Currency\Casts\Currency::class
    ];
}
```



```php
$currency = Kodeas\Currency\Currency::fromUsd(1);

$model = MyModel::create([
    'amount' => $currency //100(cents) in database
]);

$model->amount //Currency::class
```


## Initialize
```php
$currency = Kodeas\Currency\Currency::fromUsd(1);
$currency = Kodeas\Currency\Currency::fromCents(100);
```

## Methods

```php
echo $currency; // "1.00"
$currency->toUsd(); // "1"
$currency->toCents(); // "100"
$currency->toReadable(); // "1.00"
$currency->toReadable('$'); // "$1.00"
return response()->json(['currency' => $currency->toUsd()]); // {"currency": "1.00"}
```

## Credits

- [Salih Borucu](https://github.com/Kodeas)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
