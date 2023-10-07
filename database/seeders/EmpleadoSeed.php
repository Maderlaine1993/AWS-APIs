<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Seeder;

class EmpleadoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleado = new Empleado;
        $empleado->id_usuario = 1;
        $empleado->codigo_empleado = '12';
        $empleado->nombre_empleado = 'Victor Castillo';
        $empleado->numero_telefono = '42149378';
        $empleado->correo = 'Victor@gmail.com';
        $empleado->direccion = 'Col. el Inde';
        $empleado->departamento = 'Izabal';
        $empleado->save();

        $empleado = new Empleado;
        $empleado->id_usuario = 2;
        $empleado->codigo_empleado = '13';
        $empleado->nombre_empleado = 'Esther Castillo';
        $empleado->numero_telefono = '45149368';
        $empleado->correo = 'Esther@gmail.com';
        $empleado->direccion = 'Col. el Inde frente las plantas';
        $empleado->departamento = 'Chiquimula';
        $empleado->save();

    }
}
