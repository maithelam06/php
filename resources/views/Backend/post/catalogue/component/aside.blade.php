 <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="email" class="control-label text-left">
                                        Chọn danh mục cha <span class="text-danger">(*)</span></label>
                                    <span class="text-danger notice" mb10> * Chọn root nếu không có danh mục cha</span>
                                    <select name="parent_id" class="form-control setupSelect2" id="">
                                        @foreach ($dropdown as $key => $val)
                                        <option {{ $key == old('parent_id', isset($postCatalogue->parent_id) ? $postCatalogue->publish : '') ? 'selected' : '' }} value="{{ $key }}">{{ $val }} value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end ibox-content -->
                </div> <!-- end ibox -->
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Chọn ảnh dại diện</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <span class=" image img-cover image-taget"><img src="{{ old('image') ?? 'backend/img/image.jpg' }}"
                                            alt=""></span>
                                    <input type="hidden" name="image" value="{{ old('image', $postCatalogue->image ?? '') }}">
                                </div>

                            </div>
                        </div>
                    </div> <!-- end ibox-content -->
                </div>
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Cấu Hình Nâng Cao</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <div class="mb15">
                                        <select name="publish" class="form-control setupSelect2" id="">
                                        @foreach(config('apps.general.publish') as $key => $val)
                                        <option {{ $key == old('publish', isset($postCatalogue->publish) ? $postCatalogue->publish : '') ? 'selected' : '' }} value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                     <select name="follow" class="form-control setupSelect2" id="">
                                        @foreach(config('apps.general.follow') as $key => $val)
                                        <option {{ $key == old('follow', isset($postCatalogue->follow) ? $postCatalogue->follow : '') ? 'selected' : '' }} value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end ibox-content -->
                </div>