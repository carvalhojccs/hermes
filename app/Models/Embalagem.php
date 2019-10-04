<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Embalagem extends Model
{
    protected $table = 'embalagens';
    protected $fillable = ['descricao'];
}
