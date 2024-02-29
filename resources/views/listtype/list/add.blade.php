<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">{{ isset($datas) ? 'Cập nhật' : 'Thêm mới' }}</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="frmList_add" autocomplete="off">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" id="id" value="{{ $datas->id ?? '' }}">
                <div class="mb-3 row">
                    <div class="col-md-3"><label><span>Thuộc danh mục</span></label></div>
                    <div class="col-md-9">
                        <input type="button" class="form-control text-start" disabled value="{{ $listtype->name }}">
                    </div>
                </div>
                @if(isset($parents))
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Quận huyện</span></label></div>
                    <div class="col-md-9">
                        <select name="parent_id" id="parent_id" class="form-control chzn-select">
                            @foreach($parents as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Mã đối tượng</span></label></div>
                    <div class="col-md-9">
                        <input type="text" name="code" id="code" class="form-control text-uppercase" placeholder="Nhập mã đối tượng" value="{{ $datas->code ?? '' }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Tên đối tượng</span></label></div>
                    <div class="col-md-9"><input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên đối tượng" value="{{ $datas->name ?? '' }}"></div>
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