@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php
    $url = ($config['method']  == 'create')  ? route('post.catalogue.store') : route('post.catalogue.update', $postCatalogue->id);
@endphp

<form action="{{ $url }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <!-- Cột trái -->
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Nhập thông tin chung của ngôn ngữ</p>
                        <p>Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
                    </div>
                </div>
            </div>

            <!-- Cột phải -->
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông tin chung</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="email" class="control-label text-left">
                                        Tên nhóm <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" id="name" name="name"
                                           value="{{ old('name', $postCatalogue->name ?? '') }}"
                                           class="form-control" placeholder="Nhập tên nhóm" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">
                                       Canonical <span class="text-danger">(*)</span></span>
                                    </label>
                                    <input type="text" id="description" name="canonical"
                                           value="{{ old('canonical', $postCatalogue->canonical ?? '') }}"
                                           class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div> <!-- end ibox-content -->
                </div> <!-- end ibox -->
            </div>
        </div>

        <hr>
        <div class="text-right mb15">
            <button class="btn btn-primary" type="submit" name="send" value="send">Lưu lại</button>
        </div>
    </div>
</form>
