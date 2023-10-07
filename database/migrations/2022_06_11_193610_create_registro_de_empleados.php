<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroDeEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_de_empleados', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements("id");

            $table->string('codigo_empleado', );
            $table->string('nombre_empleado', 200);
            $table->string('numero_telefono', 13);
            $table->string('correo', 100);
            $table->string('direccion',100);
            $table->string('departamento',50);


            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_de_empleados');
    }
}
