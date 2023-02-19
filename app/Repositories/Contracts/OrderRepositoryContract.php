<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryContract
{
    public function allOrders($user, $request, string $key);
}