<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
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
            DB::table('users')->insert([
                'name' => $faker->unique()->name,
                'fname' => $faker->unique()->name,
                'password' => $faker->numberBetween(25,40),
                'jenkel' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                'alamat' => $faker->address,
                'password' => $faker->numberBetween(9,10),
                'nid' => $faker->numberBetween(505114130,99114130),
                'agama' => 'Islam',
                'no_hp'=> $faker->phoneNumber,
                'kelas_id' =>  $faker->numberBetween(1,6),
                'hak_akses' => '4'


            ]);

          }
    }
}
