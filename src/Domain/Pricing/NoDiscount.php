<?php
declare(strict_types=1);

namespace BookVerse\Domain\Pricing;

use BookVerse\Domain\Cart;
use BookVerse\Domain\Money;

final class NoDiscount implements PricingStrategy
{
    public function apply(Cart $cart): Money
    {
        return $cart->subtotal();
    }
}
