<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\OrigemRepositoryInterface;
use App\Models\Origem;

class EloquentOrigemRepository extends BaseEloquentRepository implements OrigemRepositoryInterface
{
    public function entity()
    {
        return Origem::class;
    }
    public function search(array $filters)
    {
        return $this->entity->where(function($query) use($filters){
            if($filters['campo1']):
                $query->where('campo1','LIKE',"%{$filters['campo1']}%");
            endif;
            
            if($filters['campo2']):
                $query->orWhere('campo2','LIKE',"%{$filters['campo2']}%");
            endif;
        })->paginate();
    }
    
    public function selectOrigens() 
    {
        return $this->entity->pluck('descricao','id');
    }
}
