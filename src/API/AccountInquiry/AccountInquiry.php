<?php

namespace Reactmore\OY\API\AccountInquiry;

use Exception;

class AccountInquiry
{
    private  $credential, $stage, $endPoints = [];

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
                $data = [
                    'status' => 'Failed',
                    'message' => 'Endpoint "' . $endpoint . '" does not exist"'
                ];
                echo json_encode($data);
                exit;
            }
        }

        return $this->endPoints[$endpoint];
    }
}
