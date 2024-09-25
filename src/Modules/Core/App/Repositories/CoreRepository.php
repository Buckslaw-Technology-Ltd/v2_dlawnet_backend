<?php

namespace Modules\Core\App\Repositories;

use Modules\Core\App\Interfaces\CoreRepositoryInterface;

class CoreRepository implements CoreRepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all()
    {
        // TODO: Implement all() method.
        return $this->model::all();
    }

    public function allWithRelation($with = [])
    {
        return $this->model::with($with)->get();
    }


    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
        return $this->model::where('id', $id)->update($data);
    }

    // For soft deleting which will aid in audit trail
    public function delete($id)
    {
        return $this->model::where('id', $id)->delete();
    }

    public function remove($id)
    {
        return $this->model::where('id', $id)->forceDelete();
    }

    /**
     * @param $condition , holds the db field
     * @param $query , holds the query value
     * @param array $with
     * @return mixed
     */
    public function queryWithACondition($condition, $query, array $with)
    {
        return $this->model::with($with)->where($condition, $query)->simplePaginate(25);
    }

    public function show($id, array $with)
    {
        return $this->model::with($with)->where('id', $id)->get();
    }

    public function findTheFirstOne($condition, $query, array $with = [])
    {
        return $this->model::with($with)->where($condition, $query)->first();
    }

    public function findById($query, array $columns = null)
    {
        return $this->model::where('id', $query)->get($columns);
    }

    public function firstOrCreate(array $data)
    {
        return $this->model->firstOrCreate($data);
    }

    public function count(): int
    {
        return $this->model->count();
    }

    public function latest()
    {
        return $this->model = $this->model->latest();

    }

    public function trashRecords()
    {
        return $this->model::onlyTrashed()->get();
    }

    public function restoreRecord($id)
    {
        $record = $this->model::withTrashed()->find($id);
        return $record->restore();
    }

    /**
     * Fetch a specific column
     */

    public function find($condition, $query, array $columns = null, $orderBy = 'created_at', array $with = [])
    {
        return $this->model::with($with)->where($condition, $query)->orderBy($orderBy)->get($columns);
    }

}
