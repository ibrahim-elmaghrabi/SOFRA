<?php

namespace App\Exceptions;

use Exception;


class LessThanMinimumChargeException  extends Exception
{
    public function render()
    {
        return response()->json([
            'message' => 'sorry, your order must be more than minimum charge to be placed !'
        ]);
    }
}