<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raca extends Model
{
    use HasFactory;

    protected $table = 'racas';

    public $timestamps = false;

    protected $fillable = ['nome'];

    // um p muitos
    public function personagens()
    {
        return $this->hasMany(Personagem::class, 'raca_id');
    }
}
