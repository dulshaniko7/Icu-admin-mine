<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_create',
            ],
            [
                'id'    => 18,
                'title' => 'product_edit',
            ],
            [
                'id'    => 19,
                'title' => 'product_show',
            ],
            [
                'id'    => 20,
                'title' => 'product_delete',
            ],
            [
                'id'    => 21,
                'title' => 'product_access',
            ],
            [
                'id'    => 22,
                'title' => 'discount_create',
            ],
            [
                'id'    => 23,
                'title' => 'discount_edit',
            ],
            [
                'id'    => 24,
                'title' => 'discount_show',
            ],
            [
                'id'    => 25,
                'title' => 'discount_delete',
            ],
            [
                'id'    => 26,
                'title' => 'discount_access',
            ],
            [
                'id'    => 27,
                'title' => 'country_create',
            ],
            [
                'id'    => 28,
                'title' => 'country_edit',
            ],
            [
                'id'    => 29,
                'title' => 'country_show',
            ],
            [
                'id'    => 30,
                'title' => 'country_delete',
            ],
            [
                'id'    => 31,
                'title' => 'country_access',
            ],
            [
                'id'    => 32,
                'title' => 'tax_create',
            ],
            [
                'id'    => 33,
                'title' => 'tax_edit',
            ],
            [
                'id'    => 34,
                'title' => 'tax_show',
            ],
            [
                'id'    => 35,
                'title' => 'tax_delete',
            ],
            [
                'id'    => 36,
                'title' => 'tax_access',
            ],
            [
                'id'    => 37,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 38,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 39,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 40,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 41,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 42,
                'title' => 'customer_create',
            ],
            [
                'id'    => 43,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 44,
                'title' => 'customer_show',
            ],
            [
                'id'    => 45,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 46,
                'title' => 'customer_access',
            ],
            [
                'id'    => 47,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 48,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 49,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 50,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 51,
                'title' => 'client_management_access',
            ],
            [
                'id'    => 52,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
