<?php

namespace App\Exceptions;

use Exception;


class CanNotDeclineOrderException  extends Exception
{
    public function render()
    {
        return response()->json([
            'message' => 'sorry, order can not decline now !'
        ]);
    }
}