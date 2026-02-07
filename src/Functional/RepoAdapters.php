<?php
declare(strict_types=1);

namespace BookVerse\Functional;

use BookVerse\Domain\BookRepository;

function option_from_repo(BookRepository $repo, string $isbn): Option
{
    $book = $repo->byIsbn($isbn);
    return $book ? Option::some($book) : Option::none();
}
