(function ($) {
    "use strict";

    var MTL = {};

    MTL.seoPreview = () => {
        $('input[name=meta_title]').on('keyup', function () {
           let input = $(this)
           let value = $(input).val()
            $('.meta-title').html(value)
        })

        
        $('input[name=canonical]').css({
            'padding-left': parseInt($('.baseUrl').outerWidth()) + 30
        })

        $('input[name=canonical]').on('keyup', function () {
            let input = $(this)
            let value = $(input).val()
            $('.canonical').html(BASE_URL + value + SUFFIX)
        })


       $('textarea[name=meta_description]').on('keyup', function () {
            let input = $(this)
            let value = $(input).val()
            $('.meta_description').html(value)
        })

       

    }
    $(document).ready(function () {
        // Có thể viết thêm code khởi tạo khác ở đây
        MTL.seoPreview();
      
    });

})(jQuery);
