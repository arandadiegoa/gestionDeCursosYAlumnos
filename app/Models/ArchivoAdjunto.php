<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchivoAdjunto extends Model
{
    protected $table = 'archivos_adjuntos';

    protected $fillable = [
      'curso_id',
      'titulo',
      'archivo_url',
      'tipo',
      'fecha_subida',
    ];

    protected function casts(): array
    {
      return [
        'fecha_subida' => 'date',
      ];
    }
    
    //Relaciones
    //Relacion con curso
    public function curso()
    {
      return $this->belongsTo(Curso::class);
    }
    
}
