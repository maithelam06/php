<table class="table table-striped table-bordered align-middle">
    <thead class="thead-light">
        <tr>
            <th class="text-center" style="width: 40px;">
                <input type="checkbox" id="checkAll" class="input-checkBox">
            </th>
            <th >Tên Nhóm</th>
            <th class="text-center" style="width: 120px;">Tình trạng</th>
            <th class="text-center" style="width: 120px;">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($postCatalogues) && is_object($postCatalogues))
            @foreach ($postCatalogues as $postCatalogue)
                <tr>
                    <td class="text-center">
                        <input type="checkbox" value="{{ $postCatalogue->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>{{  str_repeat('|-----', (($postCatalogue->level > 0) ? ($postCatalogue->level - 1) : 0)) . $postCatalogue->name }}</td>
                    <td class="text-center js-switch-{{ $postCatalogue->id }}">
                        <input type="checkbox" 
                               value="{{ $postCatalogue->publish }}" 
                               class="js-switch status" 
                               data-field="publish" 
                               data-model="PostCatalogue" 
                               data-modelid="{{ $postCatalogue->id }}"
                               {{ $postCatalogue->publish == 2 ? 'checked' : '' }}>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('post.catalogue.edit', $postCatalogue->id) }}" 
                           class="btn btn-success btn-sm" 
                           title="Sửa">
                           <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('post.catalogue.delete', $postCatalogue->id) }}" 
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
    {{ $postCatalogues->links('pagination::bootstrap-4') }}
</div>
