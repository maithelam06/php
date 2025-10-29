(function ($) {
    "use strict";

    var MTL = {};


    MTL.setupCKeditor = () => {
        if ($('.ck-editor')) { 
            $('.ck-editor').each(function () { 
                let editor = $(this);
                let elementId = editor.attr('id');
                let elementHeight = editor.attr('data-height');
                if (elementId) {
                    MTL.ckeditor4(elementId,elementHeight);
                }
            });
        }
    };
    MTL.ckeditor4 = (elementId, elementHeight) => {
        if(typeof(elementHeight) == 'undefined') {
            elementHeight = 500;
        }
        CKEDITOR.replace(elementId, {
            autoUpdateElement: false,
            height: elementHeight,
            removeButtons: '',
            entities: true,
            allowedContent: true,
            toolbarGroups: [
                { name: 'clipboard', groups: ['clipboard', 'undo'] },
                { name: 'editing', groups: ['find', 'selection', 'spellchecker'] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document', groups: ['mode', 'document', 'doctools'] },
                { name: 'colors' },
                { name: 'others' },
                '/',
                { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
                { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'] },
                { name: 'styles' }
            ]
        });


    }
    // Sự kiện click vào nút upload ảnh
    MTL.uploadImageToInput = () => {
        $('.upload-image').click(function () {
            let input = $(this)
            let type = input.attr('data-type')
            MTL.setupCKFinder2(input, type);
        });
    }

    MTL.uploadImageAvatar = () => {
        $('.image-taget').click(function () {
            let input = $(this)
            let type = 'Images';
            MTL.browseServerAvatar(input,type);
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

      MTL.browseServerAvatar = (object, type)  => {
         if (typeof (type) === 'undefined') {
            type = 'Images';
        }
        var finder = new CKFinder();
        finder.resourceType = type;
        finder.selectActionFunction = function (fileUrl, data) {
            object.find('img').attr('src', fileUrl);
            object.siblings('input').val(fileUrl);
        };
        finder.popup();

      }

    $(document).ready(function () {
        // Có thể viết thêm code khởi tạo khác ở đây
        MTL.uploadImageToInput();
        MTL.setupCKeditor();
        MTL.uploadImageAvatar();
    });

})(jQuery);
