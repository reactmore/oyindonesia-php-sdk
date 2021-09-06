<?php

namespace Reactmore\OY\Helpers\Validations;

class MainValidator
{
    public static function validateCredentialRequest($request)
    {
        ValidationHelper::validateContentType($request);
    }

    public static function validateRequest($request, $required = [])
    {
        ValidationHelper::validateContentType($request);

        if (!empty($required)) {
            ValidationHelper::validateContentFields($request, $required);
        }
    }
}
