<?php

namespace App\Repositories;

use PhpParser\Node\Expr\FuncCall;
use App\Models\PostCatalogue;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface;
use App\Repositories\BaseRepository;
 



/**
 * Class PostCatalogueService
 * @package App\Services
 */
class PostCatalogueRepository extends BaseRepository implements PostCatalogueRepositoryInterface
{

     protected $model; 
       //nhớ truyền bảng cho đúng
      public function __construct(
        PostCatalogue $model //nhớ truyền bảng cho đúng district
      ){
        $this->model = $model;
      }
      

}