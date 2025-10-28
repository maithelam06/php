(function ($) {
    "use strict";

    var MTL = {};

    // Sự kiện click vào nút upload ảnh
    MTL.uploadImageToInput = () => {
         $('.upload-image').click(function () {
            let input = $(this)
            let type = input.attr('data-type')
        MTL.setupCKFinder2(input, type);
    });
    }
   

    // Hàm khởi tạo CKFinder 2
    MTL.setupCKFinder2 = (object, type) => {
        if (typeof (type) === 'undefined') {
            type = 'Images';
        }

        var finder = new CKFinder();
        finder.resourceType = type;
        finder.selectActionFunction = function (fileUrl, data) {
            object.val(fileUrl);
            // 👇 Bạn có thể gán fileUrl vào input hoặc hiển thị ảnh
            // $('#image').val(fileUrl);
            // $('#preview').attr('src', fileUrl);
        };
        finder.popup();
    };

    $(document).ready(function () {
        // Có thể viết thêm code khởi tạo khác ở đây
        MTL.uploadImageToInput();
    });

})(jQuery);
