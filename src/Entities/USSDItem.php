<?php

namespace MollSoft\GoipClient\Entities;

readonly class USSDItem
{
    public function __construct(
        public int $id,
        public int $termId,
        public string $time,
        public string $command,
        public ?string $message,
        public ?string $error,
    ) {
    }
}
