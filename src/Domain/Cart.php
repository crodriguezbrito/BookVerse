<?php
declare(strict_types=1);

namespace BookVerse\Domain;

final class Cart
{
    /** @var CartItem[] */
    private array $items = [];
    public function __construct(private string $currency = 'EUR') {}

    public function addItem(Book $book, int $quantity = 1): void
    {
        $this->items[] = new CartItem($book, $quantity);
    }

    /** @return CartItem[] */
    public function items(): array { return $this->items; }

    public function subtotal(): Money
    {
        $total = Money::of(0, $this->currency);
        foreach ($this->items as $item) {
            $total = $total->add($item->lineTotal());
        }
        return $total;
    }
}
