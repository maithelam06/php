<table class="table table-striped table-bordered align-middle">
    <thead class="thead-light">
        <tr>
            <th class="text-center" style="width: 40px;">
                <input type="checkbox" id="checkAll" class="input-checkBox">
            </th>
            <th style="width:90px" class="text-center">Ảnh</th>
            <th>Họ Tên</th>
            <th>Email</th>
            <th>Số Điện Thoại</th>
            <th>Địa chỉ</th>
            <th class="text-center" style="width: 120px;">Trạng Thái</th>
            <th class="text-center" style="width: 120px;">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($users) && $users->count() > 0)
            @foreach ($users as $user)
                <tr>
                    <td class="text-center">
                        <input type="checkbox" value="{{ $user->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td class="text-center">
                        <span class="image img-cover" style="display: inline-block; width: 50px; height: 50px; overflow: hidden; border-radius: 50%;">
                            <img src="https://imgt.taimienphi.vn/cf/Images/tt/2021/8/20/top-anh-dai-dien-dep-chat-39.jpg" 
                                 alt="Avatar" 
                                 style="width: 100%; height: 100%; object-fit: cover;">
                        </span>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td class="text-center js-switch-{{ $user->id }}">
                        <input type="checkbox" 
                               value="{{ $user->publish }}" 
                               class="js-switch status" 
                               data-field="publish" 
                               data-model="User" 
                               data-modelid="{{ $user->id }}"
                               {{ $user->publish == 1 ? 'checked' : '' }}>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('user.edit', $user->id) }}" 
                           class="btn btn-success btn-sm" 
                           title="Sửa">
                           <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('user.delete', $user->id) }}" 
                           class="btn btn-danger btn-sm" 
                           title="Xóa" 
                           onclick="return confirm('Bạn có chắc muốn xóa thành viên này?')">
                           <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8" class="text-center text-muted">
                    Không có dữ liệu thành viên
                </td>
            </tr>
        @endif
    </tbody>
</table>

{{-- Phân trang --}}
<div class="d-flex justify-content-end">
    {{ $users->links('pagination::bootstrap-4') }}
</div>
