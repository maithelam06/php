 <div class="row mb15">
     <div class="col-lg-12">
         <div class="form-row">
             <label for="email" class="control-label text-left">
                 Tiêu đề nhóm bài viết <span class="text-danger">(*)</span>
             </label>
             <input type="text" id="name" name="name" value="{{ old('name', $postCatalogue->name ?? '') }}"
                 class="form-control" placeholder="" autocomplete="off">
         </div>
     </div>
 </div>
 <div class="row mb15">
     <div class="col-lg-12">
         <div class="form-row">
             <label for="email" class="control-label text-left">
                 Mô tả ngắn
             </label>
             <textarea type="text" name="description"
                 value="" class="form-control ck-editor"
                 placeholder="" autocomplete="off" id="description" data-height="450"
                 >
                 {{ old('description', $postCatalogue->description ?? '') }}</textarea>
         </div>
     </div>
 </div>
 <div class="row mb15">
     <div class="col-lg-12">
         <div class="form-row">
             <label for="email" class="control-label text-left">
                 Nội dung
             </label>
             <textarea type="text"name="content" 
                 class="form-control ck-editor" placeholder="Nhập tiêu đề nhóm bài viết" autocomplete="off" id="content" data-height="500"
                 >
                 {{ old('content', $postCatalogue->content ?? '') }}</textarea>
         </div>
     </div>
 </div>
