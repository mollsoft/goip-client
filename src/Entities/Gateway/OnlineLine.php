<?php

namespace MollSoft\GoipClient\Entities\Gateway;

readonly class OnlineLine
{
    public function __construct(
        public int $line,
        public ?string $state,
    ) {
    }
}
