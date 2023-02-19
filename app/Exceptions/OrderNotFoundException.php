<?php

namespace App\Exceptions;

use Exception;


class OrderNotFoundException  extends Exception
{
    public function render()
    {
        return response()->json([
            'message' => 'order no found'
        ]);
    }
}