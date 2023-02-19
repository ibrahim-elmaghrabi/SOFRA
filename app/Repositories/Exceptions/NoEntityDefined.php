<?php

namespace App\Repositories\Exceptions;

use Exception;

class NoEntityDefined extends Exception
{
    public function render()
    {
        return response()->json([
            'message' => 'entity not defined'
        ]);
    }
}