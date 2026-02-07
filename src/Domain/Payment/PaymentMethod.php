<?php
declare(strict_types=1);

namespace BookVerse\Domain\Payment;

enum PaymentMethod: string
{
    case CARD = 'card';
    case PAYPAL = 'paypal';
    case CASH = 'cash';
}
