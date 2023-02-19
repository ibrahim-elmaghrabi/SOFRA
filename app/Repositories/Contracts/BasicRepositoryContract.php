<?php

namespace App\Repositories\Contracts;

interface BasicRepositoryContract
{
    public function all();
    public function allByFilter(array $keys, array $relation);
    public function find(int $id);
    public function findWhere($column, $value);
    public function findWhereFirst($column, $value);
    public function create(array $attributes);
    public function update(int $id, array $attributes);
    public function destroy(int $id);
}