<?php

namespace App\Repositories;

use PhpParser\Node\Expr\FuncCall;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\BaseRepository;
 



/**
 * Class UserService
 * @package App\Services
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{

     protected $model; 
       //nhớ truyền bảng cho đúng
      public function __construct(
        User $model //nhớ truyền bảng cho đúng district
      ){
        $this->model = $model;
      }

    public function getAllPaginate() {
        // return User::paginate(15);
    }

    public function pagination(
        array $column = ['*'],
        array $condition = [],
        array $join = [],
        array $extend = [],
        int $perpage = 1,
        array  $relation = [],
        array $orderBy = []
        
    ) {
      
        $query = $this->model
            ->select($column)
            ->where(function ($query) use ($condition) {
                if (isset($condition['keyword']) && !empty($condition['keyword'])) {
                    $query->where('name', 'like', '%' . $condition['keyword'] . '%')
                    ->orWhere('email', 'like', '%' . $condition['keyword'] . '%')
                    ->orWhere('address', 'like', '%' . $condition['keyword'] . '%')
                    ->orWhere('phone', 'like', '%' . $condition['keyword'] . '%');
                }
               
                if (isset($condition['publish']) && $condition['publish'] != 0) {
                    $query->where('publish', '=', $condition['publish']);
                }
                return $query;
            })->with('user_catalogues');
        if (!empty($join)) {
            $query->join(...$join);
        }
        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL') . $extend['path']);
    }


}