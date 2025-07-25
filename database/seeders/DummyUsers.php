<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DummyUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'NIS' => '3333',
                'nama' => 'wahyu',
                'alamat' => 'depok',
                'email' => 'wahyu@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'admin',
                'foto_profile' => 'dashboard/images/profile.png'
            ],
            [
                'NIS' => '5555',
                'nama' => 'wahyu 2',
                'alamat' => 'depok',
                'email' => 'wahyu2@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'murid',
                'foto_profile' => 'dashboard/images/profile.png'
            ],
            [
                'NIS' => '4444',
                'nama' => 'ezy',
                'alamat' => 'depok',
                'email' => 'ezy@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'guru',
                'foto_profile' => 'dashboard/images/profile.png'
            ]
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
