<?php
declare(strict_types=1);

namespace BookVerse\Infrastructure;

use BookVerse\Domain\{Book, BookRepository};

final class InMemoryBookRepository implements BookRepository
{
    /** @var array<string, Book> */
    private array $books = [];

    public function byIsbn(string $isbn): ?Book
    {
        return $this->books[$isbn] ?? null;
    }

    public function searchByTitle(string $query): array
    {
        $q = mb_strtolower($query);
        return array_values(array_filter(
            $this->books,
            fn(Book $b) => str_contains(mb_strtolower($b->getTitle()), $q)
        ));
    }

    public function save(Book $book): void
    {
        $this->books[$book->getIsbn()] = $book;
    }
}
