<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 * @package App\Services
 */
class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    //phân trang
    public function pagination(
        array $column = ['*'],
        array $condition = [],
        array $join = [],
        array $extend = [],
        int $perpage = 1
        
    ) {
        $query = $this->model
            ->select($column)
            ->where(function ($query) use ($condition) {
                if (isset($condition['keyword']) && !empty($condition['keyword'])) {
                    $query->where('name', 'like', '%' . $condition['keyword'] . '%');
                }
            });
        if (!empty($join)) {
            $query->join(...$join);
        }
        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL') . $extend['path']);
    }

    //them moi bang ghi
    public function create(array $payload = [])
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }
    public function update(int $id = 0, array $payload = [])
    {
        $model = $this->findById($id);
        return $model->update($payload);
    }

    public function delete(int $id = 0)
    {
        return $this->findById($id)->delete();
    }
    public function forceDelete(int $id = 0)
    {
        return $this->findById($id)->forceDelete();
    }


    public function all()
    {
        return $this->model->all();
    }

    public function findById(
        int $modelId,
        array $column = ['*'],
        array $relation = []
    ) {
        return $this->model->select($column)->with($relation)->findOrFail($modelId);
    }
}
