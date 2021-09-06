<?php

namespace Reactmore\OY\API;


interface RequestInterface
{

    public function setPayload($data = []);

    public function getPayload();

    public function getData();

    public function getJson();

    public function getResponse();

    public function getStatusCode(): int;
}
