<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@laracamp.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'is_admin' => true,
            ],
            
        ];

        foreach ($user as $key => $user) {
            user::create($user);
        }
    }
}
