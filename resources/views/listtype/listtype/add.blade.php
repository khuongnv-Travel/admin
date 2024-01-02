<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">{{ isset($datas) ? 'Cập nhật' : 'Thêm mới' }}</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="frmListtype_add" autocomplete="off">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" id="id" value="{{ $datas->id ?? '' }}">
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Mã danh mục</span></label></div>
                    <div class="col-md-9">
                        <input type="text" name="code" id="code" class="form-control text-uppercase" placeholder="Nhập mã danh mục" value="{{ $datas->code ?? '' }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Tên danh mục</span></label></div>
                    <div class="col-md-9"><input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên danh mục" value="{{ $datas->name ?? '' }}"></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label><span>Ghi chú</span></label></div>
                    <div class="col-md-9"><textarea type="text" name="note" id="note" rows="3" class="form-control" placeholder="Nhập ghi chú">{{ $datas->note ?? '' }}</textarea></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Thứ tự</span></label></div>
                    <div class="col-md-3"><input type="number" name="order" id="order" class="form-control" placeholder="Thứ tự" value="{{ $datas->order ?? ( $order ?? '' ) }}"></div>
                    <div class="col-md-6"><label class="form-control mt-0 border-0"><input type="checkbox" name="status" id="status" {{ $checked ?? '' }}> Hoạt động</label></div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            @if(!isset($datas->id))
            <button type="button" id="btn_update" class="btn btn-info">Lưu & Thêm</button>
            @endif
            <button type="button" id="btn_update_close" class="btn btn-primary">Lưu & Đóng</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
        </div>
    </div>
</div>