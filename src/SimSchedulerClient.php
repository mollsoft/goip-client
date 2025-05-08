<?php

namespace MollSoft\GoipClient;

use MollSoft\GoipClient\Abstract\Client;
use MollSoft\GoipClient\Entities\CallRecordList;
use MollSoft\GoipClient\Entities\SimBank\Info;
use Symfony\Component\DomCrawler\Crawler;

class SimSchedulerClient extends Client
{
    public function __construct(string $baseUri, string $login, string $password, string $cookiePath = null)
    {
        if (mb_strpos($baseUri, 'smb_scheduler') === false) {
            $baseUri .= '/smb_scheduler/en/';
        }

        parent::__construct($baseUri, $login, $password, $cookiePath);
    }

    public function callRecord(): CallRecordList
    {
        return new CallRecordList($this, 'call_record.php');
    }
}
