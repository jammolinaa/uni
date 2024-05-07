<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('Estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('Identificacion');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('edad');     
            $table->string('correo');
            $table->string('contraseña');
            $table->float('n1')->default(0.0);
            $table->float('n2')->default(0.0);
            $table->float('n3')->default(0.0);
            $table->float('promedio')->default(0.0);
            $table->unsignedBigInteger('Curso_id');
            $table->foreign('Curso_id')->references('id')->on('Cursos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Estudiantes');
    }
};
