<?php

namespace App\Services;

use App\Services\Interfaces\UserCatalogueServiceInterface;
use PhpParser\Node\Expr\FuncCall;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;





/**
 * Class UserCatlogueService
 * @package App\Services
 */
class UserCatalogueService implements UserCatalogueServiceInterface         
{
     protected $userCatalogueRepository;

    public function __construct(UserCatalogueRepository $userCatalogueRepository)
    {
        $this->userCatalogueRepository = $userCatalogueRepository;
    }

    // Lấy danh sách bản ghi
    public function paginate($request)
    {
        
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perpage = $request->integer('perpage');

        $userCatalogues = $this->userCatalogueRepository->pagination(
            $this->paginateSelect(),
            $condition,[],
            ['path' => 'user/catalogue/index'],
            $perpage,['users']
        );
        return $userCatalogues;
    }

    //them moi bang ghi
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            $user = $this->userCatalogueRepository->create($payload);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }

    //cap nhat bang ghi
    public function update($id, $request)
    {
        DB::beginTransaction();
        try {

            $payload = $request->except(['_token', 'send']);

            $user = $this->userCatalogueRepository->update($id, $payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }

    //xoa bang ghi
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $user = $this->userCatalogueRepository->delete($id);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function updateStatus($post = [])
    {
        DB::beginTransaction();
        try {
            $payload[$post['field']] = (($post['value'] == 1)?2:1);
      
            $user = $this->userCatalogueRepository->update($post['modelId'], $payload);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function updateStatusAll($post)
    {
           DB::beginTransaction();
        try {
            $payload[$post['field']] = $post['value'];
            $flag = $this->userCatalogueRepository->updateByWhereIn('id',$post['id'],$payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }

    //chuyen doi ngay thang
    private function convertBirthdayDate($birthday = '')
    {
        $carbonDate = \Carbon\Carbon::createFromFormat('Y-m-d', $birthday);
        $birthday = $carbonDate->format('Y-m-d H:i:s');
        return $birthday;
    }

    //phân trang
    public function paginateSelect()
    {
        return ['id', 'name','description','publish'];
    }
}
