function JS_Author(baseUrl, module, action) {
    $("#main_authors").attr('class', 'nav-link active');
    this.baseUrl = baseUrl;
    this.module = module;
    this.action = action;
    this.urlPath = baseUrl + '/' + module + (action != '' && action != undefined ? '/' + action : '');
    this.oFormIndex = '#frmAuthors_index';
    this.oFormAdd = '#frmAuthors_add';
    this.currentPage = 1
    this.perPage = 15;
}
/**
 * Sự kiện xảy ra
 */
JS_Author.prototype.loadIndex = function () {
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
    $("#btn_update_order").click(function () {
        myClass.updateOrderTable();
    });
    $("#btn_search").click(function () {
        search();
    });
}
/**
 * Danh sách
 */
JS_Author.prototype.loadList = function (currentPage = 1, perPage = 15) {
    var myClass = this;
    var oForm = myClass.oFormIndex;
    myClass.currentPage = currentPage;
    myClass.perPage = perPage;
    var url = myClass.urlPath + '/loadList';
    var data = 'txt_search=' + $(oForm).find("#txt_search").val();
    data += '&offset=' + currentPage;
    data += '&limit=' + perPage;
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET',
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
JS_Author.prototype.create = function () {
    var myClass = this;
    var url = myClass.urlPath + '/create';
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET',
        success: function (arrResult) {
            Library.hideloadding();
            $("#addModal").html(arrResult);
            $("#addModal").modal('show');
            $("#status").attr('checked', true);
            $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
            $("#btn_update").click(function () { myClass.update(false); });
            $("#btn_update_close").click(function () { myClass.update(true); });
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Form sửa
 */
JS_Author.prototype.edit = function (id) {
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
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET',
        data: { id: listId },
        success: function (arrResult) {
            Library.hideloadding();
            $("#addModal").html(arrResult);
            $("#addModal").modal('show');
            $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
            $("#btn_update_close").click(function () { myClass.update(true); });
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Lưu thông tin
 */
JS_Author.prototype.update = function (type) {
    var myClass = this;
    var oForm = myClass.oFormAdd;
    var url = this.urlPath + '/update';
    var data = new FormData;
    data.append('_token', $("#_token").val());
    data.append('dataUpdate', $(oForm).serialize());
    data.append('files', $("#avatar")[0].files[0]);
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                Library.alertMessage('success', 'Thông báo', arrResult['message']);
                myClass.loadList();
                $(oForm)[0].reset();
                $(myClass.oFormAdd + " #order").val(parseInt(arrResult['data']['order']) + 1);
                if (type) {
                    $("#addModal").modal('hide');
                }
            } else {
                Library.alertMessage('danger', 'Lỗi', arrResult['message']);
                Library.hideloadding();
                $("#" + arrResult['key']).focus();
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
JS_Author.prototype.delete = function () {
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
JS_Author.prototype.updateOrderTable = function () {
    var myClass = this;
    $.confirm({
        title: 'Thông báo',
        content: 'Bạn có chắc chắn muốn cập nhật lại tất cả các số thứ tự!',
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
                        data: { _token: $("#_token").val() },
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
 * Thay đổi trạng thái
 */
function changeStatus(id) {
    var myClass = JS_Author;
    var url = myClass.urlPath + '/changeStatus';
    var data = '_token=' + $("#_token").val();
    data += '&status=' + ($("#status_" + id).is(":checked") ? 0 : 1);
    data += '&id=' + id;
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
function search() {
    JS_Author.loadList();
}
/**
 * Hiển thị hình ảnh
 */
function showImage(_this) {
    var reader = new FileReader();
    var img = document.createElement("img");
    reader.readAsDataURL($(_this)[0].files[0]);
    reader.onload = function () {
        var dataURL = reader.result;
        img.src = dataURL;
        img.style = 'width: 100%;';
    };
    $("#feature_img").html(img);
}