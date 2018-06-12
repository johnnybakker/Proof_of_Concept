<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'A normal user';
        $role_user->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'admin role can do everything';
        $role_admin->save();
    }
}
