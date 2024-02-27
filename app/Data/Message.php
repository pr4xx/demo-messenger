<?php

namespace App\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

class Message extends Data
{
    public function __construct(
        public string $content,
        public CarbonImmutable $sentAt
    )
    {
    }
}
