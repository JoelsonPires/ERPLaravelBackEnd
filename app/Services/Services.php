<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;

abstract class Services
{
    public function response(string $message, int $code = 200)
    {
        return response($message, $code);
    }

    public function responseJsonMessage(string $message, int $code = 200)
    {
        return response()->json([
            'message' => $message,
            'code' => $code
        ], $code);
    }

    public function responseJsonData($data, int $code = 200)
    {
        return response()->json($data, $code);
    }

    public function responseError(string $message = 'Erro Interno', int $code = 500)
    {
        return response()->json([
            'message' => $message,
            'code' => $code
        ], $code);
    }

    public function validate($requestAll, array $rules)
    {
        $validator = Validator::make($requestAll, $rules);
        if($validator->fails())
            return response()->json($validator->errors());

        return false;
    }

    public function parseBoolean($value) {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
}
