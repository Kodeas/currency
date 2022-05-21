<?php

namespace Kodeas\Currency;

use JsonSerializable;

class Currency implements JsonSerializable
{
    protected int $amountInCents;

    /**
     * Currency constructor.
     */
    public function __construct(int $amountInCents)
    {
        $this->amountInCents = $amountInCents;
    }

    public static function fromCents(int|null $amountInCents): Currency
    {
        return new self($amountInCents ?? 0);
    }

    public static function fromUsd(float|int|null $amount): Currency
    {
        return new self($amount * 100);
    }

    public function toUsd(): float|int
    {
        return $this->amountInCents / 100;
    }

    public function toCents(): int
    {
        return $this->amountInCents;
    }

    public function toReadable(?string $symbol = null): string
    {
        return $symbol . number_format($this->amountInCents / 100, 2);
    }

    public function jsonSerialize(): string
    {
        return $this->toReadable();
    }

    public function __toString(): string
    {
        return $this->toReadable();
    }
}
