<?php
declare(strict_types=1);

namespace BookVerse\Domain;

interface BookRepository
{
    public function byIsbn(string $isbn): ?Book;

    /** @return Book[] */
    public function searchByTitle(string $query): array;

    public function save(Book $book): void;
}
