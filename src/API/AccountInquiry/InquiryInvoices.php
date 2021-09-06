<?php

namespace Reactmore\OY\API\AccountInquiry;

use Exception;
use Reactmore\OY\API\RequestInterface;
use Reactmore\OY\Helpers\Formats\ResponseFormatter;
use Reactmore\OY\Helpers\Formats\Url;
use Reactmore\OY\Helpers\Request\Guzzle;
use Reactmore\OY\Helpers\Request\RequestFormatter;
use Reactmore\OY\Helpers\Validations\MainValidator;


class InquiryInvoices implements RequestInterface
{
    private  $api_url, $headers, $data;

    public function __construct($credential, $stage)
    {

        $this->api_url = Url::URL_API[$stage];
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'x-oy-username' => $credential['username'],
            'x-api-key' => $credential['apikey']
        ];
    }

    /**
     * @param array $data
     */
    public function setPayload($data = [])
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->data;
    }



    public function getData()
    {
        try {
            MainValidator::validateRequest($this->getPayload(), ['bank_code', 'account_number']);

            $request = RequestFormatter::formatArrayKeysToSnakeCase($this->getPayload());
            $response = Guzzle::sendRequest($this->api_url . '/account-inquiry', 'POST', $this->headers, $request);

            // $response = $response['data'];

            return ResponseFormatter::formatResponse($response, $response['status']['code'], $response['status']['message']);
        } catch (Exception $e) {
            return Guzzle::handleException($e);
        }
    }


    public function getJson()
    {
        $response = json_encode($this->getData());

        return $response;
    }

    public function getResponse()
    {
        $response = json_decode($this->getJson());

        return $response;
    }

    public function getStatusCode(): int
    {
        $status = $this->getResponse();

        return $status->code;
    }
}
