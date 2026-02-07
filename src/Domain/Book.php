<?php
declare(strict_types=1);

namespace BookVerse\Domain;

final class Book
{
    public function __construct(
        private string $isbn,
        private string $title,
        private Author $author,
        private Money $price
    ) {
        if ($isbn === '') {
            throw new \InvalidArgumentException("ISBN cannot be empty");
        }
    }

    public function getIsbn(): string { return $this->isbn; }
    public function getTitle(): string { return $this->title; }
    public function getAuthor(): Author { return $this->author; }
    public function getPrice(): Money { return $this->price; }
}
