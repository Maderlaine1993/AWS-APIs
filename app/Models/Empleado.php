<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table='registro_de_empleados';
    public $timestamps=false;
    protected $fillable=[
        'id', 'id_usuario', 'codigo_empleado', 'nombre_empleado', 'numero_telefono', 'correo', 'direccion', 'departamento',
    ];

    protected $primaryKey='id';
}
