(function ($) {
    "use strict";
    var MTL = {};

    MTL.getLocation = () => {
        $(document).on('change', '.location', function () {
            let _this = $(this);
            let option = {
                'data': {
                    'location_id': _this.val()
                },
                'target': _this.attr('data-target')
            }


            MTL.sendDataTogetLocation(option)


        })
    }

    MTL.sendDataTogetLocation = (option) => {
        $.ajax({
            url: 'ajax/location/getLocation',
            type: 'GET',
            data: option,
            dataType: 'json',
            success: function (res) {
                $('.' + option.target).html(res.html);

                if (district_id != '' && option.target == 'districts') {
                    $('.districts').val(district_id).trigger('change')
                }

                if (ward_id != '' && option.target == 'wards') {
                    $('.wards').val(ward_id).trigger('change')
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.log('Lỗi: ' + textStatus + ' - ' + errorThrown);
                alert('Có lỗi xảy ra, vui lòng thử lại!');
            }
        });
    }
    MTL.loadCity = () => {
        if (province_id != '') {
            $(".province").val(province_id).trigger("change");
        }
    }


    // Khi document sẵn sàng
    $(document).ready(function () {
        MTL.getLocation();
        MTL.loadCity();
    });

})(jQuery);
