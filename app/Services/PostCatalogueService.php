<?php

namespace App\Services;

use App\Services\Interfaces\PostCatalogueServiceInterface;
use App\Services\BaseService;
use PhpParser\Node\Expr\FuncCall;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface as PostCatalogueRepository;
use Faker\Provider\Base;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Classes\Nestedsetbie;

/**
 * Class UserCatlogueService
 * @package App\Services
 */
class PostCatalogueService extends BaseService implements PostCatalogueServiceInterface
{
    protected $postCatalogueRepository;
    protected $nestedset;

    public function __construct(
        PostCatalogueRepository $postCatalogueRepository,

    ) {
        $this->postCatalogueRepository = $postCatalogueRepository;
        $this->nestedset = New Nestedsetbie([
            'table' => 'post_catalogues',
            'foreignkey' => 'post_catalogue_id',
            'language_id' => $this->currentLanguage(),
        ]);
    }

    // Lấy danh sách bản ghi
    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perpage = $request->integer('perpage');

        $postCatalogues = $this->postCatalogueRepository->pagination(
            $this->paginateSelect(),
            $condition,
            [
                ['post_catalogue_language as tb2','tb2.post_catalogue_id', '=' ,'post_catalogues.id']
            ],
            ['path' => 'post.catalogue.index'],
            $perpage,
            [],
            [
                'post_catalogues.lft' , 'ASC'
            ]
        );
        return $postCatalogues;
    }

    //them moi bang ghi
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->only($this->payload());

            // dd($payload);
            $payload['user_id'] = Auth::id();
            $postCatalogue = $this->postCatalogueRepository->create($payload);
            if ($postCatalogue->id > 0) {
                $payloadLanguage = $request->only($this->payloadLanguage());
                $payloadLanguage['language_id'] = $this->currentLanguage();
                $payloadLanguage['post_catalogue_id'] = $postCatalogue->id;

                $language = $this->postCatalogueRepository->createLanguagePivot($postCatalogue, $payloadLanguage);

                // dd($language);
            }
            $this->nestedset->Get('level ASC, order ASC');
            $this->nestedset->Recursive(0, $this->nestedset->Set());
            $this->nestedset->Action();


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
            $postCatalogue = $this->postCatalogueRepository->update($id, $payload);
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
            $postCatalogue = $this->postCatalogueRepository->delete($id);
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
            $postCatalogue = $this->postCatalogueRepository->update($post['modelId'], $payload);
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
            $flag = $this->postCatalogueRepository->updateByWhereIn('id', $post['id'], $payload);
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

    private function changeUserStatus($post, $value)
    {
        DB::beginTransaction();
        try {
            $array = [];
            if (isset($post['modelId'])) {
                $array[] = $post['modelId'];
            } else {
                $array = $post['id'];
            }
            $payload[$post['field']] = $value;
            $this->postCatalogueRepository->updateByWhereIn('id', $array,  $payload);
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

    //phân trang
    public function paginateSelect()
    {
        return [
            'post_catalogues.id',
            'post_catalogues.publish',
            'post_catalogues.image',
            'post_catalogues.level',
            'post_catalogues.order',
            'tb2.name',
            'tb2.canonical',
            
        ];
    }

    private function payload()
    {
        return [
            'parent_id',
            'follow',
            'publish',
            'image'
        ];
    }
    private function payloadLanguage()
    {
        return [
            'name',
            'description',
            'content',
            'meta_title',
            'meta_keyword',
            'meta_description',
            'canonical'
        ];
    }
}
