<?php
declare(strict_types=1);

namespace BookVerse\Functional;

/** Minimal Option type */
abstract class Option
{
    public static function some(mixed $v): Some { return new Some($v); }
    public static function none(): None { return new None(); }

    abstract public function isSome(): bool;
    abstract public function isNone(): bool;

    /** @param callable(mixed): mixed $fn */
    abstract public function map(callable $fn): Option;

    /** @param callable(): mixed $default */
    abstract public function getOrElse(callable $default): mixed;
}

final class Some extends Option
{
    public function __construct(private mixed $value) {}
    public function isSome(): bool { return true; }
    public function isNone(): bool { return false; }
    public function map(callable $fn): Option { return new self($fn($this->value)); }
    public function getOrElse(callable $default): mixed { return $this->value; }
}

final class None extends Option
{
    public function isSome(): bool { return false; }
    public function isNone(): bool { return true; }
    public function map(callable $fn): Option { return $this; }
    public function getOrElse(callable $default): mixed { return $default(); }
}
