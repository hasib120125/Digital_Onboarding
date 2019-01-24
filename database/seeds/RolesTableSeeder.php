<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'candidate',
                'display_name' => 'Candidate',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'employee',
                'display_name' => 'Employee',
                'guard_name' => 'admin',
            ],
        ];
        foreach ($roles as $key => $value) {
            $role = new Role();
            $role->fill($value);
            $role->save();
        }
    }
}
