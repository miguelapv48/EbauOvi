<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $usuario = User::create([
        'name'=>'Miguel',
        'email'=>'miguelapv48@educastur.es',
        'email_verified_at' => now(),
        'password'=>bcrypt('miguel')
    ])->assignRole('admin');
    $usuario = User::create([
        'name'=>'Pedro',
        'email'=>'pedro@gmail.com',
        'email_verified_at' => now(),
        'password'=>bcrypt('pedro')
    ])->assignRole('guest');
    }
}
