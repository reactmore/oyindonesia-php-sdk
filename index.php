<?php

require __DIR__ . '/vendor/autoload.php';

use Reactmore\OY\Main;

$data = new Main();

$accinquiry = $data->AccountInquiry()->inquiry();
$accinquiry->setPayload([
    'bank_code' => '014',
    'account_number' => '123123123123'
]);

echo '<pre>';
var_dump($accinquiry->getPayload());
var_dump($accinquiry->getdata());
var_dump($accinquiry->getJson());
var_dump($accinquiry->getResponse());
var_dump($accinquiry->getStatusCode());
echo '</pre>';
