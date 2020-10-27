<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       // factory(\App\Product::class,10)->create();
       //  factory(\App\Student::class, 30)->create();
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            CountriesTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,


        ]);
    }
}
