<?php
declare(strict_types=1);

namespace BookVerse\Functional;

use BookVerse\Domain\Money;

/** Devuelve una función que aplica un porcentaje dado a un Money */
function percentage(float $p): \Closure
{
    return function (Money $m) use ($p): Money {
        return $m->multiply(1 - $p);
    };
}
