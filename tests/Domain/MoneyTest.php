<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use BookVerse\Domain\Money;

final class MoneyTest extends TestCase
{
    public function testAdd(): void
    {
        $a = Money::of(1000, 'EUR');
        $b = Money::of(599, 'EUR');
        $this->assertSame(1599, $a->add($b)->amountMinor());
    }

    public function testMultiplyRounds(): void
    {
        $a = Money::of(999, 'EUR');
        $this->assertSame(1499, $a->multiply(1.5)->amountMinor());
    }
}
