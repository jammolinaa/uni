<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Cursos', function (Blueprint $table) {
            $table->id();
            $table->string('Curso');
            $table->unsignedBigInteger('Programa_id');
            $table->unsignedBigInteger('Profesor_id');
            $table->float('promedio_curso')->default(0.0);
            $table->foreign('Programa_id')->references('id')->on('programas')->onDelete('cascade');
            $table->foreign('Profesor_id')->references('id')->on('profesores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Cursos');
    }
};
