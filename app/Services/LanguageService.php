<?php

namespace App\Services;

use App\Services\Interfaces\LanguageServiceInterface;
use PhpParser\Node\Expr\FuncCall;
use App\Repositories\Interfaces\LanguageRepositoryInterface as LanguageRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;





/**
 * Class UserCatlogueService
 * @package App\Services
 */
class LanguageService implements LanguageServiceInterface
{
    protected $languageRepository;

    public function __construct(
        LanguageRepository $languageRepository,
    ) {
        $this->languageRepository = $languageRepository;
    }

    // Lấy danh sách bản ghi
    public function paginate($request)
    {

        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perpage = $request->integer('perpage');

        $languages = $this->languageRepository->pagination(
            $this->paginateSelect(),
            $condition,
            [],
            ['path' => 'language/index'],
            $perpage,
            []
        );
        return $languages;
    }

    //them moi bang ghi
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            $payload['user_id'] = Auth::id();
            $language = $this->languageRepository->create($payload);
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

            $language = $this->languageRepository->update($id, $payload);
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
            $language = $this->languageRepository->delete($id);

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
            $payload[$post['field']] = (($post['value'] == 1) ? 2 : 1);
            $language = $this->languageRepository->update($post['modelId'], $payload);
            // $this->changeUserStatus($post,  $payload[$post['field']]);

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
            $flag = $this->languageRepository->updateByWhereIn('id', $post['id'], $payload);
            $this->changeUserStatus($post, $post['value']);
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
    // private function changeUserStatus($post, $value)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $array = [];
    //         if (isset($post['modelId'])) {
    //             $array[] = $post['modelId'];
    //         } else {
    //             $array = $post['id'];
    //         }
    //         $payload[$post['field']] = $value;
    //         $this->userRepository->updateByWhereIn('user_catalogue_id', $array,  $payload);
    //         DB::commit();
    //         return true;
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         // Log::error($e->getMessage());
    //         echo $e->getMessage();
    //         die();
    //         return false;
    //     }
    // }



    //phân trang
    public function paginateSelect()
    {
        return ['id', 'name', 'canonical', 'publish'];
    }
}
