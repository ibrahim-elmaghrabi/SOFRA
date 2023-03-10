<?php

namespace App\Repositories\Eloquent;

use Spatie\QueryBuilder\QueryBuilder;
use App\Repositories\Contracts\BasicRepositoryContract;
use App\Repositories\Exceptions\NoEntityDefined;


abstract class BasicRepository implements BasicRepositoryContract
{
    protected $entity ;
    
    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    protected function resolveEntity()
    {
        if(!method_exists($this, 'entity'))
        {
            throw new NoEntityDefined("Entity Model Not Found");
            
        }
        return app()->make($this->entity());
    }

    public function all()
    {
        return $this->entity->all() ;
    }

    public function filter(array $keys, array $relation = [])
    {
        return QueryBuilder::for($this->entity->with($relation))
        ->allowedFilters($keys)
        ->get();
    }

    public function find(int $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function findWhere($column, $value)
    {
        return $this->entity->where($column,$value)->get();
    }

    public function findWhereFirst($column, $value)
    {
        return $this->entity->where($column,$value)->first();
    }

    public function pluck($column1, $column2)
    {
        return $this->entity->pluck($column1, $column2);
    }

    public function paginate(int $num)
    {
        return $this->entity->paginate($num);
    }

    public function create(array $attributes)
    {
        return $this->entity->create($attributes);
    }

    public function update(int $id, array $attributes)
    {
        return $this->find($id)->update($attributes);
    }

    public function destroy(int $id)
    {
        return $this->find($id)->delete();
    }

}