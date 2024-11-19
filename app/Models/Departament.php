<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'nombre', 'presupuesto'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'departament_id'); // Relación inversa
    }
}
