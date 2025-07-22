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

    protected function casts(): array
    {
      return [
        'fecha_de_nacimiento' => 'date',
        'activo' => 'boolean',
      ];
    }


    //Relaciones 

    public function inscripciones()
    {
      return $this->hasMany(Inscripcion::class); //Un alumno puede inscribirse a muchos cursos
    }


    public function cursos()
    {
      return $this->belongsToMany(Curso::class, 'inscripciones') //relacion muchos a muchos
                  ->withTimestamps() //Sirve, para saber cuándo se inscribió el alumno.
                  ->withPivot([ //campos adicionales
                      'estado',
                      'nota_final',
                      'asistencias',
                      'evaluado_por_docente',
                      'observaciones'
                  ]);
    }

}
