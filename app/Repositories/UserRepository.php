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

    

}