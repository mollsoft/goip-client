<?php

namespace MollSoft\GoipClient\Entities\Gateway;

/**
 * @property SMS[] $sms
 */
readonly class LineSMS
{
    public function __construct(
        public int $line,
        public array $sms,
    ) {
    }
}
