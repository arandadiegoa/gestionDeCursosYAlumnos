<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';

    protected $fillable = [
      'alumno_id',
      'curso_id',
      'fecha_inscripcion',
      'estado',
      'nota_final',
      'asistencias',
      'observaciones',
      'evaluado_por_docente'
    ];

    protected function casts(): array 
    {
      return [
        'fecha_inscripcion' => 'date',
        'asistencias' => 'integer',
        'evaluado_por_docente' => 'boolean',
      ];
    }

    //Relaciones 
    //Relacion con Alumnos
    public function Alumnos()
    {
      return $this->belongsTo(Alumno::class);
    }

    //Relacion con Cursos
    public function Cursos()
    {
      return $this->belongsTo(Curso::class);
    }





}
