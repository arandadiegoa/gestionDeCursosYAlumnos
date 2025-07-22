<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';

    protected $fillable = [
      'nombre',
      'apellido',
      'dni',
      'email',
      'especialidad',
      'telefono',
      'direccion',
      'activo'
    ];

    protected function casts(): array
    {
      return [
        'activo' => 'boolean',
      ];
    }

    //Funciones
    //hasMany permite hacer la relacion de uno a muchos
    public function cursos()
    {
      return $this->hasMany(Curso::class); //Un docente puede tener muchos cursos
    }

    
    //Scope para validar docentes activos
    public function scopeActivos($query)
    {
      return $query->where('activo', true);
    }

    //Validaciones
    public function puedeAsignarseCursos()
    {
      return $this->activo &&
             $this->cursos()
             ->where('estado', 'activo')
             ->count() < 3;
    }

}
