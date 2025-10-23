<table class="table table-striped table-bordered align-middle">
    <thead class="thead-light">
        <tr>
            <th class="text-center" style="width: 40px;">
                <input type="checkbox" id="checkAll" class="input-checkBox">
            </th>
            <th style="width:90px" class="text-center">Ảnh</th>
            <th >Tên Nhóm Thành Viên</th>
            <th class="text-center">Số Thành Viên</th>
            <th>Mô Tả</th>
            <th class="text-center" style="width: 120px;">Tình trạng</th>
            <th class="text-center" style="width: 120px;">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($userCatalogues) && $userCatalogues->count() > 0)
            @foreach ($userCatalogues as $userCatalogue)
                <tr>
                    <td class="text-center">
                        <input type="checkbox" value="{{ $userCatalogue->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td class="text-center">
                        <span class="image img-cover" style="display: inline-block; width: 50px; height: 50px; overflow: hidden; border-radius: 50%;">
                            <img src="https://imgt.taimienphi.vn/cf/Images/tt/2021/8/20/top-anh-dai-dien-dep-chat-39.jpg" 
                                 alt="Avatar" 
                                 style="width: 100%; height: 100%; object-fit: cover;">
                        </span>
                    </td>
                    <td>{{ $userCatalogue->name }}</td>
                   <td> {{ $userCatalogue->users_count }} người </td> 
                    <td>{{ $userCatalogue->description }}</td>
                    <td class="text-center js-switch-{{ $userCatalogue->id }}">
                        <input type="checkbox" 
                               value="{{ $userCatalogue->publish }}" 
                               class="js-switch status" 
                               data-field="publish" 
                               data-model="UserCatalogue" 
                               data-modelid="{{ $userCatalogue->id }}"
                               {{ $userCatalogue->publish == 2 ? 'checked' : '' }}>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('user.catalogue.edit', $userCatalogue->id) }}" 
                           class="btn btn-success btn-sm" 
                           title="Sửa">
                           <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('user.catalogue.delete', $userCatalogue->id) }}" 
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
    {{ $userCatalogues->links('pagination::bootstrap-4') }}
</div>
