<?php

namespace App\Exceptions;

use Exception;


class NotAvailableException  extends Exception
{
    public function render()
    {
        return response()->json([
            'message' => 'this restaurant not available at the current time'
        ]);
    }
}