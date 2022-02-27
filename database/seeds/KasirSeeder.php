<?php

use App\Kasir;
use Illuminate\Database\Seeder;

class KasirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kasir::create([
            'user_id' => 3,
            'jenis_kelamin' => 'Laki-laki',
            'no_hp' => '0812345678',
            'alamat' => 'Bojong Tanjung'
        ]);
    }
}
