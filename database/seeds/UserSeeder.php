<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);

        $admin->assignRole('admin');

        $manajer = User::create([
            'name' => 'Deden Alif',
            'email' => 'manajer@gmail.com',
            'password' => Hash::make('manajer')
        ]);

        $manajer->assignRole('manajer');

        $kasir = User::create([
            'name' => 'Arya Maulana',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('kasir')
        ]);

        $kasir->assignRole('kasir');
    }
}
