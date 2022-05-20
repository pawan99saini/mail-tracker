<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            'name'=>'Admin User',
            'email'=>'admin@gmail.com',
            'password'=> bcrypt('123456'),
        ];
         Admin::create($data);

    }
}
