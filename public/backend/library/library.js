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

    MTL.checkAll = () => {
        if ($('#checkAll').length) {
            $(document).on('click', '#checkAll', function (e) {
                let isChecked = $(this).prop('checked')
                $('.checkBoxItem').prop('checked', isChecked);
                $('.checkBoxItem').each(function () {
                    let _this = $(this)
                    MTL.changeBackground(_this)
                })

            })
        }
    }
    MTL.checkBoxItem = () => {
        if ($('.checkBoxItem').length) {
            $(document).on('click', '.checkBoxItem', function () {
                let _this = $(this);
                MTL.changeBackground(_this)
                MTL.allChecked()
            });
        }
    }

    MTL.changeBackground = (object) => {
        let isChecked = object.prop('checked');
        if (isChecked) {
            object.closest('tr').addClass('active-bg');
        } else {
            object.closest('tr').removeClass('active-bg');
        }
    }

    MTL.allChecked = () => {
        let allChecked = $('.checkBoxItem:checked').length === $('.checkBoxItem').length;
        $('#checkAll').prop('checked', allChecked);
    }
    MTL.changeStatusAll = () => {
        if ($('.changeStatusAll').length) {
            $(document).on('click', '.changeStatusAll', function (e) {
                let _this = $(this)
                let id = []
                $('.checkBoxItem:checked').each(function () {
                    let checkBox = $(this)
                    if (checkBox.is(':checked')) {
                        id.push(checkBox.val())
                    }
                })
                let option = {
                    'value': _this.attr('data-value'),
                    'model': _this.attr('data-model'),
                    'field': _this.attr('data-field'),
                    'id'   : id,
                    '_token': _token
                }
                $.ajax({
                    url: 'ajax/dashboard/changeStatusAll',
                    type: 'POST',
                    data: option,
                    dataType: 'json',
                    success: function (res) {
                        if(res.flag == true) {
                            let cssActive1 = 'background-color: rgb(26, 179, 148); border-color: rgb(26, 179, 148); box-shadow: rgb(26, 179, 148) 0px 0px 0px 16px inset; transition: border 0.4s, box-shadow 0.4s, background-color 1.2s;';
                             let cssActive2 = 'left: 20px; background-color: rgb(255, 255, 255); transition: background-color 0.4s, left 0.2s;';
                            if(option.value == 1) {
                                for(let i=0; i < id.length; i++) {
                                  $('.js-switch' + id[i]).find('span.switchery').attr('style', cssActive1).find('small').attr('style', cssActive2);
                                }
                            }
                        }
                        
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
        MTL.checkAll();
        MTL.checkBoxItem();
        MTL.allChecked();
        MTL.changeStatusAll();
    });

})(jQuery);
