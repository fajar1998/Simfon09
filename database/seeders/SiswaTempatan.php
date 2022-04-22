<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SiswaTempatan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 100; $i++){

            // insert data ke table pegawai menggunakan Faker
          DB::table('siswa_tempatans')->insert([
              'siswa_id' => $faker->unique()->numberBetween(2,101),
              'tahun_id' => '2',
              'kelas_id' =>  $faker->numberBetween(1,6),
          ]);

        }
    }
}
