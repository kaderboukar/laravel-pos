<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'email' => 'boukar@gmail.com'
        ], [
            'first_name' => 'kader',
            'last_name' => 'boukar',
            'email'=>'boukar@gmail.com',
            'password' => bcrypt('kaderBK7'),
            'is_admin' => 1
        ]);
    }
}
