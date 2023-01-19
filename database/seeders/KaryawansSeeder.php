<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KaryawansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');
        for($i=1; $i<=20; $i++){
            DB::table('karyawans')->insert([
                'nama' => $faker->name,
                'alamat' => $faker->city,
                'no_telepon' => $faker->unixTime($max = 'now'),
                'jabatan' => $faker->jobTitle,
                'spesialis' => $faker->jobTitle,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ]);
        }
    }
}
