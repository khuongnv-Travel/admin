function JS_List(baseUrl, module, action) {
    $("#active_listtype").attr('class', 'nav-item active');
    $("#main_listtype").attr('class', 'nav-link dropdown-toggle active');
    $("#collapse_listtype").attr('class', 'nav-collapse collapse show');
    $("#action_list").attr('class', 'nav-link active');
    this.baseUrl = baseUrl;
    this.module = module;
    this.action = action;
    this.urlPath = baseUrl + '/' + module + (action != '' && action != undefined ? '/' + action : '');
    this.currentPage = 1
    this.perPage = 15;
}
/**
 * Sự kiện xảy ra
 */
JS_List.prototype.loadIndex = function () {
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
        myClass.search();
    });
    $("#btn_update_order").click(function () {
        myClass.updateOrderTable();
    });
    $("#listtype_id").change(function () {
        myClass.search();
    });
}
/**
 * Danh sách
 */
JS_List.prototype.loadList = function (currentPage = 1, perPage = 15) {
    var myClass = this;
    var oForm = '#frmList_index';
    myClass.currentPage = currentPage;
    myClass.perPage = perPage;
    var url = myClass.urlPath + '/loadList';
    var data = {
        _token: $("#_token").val(),
        listtype_id: $("#listtype_id").val(),
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
            $(oForm).find('.main_paginate .pagination a').click(function () {
                var page = $(this).attr('page');
                var perPage = $('#cbo_nuber_record_page').val();
                myClass.loadList(page, perPage);
            });
            $(oForm).find('#cbo_nuber_record_page').change(function () {
                var page = $(oForm).find('#_currentPage').val();
                var perPages = $(oForm).find('#cbo_nuber_record_page').val();
                myClass.loadList(page, perPages);
            });
            $(oForm).find('#cbo_nuber_record_page').val(arrResult['perPage']);
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Form thêm mới
 */
JS_List.prototype.create = function () {
    var myClass = this;
    var url = myClass.urlPath + '/create';
    var data = {
        _token: $("#_token").val(),
        listtype_id: $("#listtype_id").val(),
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
            $("#status").attr('checked', true);
            $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
            $("#units").change(function(){
                myClass.changeUnit();
            });
            $("#btn_update").click(function () {
                myClass.update(false);
            });
            $("#btn_update_close").click(function () {
                myClass.update(true);
            });
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Form sửa
 */
JS_List.prototype.edit = function (id) {
    var myClass = this;
    var url = myClass.urlPath + '/edit';
    var listId = '';
    var chk_item_id = $('#table-data').find('input[name="chk_item_id"]');
    $(chk_item_id).each(function () {
        if ($(this).is(':checked')) {
            if (listId !== '') {
                listId += ',' + $(this).val();
            } else {
                listId = $(this).val();
            }
        }
    });
    if (listId == '') {
        Library.alertMessage('warning', 'Cảnh báo', 'Chọn một bản ghi để sửa!');
        return false;
    }
    if (listId > 1) {
        Library.alertMessage('warning', 'Cảnh báo', 'Chọn một bản ghi để sửa!');
        return false;
    }
    var data = {
        _token: $("#_token").val(),
        id: listId,
        listtype_id: $("#listtype_id").val(),
    }
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (arrResult) {
            Library.hideloadding();
            $("#addModal").html(arrResult);
            $("#addModal").modal('show');
            $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
            $("#btn_update_close").click(function () {
                myClass.update(true);
            });
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Lưu thông tin
 * @return string
 */
JS_List.prototype.update = function (type = false) {
    var myClass = this;
    var oForm = 'form#frmList_add';
    var url = myClass.urlPath + '/update';
    var order = $("#order").val();
    var data = $(oForm).serialize();
    data += '&listtype_id=' + $("#listtype_id").val();
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (arrResult) {
            Library.hideloadding();
            if (arrResult['success'] == true) {
                Library.alertMessage('success', 'Thông báo', arrResult['message']);
                $(oForm)[0].reset();
                $(oForm).find('#order').val(parseInt(order) + 1);
                myClass.loadList(myClass.currentPage, myClass.perPage);
                if (type) {
                    $(".modal").modal('hide');
                }
            } else {
                Library.alertMessage('danger', 'Lỗi', arrResult['message']);
                $("#" + arrResult.key).focus();
            }
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Xóa thông tin
 */
JS_List.prototype.delete = function () {
    var myClass = this;
    var listId = '';
    var chk_item_id = $('#table-data').find('input[name="chk_item_id"]');
    $(chk_item_id).each(function () {
        if ($(this).is(':checked')) {
            if (listId !== '') {
                listId += ',' + $(this).val();
            } else {
                listId = $(this).val();
            }
        }
    });
    if (listId == '') {
        Library.alertMessage('warning', 'Cảnh báo', 'Chọn ít nhất một bản ghi để xoá!');
        return false;
    }
    var url = myClass.urlPath + '/delete';
    $.confirm({
        title: 'Thông báo',
        titleClass: 'fw-bold text-danger',
        content: 'Bạn có chắc chắn muốn xóa!',
        type: 'red',
        closeIcon: true,
        autoClose: 'cancel|9000',
        buttons: {
            delete: {
                btnClass: 'btn-danger',
                text: 'Xác nhận',
                action: function () {
                    Library.showloadding();
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: { _token: $("#_token").val(), listId: listId },
                        success: function (arrResult) {
                            Library.hideloadding();
                            if (arrResult['success'] == true) {
                                Library.alertMessage('success', 'Thông báo', arrResult['message']);
                                myClass.loadList(myClass.currentPage, myClass.perPage);
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
/**
 * Cập nhật lại toàn bộ STT
 */
JS_List.prototype.updateOrderTable = function () {
    var myClass = this;
    $.confirm({
        title: 'Thông báo',
        titleClass: 'fw-bold text-success',
        content: 'Bạn có chắc chắn muốn cập nhật lại tất cả các số thứ tự của danh mục <b class="text-primary">' + $("#" + $("#listtype_id").val()).html() + '</b>!',
        type: 'green',
        closeIcon: true,
        autoClose: 'cancel|9000',
        buttons: {
            delete: {
                btnClass: 'btn-success',
                text: 'Xác nhận',
                action: function () {
                    var url = myClass.urlPath + '/updateOrderTable';
                    Library.showloadding();
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: { _token: $("#_token").val(), listtype_id: $("#listtype_id").val() },
                        success: function (arrResult) {
                            Library.hideloadding();
                            if (arrResult['success'] == true) {
                                Library.alertMessage('success', 'Thông báo', arrResult['message']);
                                myClass.loadList(myClass.currentPage, myClass.perPage);
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
/**
 * Thay đổi unit
 */
JS_List.prototype.changeUnit = function(){
    var myClass = this;
    var url = myClass.urlPath + '/changeUnit';
    var data = {
        _token: $("#_token").val(),
        units: $("#units").val(),
    }
    Library.showloadding();
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (result) {
            $("#parent_id").html(result);
            $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
            $('.chzn-select').trigger("chosen:updated");
            Library.hideloadding();
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Thay đổi trạng thái
 */
JS_List.prototype.changeStatus = function (id) {
    var myClass = this;
    var url = myClass.urlPath + '/changeStatus';
    var data = {
        _token: $("#_token").val(),
        status: $("#status_" + id).is(":checked") ? 0 : 1,
        id: id,
    }
    Library.showloadding();
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (result) {
            if (result['success'] == true) {
                Library.alertMessage('success', 'Thông báo', result['message']);
            } else {
                Library.alertMessage('danger', 'Lỗi', result['message']);
            }
            Library.hideloadding();
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Tìm kiếm
 */
JS_List.prototype.search = function () {
    JS_List.loadList(JS_List.currentPage, JS_List.perPage);
}