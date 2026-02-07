<?php
declare(strict_types=1);

namespace BookVerse\Domain;

use BookVerse\Shared\Timestamps;

final class Order
{
    use Timestamps;

    /** @param CartItem[] $items */
    public function __construct(
        private string $id,
        private array $items,
        private Money $total
    ) {
        $this->initTimestamps();
    }

    public function id(): string { return $this->id; }
    public function total(): Money { return $this->total; }

    /** @return CartItem[] */
    public function items(): array { return $this->items; }
}
