<?php
declare(strict_types=1);

namespace BookVerse\Application;

use BookVerse\Domain\Cart;
use BookVerse\Domain\Money;
use BookVerse\Domain\Pricing\PricingStrategy;

final class CheckoutService
{
    public function __construct(private PricingStrategy $strategy) {}

    public function total(Cart $cart): Money
    {
        return $this->strategy->apply($cart);
    }
}
