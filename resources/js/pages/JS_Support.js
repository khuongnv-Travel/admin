function JS_Support(baseUrl, module, action) {
    $("#main_support").attr('class', 'nav-link active');
    this.baseUrl = baseUrl;
    this.module = module;
    this.action = action;
    this.urlPath = baseUrl + '/' + module + (action != '' && action != undefined ? '/' + action : '');
}
/**
 * Sự kiện xảy ra
 */
JS_Support.prototype.loadIndex = function () {
    var myClass = this;
    $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
    $("#btn_update_order").click(function () {
        myClass.updateOrderTable();
    });
}
/**
 * Xóa thông tin
 */
function updateData(code, type = '') {
    var myClass = JS_Support;
    var url = myClass.urlPath + '/updateData';
    $.confirm({
        title: 'Thông báo',
        titleClass: 'fw-bold text-primary',
        content: 'Lấy danh sách danh mục đối tượng!',
        type: 'blue',
        closeIcon: true,
        autoClose: 'cancel|9000',
        buttons: {
            updateData: {
                btnClass: 'btn-primary',
                text: 'Xác nhận',
                action: function () {
                    Library.showloadding();
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: { _token: $("#_token").val(), code: code, type: type, },
                        success: function (arrResult) {
                            Library.hideloadding();
                            if (arrResult['success'] == true) {
                                Library.alertMessage('success', 'Thông báo', arrResult['message']);
                            } else {
                                Library.alertMessage('danger', 'Lỗi', arrResult['message']);
                            }
                        }, error: function (e) {
                            console.log(e);
                            Library.hideloadding();
                        }
                    });
                }
            },
            cancel: {
                btnClass: 'btn-default',
                text: 'Đóng',
                action: function () { }
            },
        }
    });
}