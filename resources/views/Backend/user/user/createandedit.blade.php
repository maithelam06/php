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
  $url = ($config['method']  == 'create')  ? route('user.store') : route('user.update', $user->id);
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
                        <p>- Nhập thông tin chung của người sử dụng</p>
                        <p>- Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
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

                        <!-- Hàng 1: Email + Họ tên -->
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="email" class="control-label text-left">
                                        Email <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" id="email" name="email"
                                        value="{{ old('email', $user->email ?? '') }}" class="form-control"
                                        placeholder="Nhập địa chỉ email" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="name" class="control-label text-left">
                                        Họ và tên <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" id="name" name="name"
                                        value="{{ old('name', $user->name ?? '') }}" class="form-control"
                                        placeholder="Nhập họ và tên" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <!-- Hàng 2: Nhóm thành viên + Ngày sinh -->

                        @php
                            $userCatalogue = ['Chọn Nhóm Thành Viên', 'Quản trị viên', 'Cộng tác viên'];

                        @endphp
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row"> <label for="user_catalogue_id" class="control-label text-left">
                                        Nhóm Thành Viên <span class="text-danger">(*)</span> </label> <select
                                        name="user_catalogue_id" id="user_catalogue_id"
                                        class="form-control setupSelect2">
                                        @foreach ($userCatalogue as $key => $item)
                                            <option
                                                {{ $key == old('user_catalogue_id', isset($user->user_catalogue_id) ? $user->user_catalogue_id : '') ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select> </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="birthday" class="control-label text-left">
                                        Ngày sinh
                                    </label>
                                    <input type="date" id="birthday" name="birthday"
                                       value="{{ old('birthday', isset($user->birthday) ? date('Y-m-d', strtotime($user->birthday)) : '') }}"
                                        class="form-control" placeholder="Nhập ngày sinh" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <!-- Hàng 3: Mật khẩu + Nhập lại mật khẩu -->
                        @if($config['method']== 'create')
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="password" class="control-label text-left">
                                        Mật khẩu <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="password" id="password" name="password" value=""
                                        class="form-control" placeholder="Nhập mật khẩu" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="re_password" class="control-label text-left">
                                        Nhập lại mật khẩu <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="password" id="re_password" name="re_password" value=""
                                        class="form-control" placeholder="Nhập lại mật khẩu" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- Hàng 4: Ảnh đại diện -->
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="image" class="control-label text-left">
                                        Ảnh đại diện
                                    </label>
                                    <input type="text" name="image" value="{{ old('image', $user->name ?? '') }}"
                                        class="form-control input-image" placeholder="" autocomplete="off"
                                        data-upload="Images">
                                </div>
                            </div>
                        </div>

                    </div> <!-- end ibox-content -->
                </div> <!-- end ibox -->
            </div>
        </div>
        <hr>
        <div class="row">
            <!-- Cột trái -->
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin liên hệ</div>
                    <div class="panel-description">
                        Nhập thông tin liên hệ của người sử dụng
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

                        <!-- Hàng 1: Thành phố -->
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">
                                        Thành phố
                                    </label>
                                    <select name="province_id" class="form-control setupSelect2 province location"
                                        data-target="districts">
                                        <option value="0">[Chọn Thành Phố]</option>
                                        @if (isset($province))
                                            @foreach ($province as $item)
                                                <option @if (old('province_id') == $item->code) selected @endif
                                                    value="{{ $item->code }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left ">
                                        Quận/Huyện
                                    </label>
                                    <select name="district_id" class="form-control districts setupSelect2 location"
                                        data-target="wards">
                                        <option value="0">[Chọn Quận/Huyện]</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Hàng 2: Phường/Xã + Địa chỉ -->
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">
                                        Phường/Xã
                                    </label>
                                    <select name="ward_id" class="form-control setupSelect2 wards">
                                        <option value="0">[Chọn Phường/Xã]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">
                                        Địa Chỉ
                                    </label>
                                    <input type="text" name="address" value="{{ old('address',($user->address) ?? '') }}"
                                        class="form-control" placeholder="Nhập địa chỉ" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <!-- Hàng 3: SĐT + Ghi chú -->
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">
                                        Số điện thoại
                                    </label>
                                    <input type="text" name="phone" value="{{ old('phone',($user->phone) ?? '') }}"
                                        class="form-control" placeholder="Nhập số điện thoại" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="re_password" class="control-label text-left">
                                        Ghi Chú
                                    </label>
                                    <input type="text" name="description" value="{{ old('description',($user->description) ?? '') }}"
                                        class="form-control" placeholder="Nhập ghi chú" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div> <!-- end ibox-content -->
                </div> <!-- end ibox -->
            </div>
        </div>
        <div class="text-right mb15">
            <button class="btn btn-primary" type="submit" name="send" value="send">Lưu Lại</button>
        </div>
    </div>
</form>

<script>
    var province_id = '{{ (isset($user->province_id )) ? $user->province_id  : old ('province_id')  }}'
    var district_id = '{{ (isset($user->district_id )) ? $user->district_id  : old ('district_id')  }}'
    var ward_id = '{{ (isset($user->ward_id )) ? $user->ward_id  : old ('ward_id')  }}'
</script>