<?php
declare(strict_types=1);

namespace BookVerse\Functional;

use BookVerse\Domain\{CartItem, Money};

/** @param CartItem[] $items */
function pipeline_total(array $items, string $currency, float $discount): Money
{
    $steps = [
        fn(array $its) => subtotal($its, $currency), // array<CartItem> -> Money
        percentage($discount)                        // Money -> Money
    ];

    return array_reduce(
        $steps,
        fn($carry, $fn) => $fn($carry),
        $items
    );
}
