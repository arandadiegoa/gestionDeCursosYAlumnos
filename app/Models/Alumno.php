<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';

    protected $fillable = [
      'nombre',
      'apellido',
      'dni',
      'email',
      'fecha_de_nacimiento',
      'telefono',
      'direccion',
      'genero',
      'activo'
    ];

    protected function casts(): array //convierte automaticamente atributos
    {
      return [
        'fecha_de_nacimiento' => 'date',
        'activo' => 'boolean',
      ];
    }


    //Funciones

    //Relacion con inscripciones
    //hasMany permite hacer la relacion de uno a muchos
    public function inscripciones()
    {
      return $this->hasMany(Inscripcion::class); //Un alumno puede inscribirse a muchos cursos
    }


    //Relacion con cursos a traves de inscripciones
    //belongsToMany permite relacion muchos a muchos
    public function cursos()
    {
      return $this->belongsToMany(Curso::class, 'inscripciones')
                  ->withTimestamps() //Sirve, para saber cuándo se inscribió el alumno.
                  ->withPivot([ //campos adicionales, disponibles cuando accedés a los cursos del alumno.
                      'estado',
                      'nota_final',
                      'asistencias',
                      'evaluado_por_docente',
                      'observaciones'
                  ]);
    }

    //Scope para validar alumnos activos
    public function scopeActivos($query)
    {
      return $query->where('activo', true);
    }

    
    //Validaciones
    public function esMayorDe16()
    {
      return $this->fecha_de_nacimiento?->age >=16;
    }

    public function puedeInscribirse()
    {
      return $this->activo &&
             $this->inscripciones()
             ->where('estado', 'activo')
             ->count() < 5;
    }

}
