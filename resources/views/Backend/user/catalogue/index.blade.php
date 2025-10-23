@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['index']['title']]) {{-- tiêu đề --}}

<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            {{-- Tiêu đề bảng --}}
            <div class="ibox-title">
                <h5>{{ $config['seo']['index']['tableHeading'] }}</h5>
                @include('backend.dashboard.component.toolbox', ['model' => 'UserCatalogue'])
            </div>

            {{-- Nội dung bảng --}}
            <div class="ibox-content">
                @include('backend.user.catalogue.component.filter')
                @include('backend.user.catalogue.component.table')
            </div>
        </div>
    </div>
</div>
