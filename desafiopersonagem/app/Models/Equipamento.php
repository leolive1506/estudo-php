<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    protected $table = 'equipamentos';
    public $timestamps = false;

    public $fillable = [
        'nome',
        'tipo_equipamento_id',
    ];

    public function tipo_equipamento()
    {
        return $this->belongsTo(TipoEquipamento::class, 'tipo_equipamento_id');
    }

    public function personagem()
    {
        $this->belongsToMany(Personagem::class, 'personagem_equipamento', 'equipamento_id', 'personagem_id');
    }

}
