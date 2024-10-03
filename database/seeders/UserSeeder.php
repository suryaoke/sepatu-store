<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admintoko',
            'email' => 'admintoko@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('admin');

        $masyarakat = User::create([
            'name' => 'masyarakat',
            'email' => 'masyarakat@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $masyarakat->assignRole('masyarakat');
    }
}
