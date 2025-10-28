<?php

namespace App\Repositories;

use PhpParser\Node\Expr\FuncCall;
use App\Models\Language;
use App\Repositories\Interfaces\LanguageRepositoryInterface;
use App\Repositories\BaseRepository;
 



/**
 * Class LanguageService
 * @package App\Services
 */
class LanguageRepository extends BaseRepository implements LanguageRepositoryInterface
{

     protected $model; 
       //nhớ truyền bảng cho đúng
      public function __construct(
        Language $model //nhớ truyền bảng cho đúng district
      ){
        $this->model = $model;
      }


}