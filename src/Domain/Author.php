<?php
declare(strict_types=1);

namespace BookVerse\Domain;

final class Author
{
    public function __construct(
        private string $firstName,
        private string $lastName
    ) {}

    public function fullName(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }
}
