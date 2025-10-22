@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
<form action="{{ route('user.destroy', $user->id )}}" method="post" class="box">
    @csrf
    @method('DELETE')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <!-- Cột trái -->
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Bạn đang muốn xóa thành vin có email là: {{ $user->email }}</p>
                        <p>- Lưu ý: Không thể khôi phcụ sau khi xóa. Hãy chắc chắn bạn muốn xóa</p>
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
                                        placeholder="Nhập địa chỉ email" autocomplete="off" readonly >
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="name" class="control-label text-left">
                                        Họ và tên <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" id="name" name="name"
                                        value="{{ old('name', $user->name ?? '') }}" class="form-control"
                                        placeholder="Nhập họ và tên" autocomplete="off" readonly >
                                </div>
                            </div>
                        </div>
                    </div> <!-- end ibox-content -->
                </div> <!-- end ibox -->
            </div>
        </div>
        <div class="text-right mb15">
            <button class="btn btn-danger" type="submit" name="send" value="send">Xóa dữ liệu</button>
        </div>
    </div>
</form>

