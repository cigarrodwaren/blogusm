<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            "name"=> "Perfil Administrador",
            "email"=> "admin@acme.cl",
            'password' => bcrypt('12345678'),
            'is_admin' => 1,
        ]);
        User::create([
            "name"=> "Usuario",
            "email"=> "user@acme.cl",
            'password' => bcrypt('12345678'),
            'is_admin' => 0,
        ]);
        //User::factory(99)->create();
    }
}
