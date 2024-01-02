function JS_Categories(baseUrl, module, action) {
    $("#main_categories").attr('class', 'nav-link active');
    this.baseUrl = baseUrl;
    this.module = module;
    this.action = action;
    this.urlPath = baseUrl + '/' + module + (action != '' && action != undefined ? '/' + action : '');
    this.oFormIndex = '#frmCategories_index'; // Form Index Chuyên mục
    this.oFormAdd = '#frmCategories_add'; // Form Thêm chuyên mục
    this.oFormListtypeAdd = '#frmListtype_add'; // Form Thêm danh sách danh mục
    this.oFormListAdd = '#frmList_add'; // Form Thêm danh sách danh mục đối tượng
    this.addModal = "#addModal"; // Modal Thêm mới chuyên mục
    this.addModalListtype = "#addModalListtype"; // Modal Thêm mới danh sách danh mục
    this.addModalList = "#addModalList"; // Modal Thêm mới danh sách danh mục đối tượng
    this.currentPage = 1; // Trang hiển thị hiện tại
    this.perPage = 15; // Số bản ghi hiển thị trên một trang
}
/**
 * Sự kiện xảy ra
 */
JS_Categories.prototype.loadIndex = function () {
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
 * Sự kiện con dùng chung
 */
JS_Categories.prototype.loadEvent = function () {
    var myClass = this;
    $("#btn_reset_layout").click(function () { myClass.refresh('layout', 'DM_LAYOUT') });
    $("#btn_reset_type").click(function () { myClass.refresh('type', 'DM_LOAI_CHUYEN_MUC') });
    $("#btn_add_listtype").click(function () { myClass.addListtype() });
    $("#btn_add_list").click(function () { myClass.addList() });
}
/**
 * Danh sách
 * @param currentPage Trang hiện tại
 * @param perPage Số bản ghi hiển thị trên trang
 */
JS_Categories.prototype.loadList = function (currentPage = 1, perPage = 15) {
    var myClass = this;
    myClass.currentPage = currentPage;
    myClass.perPage = perPage;
    var url = myClass.urlPath + '/loadList';
    var data = 'txt_search=' + $(myClass.oFormIndex).find("#txt_search").val();
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
/**
 * Form thêm mới
 */
JS_Categories.prototype.create = function () {
    var myClass = this;
    var url = myClass.urlPath + '/create';
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET',
        success: function (arrResult) {
            Library.hideloadding();
            $(myClass.addModal).html(arrResult);
            $(myClass.addModal).modal('show');
            $("#status").attr('checked', true);
            $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
            myClass.loadEvent();
            $("#btn_update").click(function () { myClass.update(false); });
            $("#btn_update_close").click(function () { myClass.update(true); });
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Thêm mới danh mục
 */
JS_Categories.prototype.addListtype = function () {
    var myClass = this;
    var url = this.urlPath + '/addListtype';
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET',
        success: function (arrResult) {
            Library.hideloadding();
            $(myClass.addModal).modal('hide');
            $(myClass.addModalListtype).html(arrResult);
            $(myClass.addModalListtype).modal('show');
            $(myClass.oFormListtypeAdd + " #status").attr('checked', true);
            $("#btn_update_listtype").click(function () {
                myClass.updateListtype(false);
            });
            $("#btn_update_listtype_close").click(function () {
                myClass.updateListtype(true);
            });
            $(".btn_close_listtype").click(function () {
                $(myClass.addModalListtype).html('');
                $(myClass.addModalListtype).modal('hide');
                $(myClass.addModal).modal('show');
            });
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Cập nhật danh mục
 * @param boolen True: Đóng modal, False: Không đóng modal
 */
JS_Categories.prototype.updateListtype = function (boolen) {
    var myClass = this;
    var url = this.urlPath + '/updateListtype';
    var data = {
        _token: $("#_token").val(),
        dataUpdate: $(myClass.oFormListtypeAdd).serialize(),
    };
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (arrResult) {
            Library.hideloadding();
            if (arrResult['success'] == true) {
                $(myClass.oFormListtypeAdd)[0].reset();
                $(myClass.oFormListtypeAdd + " #order").val(parseInt(arrResult['data']['order']) + 1);
                $(myClass.oFormListtypeAdd + " #order").focus();
                if (boolen) {
                    $(myClass.addModalListtype).html('');
                    $(myClass.addModalListtype).modal('hide');
                    $(myClass.addModal).modal('show');
                }
            } else {
                Library.alertMessage('danger', 'Lỗi', arrResult['message']);
                Library.hideloadding();
            }
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Thêm danh mục đối tượng
 */
JS_Categories.prototype.addList = function () {
    var myClass = this;
    var url = myClass.urlPath + '/addList';
    var data = {
        _token: $("#_token").val(),
    };
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (arrResult) {
            Library.hideloadding();
            $(myClass.addModal).modal('hide');
            $(myClass.addModalList).html(arrResult);
            $(myClass.addModalList).modal('show');
            $(myClass.oFormListAdd + " #status").attr('checked', true);
            $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
            $("#btn_update_list").click(function () { myClass.updateList(false); });
            $("#btn_update_list_close").click(function () { myClass.updateList(true); });
            $(".btn_close_list").click(function () {
                $(myClass.addModalList).html('');
                $(myClass.addModalList).modal('hide');
                $(myClass.addModal).modal('show');
            });
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Cập nhật danh sách danh mục đối tượng
 * @param boolen True: Đóng modal, False: Không đóng modal
 */
JS_Categories.prototype.updateList = function (boolen) {
    var myClass = this;
    var url = this.urlPath + '/updateList';
    var data = {
        _token: $("#_token").val(),
        dataUpdate: $(myClass.oFormListAdd).serialize(),
    };
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (arrResult) {
            Library.hideloadding();
            if (arrResult['success'] == true) {
                $(myClass.oFormListAdd)[0].reset();
                $(myClass.oFormListAdd + " #order").val(parseInt(arrResult['data']['order']) + 1);
                $(myClass.oFormListAdd + " #code").focus();
                if (boolen) {
                    $(myClass.addModalList).modal('hide');
                    $(myClass.addModal).modal('show');
                }
            } else {
                Library.alertMessage('danger', 'Lỗi', arrResult['message']);
            }
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Tải lại danh mục đối tượng 
 * @param id Id select
 * @param code Mã danh mục đối tượng
 */
JS_Categories.prototype.refresh = function (id, code) {
    var myClass = this;
    var url = myClass.urlPath + '/refresh';
    var data = {
        _token: $("#_token").val(),
        code: code,
    };
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (arrResult) {
            Library.hideloadding();
            var htmls = '';
            if (id == 'layout') htmls = '<option value="">--Chọn layout--</option>';
            if (id == 'type') htmls = '<option value="">--Chọn loại chuyên mục--</option>';
            $.each(arrResult.data, function (key, value) {
                htmls += '<option value="' + value.listtype_id + '">' + value.name + '</option>';
            })
            $("#" + id).html(htmls);
            $('.chzn-select').trigger("chosen:updated");
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Form sửa
 */
JS_Categories.prototype.edit = function (id) {
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
            $(myClass.addModal).html(arrResult);
            $(myClass.addModal).modal('show');
            $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
            myClass.loadEvent();
            $("#btn_update_close").click(function () { myClass.update(true); });
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Lưu thông tin
 * @param boolen True: Đóng modal, False: Không đóng modal
 */
JS_Categories.prototype.update = function (boolen) {
    var myClass = this;
    var url = this.urlPath + '/update';
    var data = new FormData;
    data.append('_token', $("#_token").val());
    data.append('dataUpdate', $(myClass.oFormAdd).serialize());
    data.append('files', $("#images")[0].files[0]);
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
                $(myClass.oFormAdd)[0].reset();
                $("#feature_img").html('');
                $("#images").val('');
                $("#order").val(parseInt($("#order").val()) + 1);
                $("#code").focus();
                $('#layout option:first').prop('selected', true);
                $('#type option:first').prop('selected', true);
                $('.chzn-select').trigger("chosen:updated");
                if (boolen) {
                    $(myClass.addModal).modal('hide');
                }
            } else {
                Library.alertMessage('danger', 'Lỗi', arrResult['message']);
                Library.hideloadding();
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
JS_Categories.prototype.delete = function () {
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
JS_Categories.prototype.updateOrderTable = function () {
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
 * @param id ID đối tượng
 */
function changeStatus(id) {
    var myClass = JS_Categories;
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
    JS_Categories.loadList();
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