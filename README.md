# GoIP Parser Wrapper in PHP

# Requirements

* PHP 8.0 or more
* Composer
* GuzzleHTTP

# Composer

```bash
composer require mollsoft/goip-client
```

# Examples

### Authorization

```php
$baseURI = 'http://.../goip';
$login = 'root';
$password = '...';

$client = new \MollSoft\GoipClient\GoipClient($baseURI, $login, $password);
```

### Get GoIP list

```php
$goipList = $client->goipList();

/** @var \MollSoft\GoipClient\Entities\GoipItem $item */
foreach( $goipList as $item ) {
    print_r($item);
}
```

### Get inbox sms messages

```php
$inboxSMSList = $client->inboxSMS();

/** @var \MollSoft\GoipClient\Entities\InboxSMSItem $item */
foreach( $inboxSMSList as $item ) {
    print_r($item);
}
```

### Get USSD-requests

```php
$ussdList = $client->ussdList();

/** @var \MollSoft\GoipClient\Entities\USSDItem $item */
foreach( $ussdList as $item ) {
    print_r($item);
}
```

### Send USSD and get answer

```php
$command = '*100#';
$goipList = $client->goipList();

/** @var \MollSoft\GoipClient\Entities\GoipItem $item */
foreach( $goipList as $item ) {
    $answer = $client->ussd($item->termId, $command, true);
    echo "GoIP Terminal {$item->termId}: $answer\n";
}
```
