<?php

namespace App\Repositories\Contracts;

interface BasicRepositoryContract
{
    public function all();
    public function filter(array $keys, array $relation);
    public function find(int $id);
    public function findWhere($column, $value);
    public function findWhereFirst($column, $value);
    public function pluck($column1, $column2);
    public function paginate(int $num);
    public function create(array $attributes);
    public function update(int $id, array $attributes);
    public function destroy(int $id);
}