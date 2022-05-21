<?php


namespace Kodeas\Currency\Casts;


use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Kodeas\Currency\Currency as CurrencyType;
use Kodeas\Currency\Exceptions\InvalidCurrencyFormatException;


class Currency implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return CurrencyType
     */
    public function get($model, string $key, mixed $value, array $attributes): CurrencyType
    {
        return CurrencyType::fromCents($value);
    }

    /**
     * @param  Model  $model
     * @param  string  $key
     * @param  CurrencyType|string|float|int|null  $value
     * @param  array  $attributes
     * @return int
     * @throws InvalidCurrencyFormatException
     */
    public function set($model, string $key, mixed $value, array $attributes): int
    {
        if (!($value instanceof CurrencyType)) {
            $currency = CurrencyType::class;
            $type = getType($value);
            throw new InvalidCurrencyFormatException("The given value must be $currency. $type was given.");
        }

        return $value->toCents();
    }
}
