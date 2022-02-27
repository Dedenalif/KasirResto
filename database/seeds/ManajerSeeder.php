<?php

use App\Manajer;
use Illuminate\Database\Seeder;

class ManajerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manajer::create([
            'user_id' => 2
        ]);
    }
}
