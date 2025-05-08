<?php

namespace MollSoft\GoipClient\Entities;

readonly class CallRecordItem
{
    public function __construct(
        public int $id,
        public string $time,
        public string $slotId,
        public string $lineId,
        public ?string $imei,
        public ?string $imsi,
        public ?string $iccid,
        public int $expiry,
        public string $direction,
        public string $callNumber,
        public ?string $disconnectCause,
    ) {
    }
}
