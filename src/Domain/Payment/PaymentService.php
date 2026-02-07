<?php
declare(strict_types=1);

namespace BookVerse\Domain\Payment;

use BookVerse\Domain\DomainException;
use BookVerse\Domain\Order;

final class PaymentService
{
    public function charge(Order $order, PaymentMethod $method): void
    {
        if ($order->total()->amountMinor() === 0) {
            throw new DomainException("Cannot charge zero amount orders");
        }
        // Simulación de cobro...
    }
}
