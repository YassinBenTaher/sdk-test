<?php


namespace Payment\Client;
use GuzzleHttp\Exception\GuzzleException;
use http\Client;
use Payment\Models\Payment\Domestic\SpDomesticPayment;

require_once 'vendor/autoload.php';

class SpPaymentClient implements ISpPaymentClient
{

    public SpPaymentClientOptions $clientOptions;

    function __construct(SpPaymentClientOptions $ClientOptions) {
        $this->clientOptions = $ClientOptions;
    }


    /**
     * @throws GuzzleException
     */
    public function CreateDomesticPayment($payment)
    {
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('POST', "{$this->clientOptions->baseUrl}/api/v1.0/payments/domestic/Create" ,
            $this->GetHeaders(), json_encode($payment));
        return $client->send($request);
    }

    /**
     * @throws GuzzleException
     */
    public function GetDomesticPayment(string $id)
    {
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', "{$this->clientOptions->baseUrl}/api/v1.0/payments/domestic/Get?id=$id" , $this->GetHeaders());

        return $client->send($request)->getBody();
    }

    /**
     * @throws GuzzleException
     */
    public function ListDomesticPayment(int $start, int $perPage)
    {
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', "{$this->clientOptions->baseUrl}/api/v1.0/payments/domestic/List?start=$start&perPage=$perPage" , $this->GetHeaders());
        return $client->send($request);
    }

    private function GetHeaders(): array {
        return array('app-id' => $this->clientOptions->appId,
                     'x-api-key' => $this->clientOptions->appKey,
                     'Content-Type' => 'application/json');
}


}