<?php
declare(strict_types=1);

namespace BookVerse\Domain\Pricing;

use BookVerse\Domain\Cart;
use BookVerse\Domain\Money;

final class PercentageDiscount implements PricingStrategy
{
    public function __construct(private float $discount) // e.g., 0.10 = 10%
    {
        if ($discount < 0 || $discount > 1) {
            throw new \InvalidArgumentException("Discount must be between 0 and 1");
        }
    }

    public function apply(Cart $cart): Money
    {
        $subtotal = $cart->subtotal();
        return $subtotal->multiply(1 - $this->discount);
    }
}
