<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personagem extends Model
{
    use HasFactory;

    protected $table = 'personagens';

    public $timestamps = false;
    protected $fillable = ['nome', 'raca_id', 'classe_id', 'level_personagem', 'observacoes'];

    // um p um
    public function raca()
    {
        return $this->belongsTo(Raca::class, 'raca_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function equipamentos()
    {
        return $this->belongsToMany(Equipamento::class, 'personagem_equipamento', 'personagem_id', 'equipamento_id');
    }


}
