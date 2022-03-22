<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $fillable = [
        'titulo', 'imagen', 'descripcion', 'habilidades', 'categoria_id', 'experiencia_id', 'ubicacion_id', 'salario_id'
    ];

    //relacion 1:1 para Categoria y vacante
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    //relacion 1:1 para salario y vacante
    public function salario(){
        return $this->belongsTo(Salario::class);
    }
    //relacion 1:1 para ubicacion y vacante
    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class);
    }
    //relacion 1:1 para experiencia y vacante
    public function experiencia(){
        return $this->belongsTo(Experiencia::class);
    }
   
     //relacion 1:1 para reclutador y vacante (Pasamos el user_id por que se requiere en las tablas de laravel)
     public function reclutador(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //relacion 1:n para candidatos y vacante
    public function candidatos(){
        return $this->hasMany(Candidato::class);
    }

}
