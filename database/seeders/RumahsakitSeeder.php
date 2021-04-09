<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RumahsakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('rumah_sakits')->insert([
            'nama' => 'Rs. Avisena',
            'email' => 'rs.avisena@terakorp.com',
            'alamat' => 'Jl. Melong Raya No. 255',
            'telepon' => '0226785665',
        ]);
    }
}
