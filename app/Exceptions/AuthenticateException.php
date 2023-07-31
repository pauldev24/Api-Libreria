<?php

namespace App\Exceptions;

use Exception;

class AuthenticateException extends Exception
{
    public function report()
    {
        return false;
    }

    public function render($request)
    {
        return response()->json([
            "message"=>"AuthenticateException"
        ],401);
    }
}
