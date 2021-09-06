<?php

namespace Reactmore\OY\Helpers\Formats;

class ResponseFormatter
{
    public static function formatResponse($data, $code = 200, $status = 'success')
    {
        foreach ($data as $var => $key) {
            if ($var === 'status') {
                continue;
            }

            $dataOutput[$var] = $key;
            // var_dump();
        }

        return [
            'status' => $status,
            'code' => $code,
            'data' => $dataOutput
        ];
    }
}
