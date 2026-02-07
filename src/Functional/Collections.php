<?php
declare(strict_types=1);

namespace BookVerse\Functional;

use BookVerse\Domain\Book;

/** @param Book[] $books */
function titles(array $books): array
{
    return array_map(fn(Book $b) => $b->getTitle(), $books);
}

/** @param Book[] $books */
function filter_by_author(array $books, string $authorName): array
{
    return array_filter(
        $books,
        fn(Book $b) => $b->getAuthor()->fullName() === $authorName
    );
}
