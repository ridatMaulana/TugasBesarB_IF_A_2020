<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;
use App\Models\Spesialis;
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
        $faker = Faker::create('id_ID');
        $karyawans = [
            [
                'id' => 1,
                'nama' => 'Admin',
                'alamat' => $faker->city,
                'no_telepon' => "08".$faker->numerify('##########'),
                'jabatan' => 'Super Admin',
                'spesialis_id' => 1
            ],
            [
                'id' => 2,
                'nama' => 'User',
                'alamat' => $faker->city,
                'no_telepon' => "08".$faker->numerify('##########'),
                'jabatan' => "Administrator",
                'spesialis_id' => 2
            ]
        ];
            foreach($karyawans as $key => $karyawan){
                Karyawan::create($karyawan);
            }

        for($i=3; $i<=20; $i++){
            DB::table('karyawans')->insert([
                'nama' => $faker->name,
                'alamat' => $faker->city,
                'no_telepon' => "08".$faker->numerify('##########'),
                'jabatan' => "Dokter",
                'spesialis_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ]);
        }
    }
}
// Spesialis::select('id')->where('id', '>', 2)->inRandomOrder()->get()
