<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('misis')->insert([
            'Image' => '20211219021353.png',
            'text' => 'Wilayah',
            'visi' =>'Desa Marengan Daya merupakan salah satu desa yang ada di Kecamatan Kota Sumenep Kabupaten Sumenep dengan luas wilayah 108 meter persegi. Sebelah utara berbatasan dengan Parsanga, sebelah selatan berbatasan dengan Desa Marengan Laok, sebelah barat berbatasan dengan Desa Pabian, dan sebelah timur berbatasan dengan Desa Kalimook.',
            'misi' =>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe rerum distinctio ipsa veniam impedit' 
        ]);
    }
}

