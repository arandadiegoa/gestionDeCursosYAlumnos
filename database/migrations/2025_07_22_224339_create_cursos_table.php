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
        Schema::create('cursos', function(Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('estado', ['activo', 'finalizado', 'cancelado'])->default('activo');
            $table->enum('modalidad', ['presencial', 'virtual', 'hibrido']);
            $table->string('aula_virtual')->nullable(); //es requerido en modalidad virtual o hibridp
            $table->integer('cupos_maximos')->default(30); //cupos por defecto
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade'); //relacion con docente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
