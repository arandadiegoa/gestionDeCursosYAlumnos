<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inscripciones', function(Blueprint $table) {
          $table->id();
          $table->foreignId('alumno_id')->constrained('alumnos')->onDelete('cascade');//relacion con alumnos
          $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');//relacion con cursos
          $table->date('fecha_inscripcion');
          $table->enum('estado', ['activo', 'aprobado', 'desaprobado']);
          $table->tinyInteger('nota_final')->nullable();
          $table->integer('asistencias');
          $table->text('observaciones')->nullable();
          $table->boolean('evaluado_por_docente')->default(false);
          $table->unique(['alumno_id', 'curso_id']); //evita duplicidad al intentar inscribirse al mismo curso
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('inscripciones');
    }
};
