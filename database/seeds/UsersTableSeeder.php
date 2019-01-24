<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        
        User::truncate();

        $users = [
            [
                'name' => 'Super Admin',
                'username' => 'sa',
                'email' => 'sa@robi.com',
                'is_default_password' => false,
                'is_locked' => false,
                'source' => 2,
                'is_active' => true,
                'created_by' => 1,
                'updated_by' => 1,
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'User',
                'username' => 'robi',
                'email' => 'robi@robi.com',
                'is_default_password' => false,
                'is_locked' => false,
                'source' => 2,
                'is_active' => true,
                'created_by' => 1,
                'updated_by' => 1,
                'password' => bcrypt('user'),
            ],
        ];
        $roles = Role::get();
        foreach ($users as $key => $value) {
            $user = new User();
            $user->fill($value);
            $user->save();

            if ('sa' == $value['username']) {
                $user->roles()->attach(Role::where('name', 'admin')->first());
            }
            if('robi'== $value['username']){
                $user->assignRole('candidate');
            }
        }
    }
}
