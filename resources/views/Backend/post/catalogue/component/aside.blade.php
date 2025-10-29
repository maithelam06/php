 <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="email" class="control-label text-left">
                                        Chọn danh mục cha <span class="text-danger">(*)</span></label>
                                    <span class="text-danger notice" mb10> * Chọn root nếu không có danh mục cha</span>
                                    <select name="" class="form-control setupSelect2" id="">
                                        <option value="0">Chọn danh mục cha</option>
                                        <option value="1">Root</option>
                                        <option value="2">...</option>
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
                                    <span class=" image img-cover image-taget"><img src="backend/img/image.jpg"
                                            alt=""></span>
                                    <input type="hidden" name="image" value="">
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
                                        <select name="" class="form-control setupSelect2" id="">
                                        @foreach(config('apps.general.publish') as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                     <select name="" class="form-control setupSelect2" id="">
                                        @foreach(config('apps.general.follow') as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end ibox-content -->
                </div>