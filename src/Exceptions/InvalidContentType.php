<?php

namespace Reactmore\OY\Exceptions;

class InvalidContentType extends BaseException
{
    public function setMessage()
    {
        return 'Content type must be array';
    }
}
