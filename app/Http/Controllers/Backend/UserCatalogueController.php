<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService;




use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserCatalogueController extends Controller
{
    protected $userCatalogueService;
    protected $userCatalogueRepository;



    public function __construct(
        UserCatalogueService $userCatalogueService,

    ){
        $this->userCatalogueService = $userCatalogueService;
    }
    public function index(Request $request) {
        $userCatalogues = $this->userCatalogueService->paginate($request);
        
        
        
        $config =  [
            'js' => [
                'Backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js'
            ],
            'css' =>[
                'Backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ]
            ];
        $config['seo'] = config('apps.userCatalogue');
        $template = 'Backend.user.catalogue.index';
        return view('backend.dashboard.layout',compact(
            'template',
             'config',
             'userCatalogues',
        ));
    }

//     public function create() {
//         $province = $this->provinceRepository->all();
//         $config = [
//             'css' => [
//                 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
//             ],
//             'js' => [
//                 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
//                 'backend/library/location.js',
//             ]
//         ];
//         $config['seo'] = config('apps.user');
//          $config['method'] = 'create'; 
//         $template = 'backend.user.catalogue.createandedit';
//         return view('backend.dashboard.layout',compact(
//             'template',
//             'config',
//             'province'
//         ));
//     }

//     public function store(StoreUserRequest $request) {
//        if($this->userCatalogueService->create($request)){
//          return redirect()->route('user.index')->with('success', 'Thêm mới bản ghi thành công');
//        } 
//        return redirect()->route('user.index')->with('error', 'Thêm mới bản ghi không thành công.Hãy thử lại sau');
//     }

//     public function edit($id) {
//         $user = $this->userCatalogueRepository->findById($id);
//         $province = $this->provinceRepository->all();
//         $config = [
//             'css' => [
//                 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
//             ],
//             'js' => [
//                 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
//                 'backend/library/location.js',
//             ]
//         ];
//         $config['seo'] = config('apps.user');
//         $config['method'] = 'edit';
//         $template = 'backend.user.catalogue.createandedit';
//         return view('backend.dashboard.layout',compact(
//             'template',
//             'config',
//             'province',
//             'user'
//         ));
//     }

//    public function update($id, UpdateUserRequest $request) {
//     if($this->userCatalogueService->update($id,$request)){
//          return redirect()->route('user.index')->with('success', 'Cập nhật bản ghi thành công');
//        } 
//        return redirect()->route('user.index')->with('error', 'Cập nhật bản ghi không thành công.Hãy thử lại sau');
//     }

//     public function delete($id) {
//         $config['seo'] = config('apps.user');
//         $user = $this->userCatalogueRepository->findById($id);
//         $template = 'backend.user.catalogue.delete';
//         return view('backend.dashboard.layout',compact(
//             'template',
//             'user',
//             'config'
//         ));
//     }

//    public function destroy($id)
// {
//     if ($this->userCatalogueService->destroy($id)) {
//         return redirect()->route('user.index')->with('success', 'Xóa bản ghi thành công');
//     }

//     return redirect()->route('user.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại sau');
// }

}


