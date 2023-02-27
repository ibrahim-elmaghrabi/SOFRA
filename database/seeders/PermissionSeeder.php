<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' =>   'cities-list',
            //'name' =>   'cities-create',
            //'name' =>   'cities-edit',
            //'name' =>   'cities-delete',
            //'name' =>   'payments-list',
            //'name' =>   'payments-create',
            //'name' =>   'payments-edit',
            //'name' =>   'payments-delete',
            //'name' =>   'areas-list',
            //'name' =>   'areas-create',
            //'name' =>   'areas-edit',
            //'name' =>   'areas-delete',
            //'name' =>   'categories-list',
            //'name' =>   'categories-create',
            //'name' =>   'categories-edit',
            //'name' =>   'categories-delete',
            //'name' =>   'paymentMethods-list',
            //'name' =>   'paymentMethods-create',
            //'name' =>   'paymentMethods-edit',
            //'name' =>   'paymentMethods-delete',
            //'name' =>   'users-list',
            //'name' =>   'users-create',
            //'name' =>   'users-edit',
            //'name' =>   'users-delete',
            //'name' =>   'roles-list',
            //'name' =>   'roles-create',
            //'name' =>   'roles-edit',
            //'name' =>   'roles-delete',
            //'name' =>   'clients-list',
            //'name' =>   'clients-delete',
            //'name' =>   'comments-list',
            //'name' =>   'comments-delete',
            //'name' =>   'meals-list',
            //'name' =>   'meals-delete',
            //'name' =>   'offers-list',
            //'name' =>   'offers-delete',
            //'name' =>   'contacts-list',
            //'name' =>   'contacts-show',
            //'name' =>   'contacts-delete',
            //'name' =>   'orders-list',
            //'name' =>   'orders-show',
            //'name' =>   'orders-delete',
            //'name' =>   'restaurants-list',
            //'name' =>   'restaurants-show',
            //'name' =>   'restaurants-delete',
            //'name' =>   'settings-edit', */
        ]);
    }
}
