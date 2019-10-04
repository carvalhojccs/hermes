<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materiais';
    protected $fillable = [
        'embalagem_id',
        'remetente_id',
        'origem_id',
        'destino_id',
        'modal_id',
        'status_id',
        'volume',
        'descricao',
        'peso',
        'data_saida',
        'guia_embarque',
        'ultima_alteracao'
    ];
    
    public function embalagem()
    {
        return $this->belongsTo(Embalagem::class);
    }
    
    public function origem()
    {
        return $this->belongsTo(Origem::class);
    }
    
    public function remetente()
    {
        return $this->belongsTo(Remetente::class);
    }
    
    public function modal()
    {
        return $this->belongsTo(Modal::class);
    }
    
    public function destino()
    {
        return $this->belongsTo(Destino::class);
    }
    
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
