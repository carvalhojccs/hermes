<?php

namespace App\Repositories\Contracts;

interface RepositotyInterface
{
    public function getAll();
    public function findById($id);
    public function findWhere($column,$value);
    public function findWhereFirst($column,$value);
    public function paginate($totalPage = 10);
    public function store(array $data);
    public function update($id, array $data);
    public function delete($id);
}