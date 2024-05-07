<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';
    public function cursos(){
        return $this->belongsTo(cursos::class, 'Curso_id', 'id');
    }
  
}
