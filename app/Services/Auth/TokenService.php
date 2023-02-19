<?php

namespace App\Services\Auth;

class TokenService
{
    public function apiToken($user, string $tokenName, string $deviceToken, string $deviceType)
    {
        if(!empty($user->tokens))
        {
            foreach($user->tokens as $token)
            {
                $token->delete();
            }
        }
        $token = $user->createToken($tokenName);
        $token->accessToken->device_token= $deviceToken;
        $token->accessToken->device_type = $deviceType;
        $token->accessToken->save();
        return ["token"=> $token->plainTextToken];
    }
}