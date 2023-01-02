<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Faker\Factory as Faker;


class PasiensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $year = 2000; $month = 4; $day = 19;
        echo Carbon::createFromDate($year, $month, $day, $tz)."\n";
        
        for ($i=0; $i < 20  ; $i++) { 
            DB::table('dosen')->insert([
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'jenis kelamin' => $faker->LP,
            ]);
        }
    }  
}
