<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    use HasFactory;
    protected $table = 'cursos';
    public function programa(){
        return $this->belongsTo(programas::class, 'Programa_id', 'id');
    }
    public function profesor(){
    return $this->belongsTo(profesores::class, 'Profesor_id', 'id');
    }
        
}
