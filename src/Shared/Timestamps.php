<?php
declare(strict_types=1);

namespace BookVerse\Shared;

trait Timestamps
{
    private \DateTimeImmutable $createdAt;
    private \DateTimeImmutable $updatedAt;

    private function initTimestamps(): void
    {
        $now = new \DateTimeImmutable('now');
        $this->createdAt = $now;
        $this->updatedAt = $now;
    }

    public function touch(): void
    {
        $this->updatedAt = new \DateTimeImmutable('now');
    }

    public function createdAt(): \DateTimeImmutable { return $this->createdAt; }
    public function updatedAt(): \DateTimeImmutable { return $this->updatedAt; }
}
