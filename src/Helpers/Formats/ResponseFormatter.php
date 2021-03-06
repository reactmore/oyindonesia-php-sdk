<?php

namespace Reactmore\OY\Helpers\Formats;

class ResponseFormatter
{
    public static function formatResponse($data, $code = 200, $status = 'success')
    {
        return [
            'status' => [
                'code' => $code,
                'messages' => $status,
            ],
            'data' => $data
        ];
    }
}
