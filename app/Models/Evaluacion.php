<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'evaluaciones';

    protected $fillable = [
      'alumno_id',
      'curso_id',
      'descripcion',
      'nota',
      'fecha',
    ];

    protected function casts(): array
    {
      return[
        'nota' => 'integer',
        'fecha' => 'date',
      ];
    }

    //Relaciones
    //Relacion con Alumnos uno a muchos inversa
    public function alumno()
    {
      return $this->belongsTo(Alumno::class);
    }

    //Relacion con Cursos uno a muchos inversa
    public function curso()
    {
      return $this->belongsTo(Curso::class, 'curso_id');
    }
}
