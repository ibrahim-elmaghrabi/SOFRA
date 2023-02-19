<?php

namespace App\Exceptions;

use Exception;


class OrderCalculationException  extends Exception
{
    public function render()
    {
        return response()->json([
            'message' => 'error in order calculation'
        ]);
    }
}