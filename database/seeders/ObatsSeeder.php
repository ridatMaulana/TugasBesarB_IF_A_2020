<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Icd;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ObatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i=1; $i<=20; $i++){
            DB::table('obats')->insert([
                'icds_id' => rand(1,20),
                'nama_obat' => $faker->name,
                'harga_obat' => $faker->numerify('###000')
                ]);
        }
    }
}
