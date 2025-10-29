                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Cấu hình SEO</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="seo-container">
                            <div class="meta-title">
                               Bạn chưa có tiêu đề SEO
                            </div>
                            <div class="canonical">
                                Https://duong-dan-cua-ban.html
                            </div>
                            <div class="meta-description">
                                Bạn chưa có mô tả SEO
                            </div>
                        </div>
                        <div class="seo-swrapper">
                            <div class="row mb15">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label for="email" class="control-label text-left">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <span> Mô tả SEO </span>
                                                <span class="count_meta-title">0 ký tự</span>
                                            </div>
                                        </label>
                                        <input type="text" id="meta_title" name="meta_title"
                                            value="{{ old('meta_title', $postCatalogue->meta_title ?? '') }}" class="form-control"
                                            placeholder="Nhập tiêu đề nhóm bài viết" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="email" class="control-label text-left">
                                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                            <span> Từ khóa SEO </span>
                                        </div>
                                    </label>
                                    <input type="text" id="name" name="meta_keyword"
                                        value="{{ old('meta_keyword', $postCatalogue->meta_keyword ?? '') }}" class="form-control"
                                        placeholder="Nhập tiêu đề nhóm bài viết" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="email" class="control-label text-left">
                                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                            <span> Mô tả SEO </span>
                                            <span class="meta-description">0 ký tự</span>
                                        </div>
                                    </label>
                                    <textarea type="text" id="name" name="meta-description"
                                        value="{{ old('description', $postCatalogue->description ?? '') }}" class="form-control"
                                        placeholder="" autocomplete="off"
                                        >
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label for="email" class="control-label text-left">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <span> Đường dẫn </span>
                                                <span class="count_meta-title">0 ký tự</span>
                                            </div>
                                        </label>
                                        <div class="input-wrapper">
                                            <input type="text" id="canonical" name="canonical"
                                            value="{{ old('canonical', $postCatalogue->canonicalse ?? '') }}" class="form-control"
                                            placeholder="" autocomplete="off">
                                            <span class="baseUrl">{{ config('app.url') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>       
                    </div>
                </div>