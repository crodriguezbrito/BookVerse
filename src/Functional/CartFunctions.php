<?php
declare(strict_types=1);

namespace BookVerse\Functional;

use BookVerse\Domain\{CartItem, Money};

function line_total(CartItem $item): Money
{
    return $item->lineTotal(); // pura: no estado externo, mismo input -> mismo output
}

/** @param CartItem[] $items */
function subtotal(array $items, string $currency = 'EUR'): Money
{
    return array_reduce(
        $items,
        fn(Money $acc, CartItem $i) => $acc->add(line_total($i)),
        Money::of(0, $currency)
    );
}

/** @param CartItem[] $items */
function apply_percentage_discount(array $items, float $discount, string $currency = 'EUR'): Money
{
    $sub = subtotal($items, $currency);
    return $sub->multiply(1 - $discount);
}
