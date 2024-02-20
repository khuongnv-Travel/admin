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
    $("#btn_tt").click(function(){
        myClass.updateFile('DM_TINH_THANH');
    });
    $("#btn_qh").click(function(){
        myClass.updateFile('DM_QUAN_HUYEN');
    });
    $("#btn_px").click(function(){
        myClass.updateFile('DM_PHUONG_XA');
    });
}
JS_Support.prototype.updateFile = function(listtype_code){
    var myClass = this;
    var url = myClass.urlPath + '/updateFile';
    var data = new FormData;
    data.append('_token', $("#_token").val());
    data.append('listtype_code', listtype_code);
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
            // if (arrResult['success']) {
            //     Library.alertMessage('success', 'Thông báo', arrResult['message']);
            // } else {
            //     Library.alertMessage('danger', 'Lỗi', arrResult['message']);
            // }
        }, error: function (e) {
            // console.log(e);
            Library.hideloadding();
        }
    });
}