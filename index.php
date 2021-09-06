<?php

require __DIR__ . '/vendor/autoload.php';

use Reactmore\OY\Main;

$data = new Main();

// EXAMPLE AccountInquiry 
$AccountInquiry = $data->AccountInquiry()->PayInvoices();
$AccountInquiry->setPayload(['invoice_id' => '5ede8690-03f7-4b91-8eaa-4a5aff50c540']);

echo '<pre>';
var_dump($AccountInquiry->getPayload());
var_dump($AccountInquiry->getdata());
// var_dump($AccountInquiry->getJson());
// var_dump($AccountInquiry->getResponse());
// var_dump($AccountInquiry->getStatusCode());
echo '</pre>';
