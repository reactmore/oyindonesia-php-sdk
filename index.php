<?php

require __DIR__ . '/vendor/autoload.php';

use Reactmore\OY\Main;

$data = new Main();

// EXAMPLE AccountInquiry 
$AccountInquiry = $data->AccountInquiry()->InquiryInvoices();

$AccountInquiry->setPayload('s');

echo '<pre>';
var_dump($AccountInquiry->getPayload());
var_dump($AccountInquiry->getdata());
var_dump($AccountInquiry->getJson());
var_dump($AccountInquiry->getResponse());
var_dump($AccountInquiry->getStatusCode());
echo '</pre>';
