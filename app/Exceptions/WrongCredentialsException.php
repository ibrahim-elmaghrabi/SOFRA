<?php

namespace App\Exceptions;

use Exception;

class WrongCredentialsException extends Exception
{
     public function render()
    {
        return response()->json([
            'message' => 'wrong credentials'
        ]);
    }
}