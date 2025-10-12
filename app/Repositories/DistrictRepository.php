<?php

namespace App\Repositories;

use PhpParser\Node\Expr\FuncCall;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Models\District;

 



/**
 * Class DistrictService
 * @package App\Services
 */
class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
      protected $model;  //nhớ truyền bảng cho đúng
      public function __construct(
        District $model //nhớ truyền bảng cho đúng district
      ){
        $this->model = $model;
      }
      public function findDistrictByProvinceId(int $province_id =0) {
        return $this->model->where('province_code', $province_id)->get();
      }

}
