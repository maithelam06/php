(function ($) {
    "use strict";

    var MTL = {};
    var _token = $('meta[name="csrf-token"]').attr('content');

    // Khởi tạo switchery
    MTL.switchery = () => {
        $('.js-switch').each(function () {
            var switchery = new Switchery(this, { color: '#1AB394' });
        })
    }
    MTL.select2 = () => {
        if ($('.setupSelect2').length) {
            $('.setupSelect2').select2();

        }
    }

    MTL.changerStatus = () => {
        if ($('.status').length) {
            $(document).on('change', '.status', function (e) {
                let _this = $(this)
                let option = {
                    'value': _this.val(),
                    'modelId': _this.attr('data-modelId'),
                    'model': _this.attr('data-model'),
                    'field': _this.attr('data-field'),
                    '_token': _token
                }
                $.ajax({
                    url: 'ajax/dashboard/changeStatus',
                    type: 'POST',
                    data: option,
                    dataType: 'json',
                    success: function (res) {
                        console.log(res);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                        console.log('Lỗi: ' + textStatus + ' - ' + errorThrown);
                    }
                });


                e.preventDefault();

            })
        }
    }

    // Khi document sẵn sàng
    $(document).ready(function () {
        MTL.switchery();
        MTL.select2();
        MTL.changerStatus();
    });

})(jQuery);
