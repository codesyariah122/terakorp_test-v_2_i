<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $administrator = new \App\Models\User;
        $administrator->username = "terakorp";
        $administrator->nama = "Tera Administrator";
        $administrator->email = "tera.admin@terakorp.test";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make("tera123654");
        $administrator->avatar = "default.png";
        $administrator->alamat = "Jl. Rajamantri";
        $administrator->telepon = "+6288222668778";
        
        $administrator->save();

        $this->command->info("User Admin berhasil diinsert");
    }

}
