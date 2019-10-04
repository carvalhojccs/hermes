<?php

namespace App\Repositories\Contracts;


interface StatusRepositoryInterface 
{
    public function search(array $filters);
}
