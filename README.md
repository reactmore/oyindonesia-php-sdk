# OY INDONESIA PHP SDK
Unofficial oyindonesia-php-sdk
[Official Documentations](https://api-docs.oyindonesia.com/)

## Instalations

```
composer install reactmore/oyindonesia-php-sdk
```

## Example
```php
<?php
// Load Vendor
require __DIR__ . '/vendor/autoload.php';

use Reactmore\OY\Main;

// IF You Use ENV
$data = new Main();

// IF You Not Use ENV
$data = new Main([
    'apikey' => 'Your-api-Key',
    'stage' => 'productions-or-sandbox',
    'username' => 'Your-oy-username',
]);

// EXAMPLE AccountInquiry method InquiryInvoices
// Documentations
// https://api-docs.oyindonesia.com/?shell#get-account-inquiry-invoices-account-inquiry

$AccountInquiry = $data->AccountInquiry()->InquiryInvoices();

// set body
$AccountInquiry->setPayload(['id' => '5ede8690-03f7-4b91-8eaa-4a5aff50c540']);

echo '<pre>';
// Get Respon Data 
var_dump($AccountInquiry->getdata());
// Get Respon Data as Json
var_dump($AccountInquiry->getJson());
// Get Respon Data as Object
var_dump($AccountInquiry->getResponse());
// Get Respon Status Code
var_dump($AccountInquiry->getStatusCode());
echo '</pre>';
```
