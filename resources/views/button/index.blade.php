<style>
    .button-group{
        display: flex;
    }
    @media (max-width: 380px){
        .button-group{
            display: grid;
        }
    }
</style>
<div class="col-sm-auto button-group">
    <button id="btn_update_order" class="btn btn-success d-flex align-items-center ms-1">
        <i class='bx bx-up-arrow-alt'></i><span class="ms-1">Cập nhật STT</span>
    </button>
    <button id="btn_add" class="btn btn-primary d-flex align-items-center ms-1">
        <i class="bx bx-plus"></i><span class="ms-1">Thêm</span>
    </button>
    <button id="btn_edit" class="btn btn-warning d-flex align-items-center ms-1">
        <i class="bx bx-edit"></i><span class="ms-1">Sửa</span>
    </button>
    <button id="btn_delete" class="btn btn-danger d-flex align-items-center ms-1">
        <i class="bx bx-trash"></i><span class="ms-1">Xóa</span>
    </button>
</div>