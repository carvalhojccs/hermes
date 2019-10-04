<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\StatusRepositoryInterface;
use App\Models\Status;

class EloquentStatusRepository extends BaseEloquentRepository implements StatusRepositoryInterface
{
    public function entity()
    {
        return Status::class;
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
    
    public function selectStatus() 
    {
        return $this->entity->pluck('descricao','id');
    }
}
