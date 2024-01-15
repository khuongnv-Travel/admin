function Library() {

}

Library.prototype.showloadding = function () {
    $(".main_loadding").show();
}

Library.prototype.hideloadding = function () {
    $("#loadding").hide();
    $(".main_loadding").hide();
}
Library.prototype.alertMessageFrontend = function (type, label, message, s = 2000) {
    var vclass = 'alert';
    lclass = 'bx';
    if (type == 'primary') {
        vclass += ' alert-primary';
        lclass += ' bxs-check-circle';
    } else if (type == 'secondary') {
        vclass += ' alert-secondary';
        lclass += ' bxs-check-circle';
    } else if (type == 'success') {
        vclass += ' alert-success';
        lclass += ' bxs-check-circle';
    } else if (type == 'danger') {
        vclass += ' alert-danger';
        lclass += ' bxs-x-circle';
    } else if (type == 'warning') {
        vclass += ' alert-warning';
        lclass += ' bxs-error-circle';
    } else if (type == 'info') {
        vclass += ' alert-info';
        lclass += ' bxs-info-circle';
    } else if (type == 'light') {
        vclass += ' alert-light';
        lclass += ' bxs-check-circle';
    } else if (type == 'dark') {
        vclass += ' alert-dark';
        lclass += ' bxs-error-circle';
    } else if (type == 'white') {
        vclass += ' alert-white';
        lclass += ' bxs-error-circle';
    }
    $("#message-alert").alert();
    $("#message-alert").removeClass();
    $("#message-alert").addClass(vclass);
    $("#message-icon").removeClass();
    $("#message-icon").addClass(lclass);
    $("#message-label").html(label);
    $("#message-infor").html(message);
    $("#message-alert").fadeTo(s, 500).slideUp(500, function () {
        $("#message-alert").slideUp(500);
    })
}

Library.prototype.alertMessage = function (type, label, message, s = 3000) {
    $.toast({
        title: label,
        content: message,
        type: type,
        delay: s,
        dismissible: true,
        positionDefaults: 'top-left'
    });
    // $(document).on('hidden.bs.toast', '.toast', function (e) {
    //     $(this).remove();
    // });
}
// Chuyển đổi dữ liệu
Library.prototype.convertStr = function(str){
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // Huyền sắc hỏi ngã nặng 
    str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // Â, Ê, Ă, Ơ, Ư
    str = str.replace(/ /g, "-");
    str = str.replace(/[`~!@#$%^&*()_+=\[\]{};:'"\|<>,.\/\\?]/g, "");
    str = str.replaceAll(/--/g, "-");
    if(str.indexOf('--') != -1){
        return Library.convertStr(str);
    }else{
        return str;
    }
}

Library = new Library();

function select_row(obj) {
    var oTable = $(obj).parent().parent().parent();
    $(oTable).find('td').parent().removeClass('selected');
    $(oTable).find('td').parent().find('input[name="chk_item_id"]').prop('checked', false);
    $(obj).parent().addClass('selected');
    var attDisabled = $(obj).parent().find('input[name="chk_item_id"]').prop('disabled');
    if (typeof (attDisabled) === 'undefined' || attDisabled == '') {
        $(obj).parent().find('input[name="chk_item_id"]').prop('checked', true);
        $(obj).parent().find('input[name="chk_item_id"]').prop('checked', 'checked');
    }
}
function checkbox_all_item_id(p_chk_obj) {
    var p_chk_obj = $('#table-data').find('input[name="chk_item_id"]');
    var v_count = p_chk_obj.length;
    //remove class cua tat ca cac tr trong table
    if ($('[name="chk_all_item_id"]').is(':checked')) {
        $(p_chk_obj).each(function () {
            $(this).prop('checked', true);
            $(this).parent().parent().addClass('selected');
        });
    } else {
        $(p_chk_obj).each(function () {
            $(this).prop('checked', false);
            $(this).parent().parent().removeClass('selected');
        });
    }
}
function checkbox_all_item_id_delete(p_chk_obj) {
    var p_chk_obj = $('#table-data-delete').find('input[name="chk_item_id"]');
    var v_count = p_chk_obj.length;
    //remove class cua tat ca cac tr trong table
    if ($('[name="chk_all_item_id"]').is(':checked')) {
        $(p_chk_obj).each(function () {
            $(this).prop('checked', true);
            $(this).parent().parent().addClass('selected');
        });
    } else {
        $(p_chk_obj).each(function () {
            $(this).prop('checked', false);
            $(this).parent().parent().removeClass('selected');
        });
    }
}
function select_checkbox_row(obj){
    if (obj.checked) {
        $(obj).parent().parent().addClass('selected');
        $(obj).prop('checked',true);
        $(obj).prop('checked','checked');
    }
    else{
        $(obj).parent().parent().removeClass('selected');
        $(obj).prop('checked',false);
    }
}