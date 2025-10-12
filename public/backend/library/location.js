(function ($) {
    "use strict";
    var MTL = {};

    MTL.getLocation = () => {
        $(document).on('change', '.province', function () {
            let _this = $(this);
            let province_id = _this.val();
            let option = {
                'data' : {
                    'province_id' : _this.val(),
                },
                'target' : _this.attr('data-target')
            }
            


            MTL.senDataTogetLocation(option);
        });
    }

    MTL.senDataTogetLocation = (option) => {
        $.ajax({
                url: 'ajax/location/getLocation',
                type: 'GET',
                data: option,
                dataType: 'json',
                success: function (res) {
                  $('.districts').html(res.html)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Lỗi: ' + textStatus + ' ' + errorThrown);
                }
            });
    }


    $(document).ready(function () {
        MTL.getLocation();
    });

})(jQuery);
