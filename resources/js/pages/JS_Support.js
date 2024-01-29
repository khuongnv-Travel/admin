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
    $("#btn_file").click(function(){
        myClass.updateFile();
    });
}
/**
 * Form cập thông tin
 */
JS_Support.prototype.formUpdate = function(code, listtype_code){
    var myClass = this;
    var url = myClass.urlPath + '/formUpdate';
    var data = {
        _token: $("#_token").val(),
        listtype_code: listtype_code,
    }
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (arrResult) {
            Library.hideloadding();
            if (arrResult['success'] == false) {
                Library.alertMessage('warning', 'Lỗi', arrResult['message']);
                return false;
            }
            $("#addModal").html(arrResult);
            $("#addModal").modal('show');
            $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
            $("#btn_update").click(function () {
                listtype_id = $("#frmForm_add #listtype_id").val();
                myClass.updateData(code, listtype_code, listtype_id);
            });
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Xóa thông tin
 */
JS_Support.prototype.updateData = function(code, type = '', listtype_id = '') {
    var myClass = this;
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
                        data: { _token: $("#_token").val(), code: code, type: type, listtype_id: listtype_id, },
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
JS_Support.prototype.updateFile = function(){
    var myClass = this;
    var url = myClass.urlPath + '/updateFile';
    
    var data = new FormData;
    data.append('_token', $("#_token").val());
    // data.append('dataUpdate', $(myClass.oFormAdd).serialize());
    data.append('files', $("#file")[0].files[0]);
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
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