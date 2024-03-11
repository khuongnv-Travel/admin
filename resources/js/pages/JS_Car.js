function JS_Car(baseUrl, module, action) {
    this.baseUrl = baseUrl;
    this.module = module;
    this.action = action;
    this.urlPath = baseUrl + '/' + module + (action != '' && action != undefined ? '/' + action : '');
    this.currentPage = 1;
    this.perPage = 15;
    this.oFormIndex = '#frmCars_index';
    this.oFormAdd = '#frmCars_add';
}
/**
 * Sự kiện xảy ra
 */
JS_Car.prototype.loadIndex = function () {
    var myClass = this;
    $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
    myClass.loadList();
    $("#btn_add").click(function () {
        myClass.create();
    });
    $("#btn_edit").click(function () {
        myClass.edit();
    });
    $("#btn_delete").click(function () {
        myClass.delete();
    });
    $("#btn_search").click(function () {
        search();
    });
    $("#btn_update_order").click(function () {
        myClass.updateOrderTable();
    });
}
/**
 * Danh sách
 */
JS_Car.prototype.loadList = function (currentPage = 1, perPage = 15) {
    var myClass = this;
    myClass.currentPage = currentPage;
    myClass.perPage = perPage;
    var url = myClass.urlPath + '/loadList';
    var data = {
        _token: $("#_token").val(),
        txt_search: $("#txt_search").val(),
        offset: currentPage,
        limit: perPage,
    }
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (arrResult) {
            $("#table-container").html(arrResult['arrData']);
            Library.hideloadding();
            $(myClass.oFormIndex).find('.main_paginate .pagination a').click(function () {
                var page = $(this).attr('page');
                var perPage = $('#cbo_nuber_record_page').val();
                myClass.loadList(page, perPage);
            });
            $(myClass.oFormIndex).find('#cbo_nuber_record_page').change(function () {
                var page = $(myClass.oFormIndex).find('#_currentPage').val();
                var perPages = $(myClass.oFormIndex).find('#cbo_nuber_record_page').val();
                myClass.loadList(page, perPages);
            });
            $(myClass.oFormIndex).find('#cbo_nuber_record_page').val(arrResult['perPage']);
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}