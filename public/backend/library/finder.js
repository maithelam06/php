(function ($) {
    "use strict";

    var MTL = {};
    var documentObj = $(document);

    MTL.inputImage = () => {
        $(document).on('click', '.input-image', function() {
            let _this = $(this)
            let fileUpload = _this.attr('data-upload')
            MTL.BrowseServerInput($(this),fileUpload);
        })
 }

    MTL.BrowseServerInput = (object, type) => {
        if (typeof (type) == 'undefined') {
        type = 'Images';
    }

    var finder = new CKFinder();
    finder.resourceType = type;

    finder.selectActionFunction = function (fileUrl, data) {
        console.log(fileUrl);
        fileUrl = fileUrl.replace(BASE_URL, "/");
        object.val(fileUrl);
    }

    finder.popup();
    }
    
   
    // Khi document sẵn sàng
    documentObj.ready(function () {
        MTL.inputImage();
    });

})(jQuery);
