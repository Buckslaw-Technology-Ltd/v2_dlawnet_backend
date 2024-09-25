<?php

namespace Modules\Core\App\Interfaces;

interface CoreRepositoryInterface
{
    public function all();

    public function allWithRelation($with = []);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function remove($id);

    /**
     * @param $condition , holds the db field
     * @param $query , holds the query value
     * @param array $with
     * @return mixed
     */
    public function queryWithACondition($condition, $query, array $with);

    public function show($id, array $with);

    public function findTheFirstOne($condition, $query, array $with = []);

    /**
     * Fetch a specific column
     */
    public function find($condition, $query, array $columns = null, $orderBy = 'created_at', array $with = []);

    public function findById($query, array $columns = null);

    public function firstOrCreate(array $data);

    public function count(): int;

    public function latest();

    public function trashRecords();

    public function restoreRecord($id);

}
