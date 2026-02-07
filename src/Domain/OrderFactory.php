<?php
declare(strict_types=1);

namespace BookVerse\Domain;

final class OrderFactory
{
    public function createFromCart(string $orderId, Cart $cart, Money $finalTotal): Order
    {
        return new Order($orderId, $cart->items(), $finalTotal);
    }
}
