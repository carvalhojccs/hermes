<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\ModalRepositoryInterface;
use App\Models\Modal;

class EloquentModalRepository extends BaseEloquentRepository implements ModalRepositoryInterface
{
    public function entity()
    {
        return Modal::class;
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
    
    public function selectModais() 
    {
        return $this->entity->pluck('descricao','id');
    }
}
