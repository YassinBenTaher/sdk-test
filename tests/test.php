<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Helpers\Crypto\SpCrypto;

$client = new \Payment\Client\SpPaymentClient(
    new \Payment\Client\SpPaymentClientOptions('https://devpayment.tryspare.com',
        'uydh6g0gfqvKhcxcVGAWS2V+T+h/8simgnbMFrj/tOw=',
        '9LsJP+tpqhdEQQAs4wJ5EQZKLGeydf9RBt3xsJUs6GI=')
);
/* try {
    $rep = $client->GetDomesticPayment('6383ee82-48f4-4e4f-b254-634467789c94');
    print_r($rep);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
} */


/* try {
    $list = $client->ListDomesticPayment(0, 10);
    print_r($list);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
}  */

$payment = new \Payment\Models\Payment\Domestic\SpDomesticPayment(
    50, 'Test payment'
);
print_r(json_encode($payment));
$rep = $client->CreateDomesticPayment($payment, 'MEUCIQC2uZ4wWIEiWfrrDkE8GtmDOP2vvTr7Sf7WQkP2r/m1OgIgRD2eBc3KLYndbVMLUeSWwS59lB7o8CxVK4gRsuZoYRo=');
print_r($rep);
