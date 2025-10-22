<?php

namespace App\Repositories;

use PhpParser\Node\Expr\FuncCall;
use App\Models\User;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface;
use App\Repositories\BaseRepository;
 



/**
 * Class UserCatalogueService
 * @package App\Services
 */
class UserCatalogueRepository extends BaseRepository implements UserCatalogueRepositoryInterface
{

     protected $model; 
       //nhớ truyền bảng cho đúng
      public function __construct(
        User $model //nhớ truyền bảng cho đúng district
      ){
        $this->model = $model;
      }


}