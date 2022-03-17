<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // definir o nome da table que ele representa
    protected $table = 'posts'; // nome table no banco
    // não precisar passa um a um oc campos
    protected $fillable = ['titulo', 'conteudo', 'tags']; //campos da table exeto id, created_at, updated_at, deleted_at
}