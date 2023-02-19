<?php

namespace App\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{
    public function render()
    {
        return response()->json([
            'message' => 'user not found'
        ]);
    }
}