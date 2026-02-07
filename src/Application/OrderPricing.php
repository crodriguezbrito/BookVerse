<?php
declare(strict_types=1);

namespace BookVerse\Application;

use BookVerse\Domain\{Cart, Order, OrderFactory};
use BookVerse\Functional as F;

final class OrderPricing
{
    public function __construct(private OrderFactory $factory) {}

    public function fromCartWithDiscount(Cart $cart, float $discount): Order
    {
        $total = F\pipeline_total($cart->items(), 'EUR', $discount);
        return $this->factory->createFromCart(uniqid('ord_'), $cart, $total);
    }
}
