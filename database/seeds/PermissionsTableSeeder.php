<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        foreach(Permission::all() as $permission){
            $permission->roles()->sync([]);
        }
        foreach(User::all() as $user){
            $user->roles()->sync([]);
            $user->permissions()->sync([]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permissions = [
             [
                'name' => 'user-list',
                'display_name' => 'List Users',
                'category' => 'user',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create Users',
                'category' => 'user',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'user-edit',
                'display_name' => 'Edit Users',
                'category' => 'user',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete Users',
                'category' => 'user',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'role-list',
                'display_name' => 'List roles',
                'category' => 'role',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create roles',
                'category' => 'role',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit roles',
                'category' => 'role',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete roles',
                'category' => 'role',
                'guard_name' => 'admin',
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
