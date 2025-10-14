(function ($) {
    "use strict";
    var MTL = {};

    MTL.province = () => {
        $(document).on('change', '.province', function () {
            let _this = $(this);
            let province_id = _this.val();
            $.ajax({
                url: 'ajax/location/getLocation',           
                type: 'GET',                 
                data: {
                    'province_id' : province_id
                }, 
                dataType: 'json',            
                success: function (res) {
                    $('.districts').html(res.html);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                
                    console.log('Lỗi: ' + textStatus + ' - ' + errorThrown);
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            });

        })
    }


    // Khi document sẵn sàng
    $(document).ready(function () {
        MTL.province();
    });

})(jQuery);
