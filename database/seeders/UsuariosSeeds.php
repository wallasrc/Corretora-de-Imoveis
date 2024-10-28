<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'wallas.rocha-castro@hotmail.com')->count()) {
            $user = new User();
        }else{
            $user = User::where('email', 'wallas.rocha-castro@hotmail.com')->first();
        }
        $user->name = "Wallas Castro";
        $user->email = "wallas.rocha-castro@hotmail.com";
        $user->password = bcrypt("123456");
        $user->save();
    }
}
