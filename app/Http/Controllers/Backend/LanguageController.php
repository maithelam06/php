<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\LanguageServiceInterface as LanguageService;
use App\Repositories\Interfaces\LanguageRepositoryInterface as LanguageRepository;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;


class LanguageController extends Controller
{
    protected $languageService; 
    protected $languageRepository;



    public function __construct(
       LanguageService $languageService,
       LanguageRepository $languageRepository

    ){
        $this->languageService = $languageService;
        $this->languageRepository = $languageRepository;
    }
    public function index(Request $request) {
        $languages = $this->languageService->paginate($request);
        
        
        
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
        $config['seo'] = config('apps.language');
        $template = 'Backend.language.index';
        return view('backend.dashboard.layout',compact(
            'template',
             'config',
             'languages',
        ));
    }

    public function create() {
        $config['seo'] = config('apps.user');
         $config['method'] = 'create'; 
        $template = 'backend.language.createandedit';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
        ));
    }

    public function store(StoreLanguageRequest $request) {
       if($this->languageRepository->create($request)){
         return redirect()->route('language.index')->with('success', 'Thêm mới bản ghi thành công');
       } 
       return redirect()->route('language.index')->with('error', 'Thêm mới bản ghi không thành công.Hãy thử lại sau');
    }

    public function edit($id) {
        $language = $this->languageRepository->findById($id);
        $config['seo'] = config('apps.language');
        $config['method'] = 'edit';
        $template = 'backend.language.createandedit';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'language'
        ));
    }

   public function update($id, UpdateLanguageRequest $request) {
    if($this->languageService->update($id,$request)){
         return redirect()->route('language.index')->with('success', 'Cập nhật bản ghi thành công');
       } 
       return redirect()->route('language.index')->with('error', 'Cập nhật bản ghi không thành công.Hãy thử lại sau');
    }

    public function delete($id) {
        $config['seo'] = config('apps.language');
        $language = $this->languageRepository->findById($id);
        $template = 'backend.language.delete';
        return view('backend.dashboard.layout',compact(
            'template',
            'language',
            'config'
        ));
    }

   public function destroy($id)
{
    if ($this->languageRepository->destroy($id)) {
        return redirect()->route('language.index')->with('success', 'Xóa bản ghi thành công');
    }

    return redirect()->route('language.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại sau');
}

}


