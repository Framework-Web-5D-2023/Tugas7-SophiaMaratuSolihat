<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        // $data = [
        //     [
        //         'image'    => "default.jpg",
        //         'nama' => "Sophia",
        //         'npm'    => "2110631170037",
        //         'prodi'    => 'Teknik Informatika',
        //         'created_at'    =>  "2003-01-04",
        //     ],
        //     [
        //         'image'    => "default.jpg",
        //         'nama' => "Yani",
        //         'npm'    => "2110631170099",
        //         'prodi'    => 'Sistem Informasi',
        //         'created_at'    =>  "2002-01-01",
        //     ],
        //   ];

            // use the factory to create a Faker\Generator instance
            $faker = Factory::create();
            $data = [];
            for ($i = 0; $i < 10; $i++) {
              $newData = [
                'image'    => "default.jpg",
                'nama' => $faker->name(),
                'npm'    => $faker->randomNumber(9, true),
                'prodi'    => 'Teknik Informatika',
                'created_at'    =>  $faker->date(),
              ];
              $data[] = $newData;
            }
          $this->db->table('mahasiswa')->insertBatch($data);
    }
}
