<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User;
        $usuario->name = 'Karol';
        $usuario->email = 'karolc@umg.edu.gt';
        $usuario->password = bcrypt('12345678');
        $usuario->save();

        $usuario = new User;
        $usuario->name = 'Oscar';
        $usuario->email = 'oscar@umg.edu.gt';
        $usuario->password = bcrypt('12345678');
        $usuario->save();
    }
}
