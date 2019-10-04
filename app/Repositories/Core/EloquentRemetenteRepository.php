<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\RemetenteRepositoryInterface;
use App\Models\Remetente;

class EloquentRemetenteRepository extends BaseEloquentRepository implements RemetenteRepositoryInterface
{
    public function entity()
    {
        return Remetente::class;
    }
    public function search(array $filters)
    {
        return $this->entity->where(function($query) use($filters){
            if($filters['sigla']):
                $query->where('sigla','LIKE',"%{$filters['sigla']}%");
            endif;
            
            if($filters['nome']):
                $query->orWhere('nome','LIKE',"%{$filters['nome']}%");
            endif;
        })->paginate();
    }
    
    public function selectRemetentes() 
    {
        return $this->entity->pluck('sigla','id');
    }
}
