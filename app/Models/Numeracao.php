<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Numeracao extends Model
{
    protected $table = 'numeracoes';
    protected $fillable = ['ano','numeracao','status'];
}
