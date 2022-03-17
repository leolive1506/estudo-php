<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEquipamento extends Model
{
    use HasFactory;

    protected $table = 'tipos_equipamentos';

    public $timestamps = false;
    public $fillable = ['nome'];

    public function Equipamentos()
    {
        return $this->hasMany(Equipamento::class, 'tipo_equipamento_id');
    }
}
