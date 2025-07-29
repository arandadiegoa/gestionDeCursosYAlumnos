<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = [
      'titulo',
      'descripcion',
      'fecha_inicio',
      'fecha_fin',
      'estado',
      'modalidad',
      'aula_virtual',
      'cupos_maximos',
      'docente_id'
    ];

    protected function casts(): array
    {
      return [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'cupos_maximos' => 'integer',
      ];
    }

    //Funciones
    //Relacion con Docente
    //belongsTo define una relación inversa de muchos a uno
    public function docente()
    {
      return $this->belongsTo(Docente::class); //cada curso tiene asignado un docente
    }

    //Relacion con alumnos, por las inscripciones
    //belongsToMany define una relacion de muchos a muchos
    public function alumnos()
    {
      return $this->belongsToMany(Alumno::class, 'inscripciones')
                  ->withTimestamps()
                  ->withPivot([
                    'estado',
                    'nota_final',
                    'asistencias',
                    'evaluado_por_docente',
                    'observaciones'
                    ]);
    }

    //Validaciones

    public function existenAlumnos()
    {
      return $this->alumnos()->count() > 0;
    }

    public function hayCupoDisponible() 
    {
      return $this->alumnos()
                  ->wherePivot('estado', 'activo')
                  ->count() < $this->cupos_maximos;
    }

    public function puedeFinalizarElCurso()
    {
      return $this->estado === 'activo' && $this->existenAlumnos();
    }

    public function aulaVirtualRequerida() 
    {
      return in_array($this->modalidad, ['virtual', 'hibrido']);
    }

      public function archivosAdjuntos()
    {
        return $this->hasMany(ArchivoAdjunto::class);
    }

}
