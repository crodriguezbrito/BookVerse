<?php
declare(strict_types=1);

namespace BookVerse\Domain;

final class CartItem
{
    public function __construct(
        private Book $book,
        private int $quantity
    ) {
        if ($quantity < 1) {
            throw new \InvalidArgumentException("Quantity must be >= 1");
        }
    }

    public function book(): Book { return $this->book; }
    public function quantity(): int { return $this->quantity; }

    public function lineTotal(): Money
    {
        return $this->book->getPrice()->multiply($this->quantity);
    }
}
