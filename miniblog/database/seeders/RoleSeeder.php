<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = new Role();
        $roleAdmin->name = 'admin';
        $roleAdmin->slug = 'admin';
        $roleAdmin->save();

        $roleUser = new Role();
        $roleUser->name = 'user';
        $roleUser->slug = 'user';
        $roleUser->save();
    }
}
