<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $table = 'classes';

    public $timestamps = false;
    protected $fillable = ['nome'];

    public function personagens()
    {
        return $this->hasMany(Personagem::class, 'classe_id');
    }
}
