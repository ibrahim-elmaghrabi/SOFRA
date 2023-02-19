<?php

namespace App\Exceptions;

use Exception;


class UnexpectedOrderStateException  extends Exception
{
    public function render()
    {
        return response()->json([
            'message' => 'sorry, can not update the order state !'
        ]);
    }
}