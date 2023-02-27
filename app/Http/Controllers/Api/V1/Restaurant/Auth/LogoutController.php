<?php

namespace App\Http\Controllers\Api\V1\Restaurant\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return httpResponse(1, "Logged out");
    }
}
