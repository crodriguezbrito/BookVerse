<?php
declare(strict_types=1);

namespace BookVerse\Functional;

use BookVerse\Domain\{CartItem, Book};

/** @param CartItem[] $items */
function add_item(array $items, Book $book, int $qty = 1): array
{
    $copy = $items;
    $copy[] = new CartItem($book, $qty);
    return $copy;
}
