<?php

namespace Database\Seeders;

use App\Models\Spesialis;
use Illuminate\Database\Seeder;

class CreateSpesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $spesialises = [
            [
                'id' => 1,
                'nama' => 'Admin',
            ],
            [
                'id' => 2,
                'nama' => 'User',
            ],
            [
                'id' => 3,
                'nama' => 'Umum',
            ]
            ];
            foreach($spesialises as $key => $spesialis){
                Spesialis::create($spesialis);
            }
    }
}
