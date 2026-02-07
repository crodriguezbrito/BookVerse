<?php
declare(strict_types=1);

namespace BookVerse\Domain\Pricing;

use BookVerse\Domain\Cart;
use BookVerse\Domain\Money;

interface PricingStrategy
{
    public function apply(Cart $cart): Money; // retorna total final
}
