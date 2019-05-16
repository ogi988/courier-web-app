<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $workerRole = Role::where('name', 'worker')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'admin',
            'email'=> 'admin@admin.com',
            'password'=>bcrypt('admin')
        ]);

        $worker = User::create([
            'name' => 'worker',
            'email'=> 'worker@worker.com',
            'password'=>bcrypt('worker')
        ]);

        $user = User::create([
            'name' => 'user',
            'email'=> 'user@user.com',
            'password'=>bcrypt('user')
        ]);

        $admin->roles()->attach($adminRole);
        $worker->roles()->attach($workerRole);
        $user->roles()->attach($userRole);
    }
}
