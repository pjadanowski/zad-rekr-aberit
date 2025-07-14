<?php

namespace App\Services;

use Akaunting\Money\Money;

class PriceService
{
    /**
     * Calculate the total price of a cart item.
     *
     * @param int $unitPrice
     * @param int $quantity
     * @return int
     */
    public function calculateTotalPrice(int $unitPrice, int $quantity): int
    {
        return $unitPrice * $quantity;
    }

    public function formatPrice(int $price): string
    {
        return Money::PLN($price)->format();
    }
}
