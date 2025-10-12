(function ($) {
    "use strict";

    var MTL = {};
    var documentObj = $(document);

    // Khởi tạo switchery
    MTL.switchery = () => {
        $('.js-switch').each(function () {
            var switchery = new Switchery(this, {color: '#1AB394'});
        })
    }
    MTL.select2 = () => {
        $('.setupSelect2').select2();
    }
    MTL.province = () => {
        
    }

    // Khi document sẵn sàng
    documentObj.ready(function () {
        MTL.switchery();
        MTL.select2();
    });

})(jQuery);
