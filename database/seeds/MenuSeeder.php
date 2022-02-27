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
        Menu::create([
            'nama' => 'Burger',
            'kategori' => 'makanan',
            'harga' => '25000',
            'status' => 'tersedia',
            'gambar' => 'burger.jpg'
        ]);

        Menu::create([
            'nama' => 'Coklat Panas',
            'kategori' => 'minuman',
            'harga' => '7000',
            'status' => 'tersedia',
            'gambar' => 'coklat_panas.jpg'
        ]);

        Menu::create([
            'nama' => 'Daging Protein',
            'kategori' => 'makanan',
            'harga' => '30000',
            'status' => 'tersedia',
            'gambar' => 'daging_protein.jpg'
        ]);

        Menu::create([
            'nama' => 'Jeruk Nipis',
            'kategori' => 'minuman',
            'harga' => '10000',
            'status' => 'tersedia',
            'gambar' => 'jeruk_nipis.jpg'
        ]);

        Menu::create([
            'nama' => 'Salmon',
            'kategori' => 'makanan',
            'harga' => '20000',
            'status' => 'tersedia',
            'gambar' => 'salmon.jpg'
        ]);

        Menu::create([
            'nama' => 'Teh',
            'kategori' => 'minuman',
            'harga' => '5000',
            'status' => 'tersedia',
            'gambar' => 'teh.jpg'
        ]);
    }
}
