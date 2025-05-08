<?php

namespace MollSoft\GoipClient\Entities;

use Symfony\Component\DomCrawler\Crawler;

class CallRecordList extends DataTable
{
    public function current(): CallRecordItem
    {
        $data = array_combine($this->columns, $this->items[$this->position]);

        /** @var Crawler $raw */
        $raw = $data['raw'];

        $id = explode('id=', $raw->filter('a')->attr('href'));
        $id = explode('&', $id[1])[0];

        return new CallRecordItem(
            id: (int)$id,
            time: $data['datetime'],
            slotId: (int)$data['slot_id'],
            lineId: (int)$data['line_id'],
            imei: $data['imei'] ?: null,
            imsi: $data['imsi'] ?: null,
            iccid: $data['iccid'] ? str_replace('"', '', $data['iccid']) : null,
            expiry: (int)$data['expiry(s)'],
            direction: $data['direction'],
            callNumber: $data['call_number'],
            disconnectCause: $data['disconnect_cause'] ?: null,
        );
    }
}
