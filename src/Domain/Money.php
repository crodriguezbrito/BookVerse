<?php
declare(strict_types=1);

namespace BookVerse\Domain;

final class Money
{
    private function __construct(
        private int $amountMinor, // e.g., 1599 = 15.99
        private string $currency  // ISO code
    ) {}

    public static function of(int $amountMinor, string $currency): self
    {
        if ($amountMinor < 0) {
            throw new \InvalidArgumentException("Amount must be >= 0");
        }
        return new self($amountMinor, strtoupper($currency));
    }

    public function currency(): string { return $this->currency; }
    public function amountMinor(): int { return $this->amountMinor; }

    public function add(self $other): self
    {
        $this->assertSameCurrency($other);
        return self::of($this->amountMinor + $other->amountMinor, $this->currency);
    }

    public function multiply(float $factor): self
    {
        $result = (int) round($this->amountMinor * $factor, 0);
        return self::of($result, $this->currency);
    }

    public function format(): string
    {
        $major = $this->amountMinor / 100;
        return number_format($major, 2) . " " . $this->currency;
    }

    private function assertSameCurrency(self $other): void
    {
        if ($this->currency !== $other->currency) {
            throw new \LogicException("Currency mismatch: {$this->currency} vs {$other->currency}");
        }
    }
}
