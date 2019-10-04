<?php

namespace App\Repositories\Core;

use App\Models\Material;
use App\Repositories\Contracts\MaterialRepositoryInterface;
use DB;

class EloquentMaterialRepository extends BaseEloquentRepository implements MaterialRepositoryInterface
{
    public function entity()
    {
        return Material::class;
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
    
    public function store(array $data) 
    {
       //retorna os dados do ano ativo
       $numeroVolume = DB::table('numeracoes')->where('status','1')->get();
       
       //atribui a próxima numeração ao volume
       $data['volume'] = $numeroVolume[0]->numeracao + 1 ."/". $numeroVolume[0]->ano;
       
       //atualiza a numeracao do volume
       DB::table('numeracoes')->where('id',$numeroVolume[0]->id)->update(['numeracao' => $numeroVolume[0]->numeracao + 1]);
       
       return $this->entity->create($data);
        
    }
}
