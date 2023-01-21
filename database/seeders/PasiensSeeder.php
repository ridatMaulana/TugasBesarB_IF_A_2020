<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $gender = collect(["Laki-laki", "Perempuan"]);
        $agama = collect(["islam", "kristen", "katolik", "hindu", "buddha", "konghucu"]);
        $faker = Faker::create('id_ID');
        for($i=1; $i<=20; $i++){
            DB::table('pasiens')->insert([
                'nama' => $faker->name,
                'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'alamat' => $faker->city,
                'agama' => $agama->random(),
                'nama_ibu' => $faker->name,
                'jenis_kelamin' => $gender->random(),
                'tanggal_daftar' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ]);
        }
    }
}
