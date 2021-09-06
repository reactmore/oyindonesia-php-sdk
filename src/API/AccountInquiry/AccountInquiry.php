<?php

namespace Reactmore\OY\API\AccountInquiry;

use Exception;
use Reactmore\OY\API\RequestInterface;
use Reactmore\OY\Helpers\Formats\ResponseFormatter;
use Reactmore\OY\Helpers\Formats\Url;
use Reactmore\OY\Helpers\Request\Guzzle;
use Reactmore\OY\Helpers\Request\RequestFormatter;
use Reactmore\OY\Helpers\Validations\MainValidator;


class AccountInquiry
{
    private  $credential, $stage;

    public function __construct($credential, $stage)
    {
        $this->credential = $credential;
        $this->stage = $stage;
    }


    public function __call($endpoint, array $args)
    {
        if (!isset($this->endPoints[$endpoint])) {
            $class = 'Reactmore\OY\API\AccountInquiry\\' . ucfirst($endpoint);
            if (class_exists($class)) {
                $this->endPoints[$endpoint] = new $class($this->credential,  $this->stage);
            } else {
                throw new Exception('Endpoint "' . $endpoint . '" does not exist"');
            }
        }

        return $this->endPoints[$endpoint];
    }
}
