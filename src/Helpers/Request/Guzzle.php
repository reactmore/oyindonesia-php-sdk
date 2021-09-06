<?php

namespace Reactmore\OY\Helpers\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Reactmore\OY\Helpers\Formats\ResponseFormatter;

class Guzzle
{
    public static function sendRequest($url, $method, $headers = [], $body = [], $type = 'json', $connectTimeout = 10, $timeout = 30)
    {
        $client = new Client(['verify' => false]);

        $response = $client->request($method, $url, [
            'headers' => $headers,
            $type => $body,
            'connect_timeout' => $connectTimeout,
            'timeout' => $timeout
        ])->getBody()->getContents();

        return json_decode($response, true) ? json_decode($response, true) : $response;
    }

    public static function handleException($exception)
    {
        if ($exception instanceof ConnectException) {
            return ResponseFormatter::formatResponse([
                'error' => 'Connection Timeout Error. Please check your internet connection and try again'
            ], 408, 'failed');
        } else {
            return ResponseFormatter::formatResponse([
                'error' => $exception->getMessage()
            ], 400, 'failed');
        }
    }
}
