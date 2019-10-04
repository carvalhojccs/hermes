<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\EmbalagemRepositoryInterface;
use App\Models\Embalagem;

class EloquentEmbalagemRepository extends BaseEloquentRepository implements EmbalagemRepositoryInterface
{
    public function entity()
    {
        return Embalagem::class;
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
    
    public function selectEmbalagens() 
    {
        return $this->entity->pluck('descricao','id');
    }
}
