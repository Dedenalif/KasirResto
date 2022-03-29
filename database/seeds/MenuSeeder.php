<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Minuman
        Menu::create([
            'nama' => 'Yogurt Stroberi',
            'kategori' => 'minuman',
            'harga' => '20000',
            'status' => 'tersedia',
            'gambar' => 'yogurt_stroberi.jpg'
        ]);

        Menu::create([
            'nama' => 'Matcha Latte',
            'kategori' => 'minuman',
            'harga' => '25000',
            'status' => 'tersedia',
            'gambar' => 'matcha_latte.jpg'
        ]);

        Menu::create([
            'nama' => 'Latte Capucino',
            'kategori' => 'minuman',
            'harga' => '15000',
            'status' => 'tersedia',
            'gambar' => 'latte_capucino.jpg'
        ]);

        //Makanan
        Menu::create([
            'nama' => 'Nachos',
            'kategori' => 'makanan',
            'harga' => '25000',
            'status' => 'tersedia',
            'gambar' => 'nachos.jpg'
        ]);

        Menu::create([
            'nama' => 'Burger',
            'kategori' => 'makanan',
            'harga' => '30000',
            'status' => 'tersedia',
            'gambar' => 'burger.jpg'
        ]);

        Menu::create([
            'nama' => 'Stroberi Cake',
            'kategori' => 'makanan',
            'harga' => '20000',
            'status' => 'tersedia',
            'gambar' => 'stroberi_cake.jpg'
        ]);
    }
}
