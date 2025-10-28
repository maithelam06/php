<table class="table table-striped table-bordered align-middle">
    <thead class="thead-light">
        <tr>
            <th class="text-center" style="width: 40px;">
                <input type="checkbox" id="checkAll" class="input-checkBox">
            </th>
            <th style="width:100px">Ảnh</th>
            <th >Tên ngôn ngữ</th>
            <th >Canonical</th>
        
            <th>Mô Tả</th>
            <th class="text-center" style="width: 120px;">Tình trạng</th>
            <th class="text-center" style="width: 120px;">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($languages) && $languages->count() > 0)
            @foreach ($languages as $language)
                <tr>
                    <td class="text-center">
                        <input type="checkbox" value="{{ $language->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        <span class="image img-cover"><img src="{{ $language->image }}" alt=""></span>
                    </td>
                    <td>{{ $language->name }}</td>
                    <td>{{ $language->canonical }}</td>
                    <td>{{ $language->description }}</td>
                    <td class="text-center js-switch-{{ $language->id }}">
                        <input type="checkbox" 
                               value="{{ $language->publish }}" 
                               class="js-switch status" 
                               data-field="publish" 
                               data-model="Language" 
                               data-modelid="{{ $language->id }}"
                               {{ $language->publish == 2 ? 'checked' : '' }}>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('language.edit', $language->id) }}" 
                           class="btn btn-success btn-sm" 
                           title="Sửa">
                           <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('language.delete', $language->id) }}" 
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
    {{ $languages->links('pagination::bootstrap-4') }}
</div>
