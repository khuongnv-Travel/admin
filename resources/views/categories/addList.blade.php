<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Thêm mới danh mục đối tượng</h2>
            <button type="button" class="btn-close btn_close_list" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="frmList_add" autocomplete="off">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="mb-3 row">
                    <div class="col-md-3"><label><span>Thuộc danh mục</span></label></div>
                    <div class="col-md-9">
                        <select name="listtype_id" id="listtype_id" class="form-control chzn-select">
                            @if(isset($listtypes))
                            @foreach($listtypes as $listtype)
                            <option value="{{ $listtype->id }}">{{ $listtype->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Mã đối tượng</span></label></div>
                    <div class="col-md-9">
                        <input type="text" name="code" id="code" class="form-control" placeholder="Nhập mã đối tượng" value="{{ $datas->code ?? '' }}">
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
            <button type="button" id="btn_update_list" class="btn btn-info">Lưu & Thêm</button>
            @endif
            <button type="button" id="btn_update_list_close" class="btn btn-primary">Lưu & Đóng</button>
            <button type="button" class="btn btn-danger btn_close_list">Đóng</button>
        </div>
    </div>
</div>