<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use BookVerse\Domain\Book;
use BookVerse\Domain\Author;
use BookVerse\Domain\Money;

$author = new Author("Isabel", "Allende");
$book   = new Book(
    isbn: "978-84-376-0494-7",
    title: "La casa de los espíritus",
    author: $author,
    price: Money::of(1599, 'EUR') // 15,99€
);

echo $book->getTitle() . " - " . $book->getAuthor()->fullName() . PHP_EOL;
