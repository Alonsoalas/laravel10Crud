<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'msj',
        'user_id',
        'chirp_id',
        ];


//    relacion entre comentarios y usuarios: Muchos comentarios pertenecen a un usuario
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

//    Relacion entre la tabla chirps y comentarios: Un chirp tiene muchos comentarios
    public function chirps()
    {
        return $this->belongsTo(Chirp::class, 'chirp_id');
    }
}
