<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">{{ isset($datas) ? 'Cập nhật' : 'Thêm mới' }}</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="frmCategories_add" autocomplete="off">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" id="id" value="{{ $datas->id ?? '' }}">
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Mã chuyên mục</span></label></div>
                    <div class="col-md-9">
                        <input type="text" name="code" id="code" class="form-control text-uppercase" placeholder="Nhập mã chuyên mục" value="{{ $datas->code ?? '' }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Tên chuyên mục</span></label></div>
                    <div class="col-md-9"><input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên chuyên mục" value="{{ $datas->name ?? '' }}"></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Đường dẫn</span></label></div>
                    <div class="col-md-9"><input type="text" name="slug" id="slug" class="form-control" placeholder="Nhập đường dẫn" value="{{ $datas->slug ?? '' }}"></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label><span>Ảnh đại diện</span></label></div>
                    <div class="col-md-9">
                        <label for="images" class="btn btn-default mt-0">Chọn ảnh</label>
                        <input type="file" hidden name="images" id="images" onchange="showImage(this)">
                        <div id="feature_img" class="mt-1 col-md-3">
                            @if(isset($datas->images) && $datas->images)
                            <img src="{{ $datas->images }}" alt="Ảnh đại diện" width="100%">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label><span>Layout</span></label></div>
                    <div class="col-md-8">
                        <select name="layout" id="layout" class="form-control chzn-select">
                            <option value="">--Chọn layout--</option>
                            @if(isset($layout))
                            @foreach($layout as $key => $value)
                            <option 
                                @if(isset($datas->layout) && $value->code == $datas->layout) selected @endif
                                value="{{ $value->code }}">{{ $value->name }}
                            </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-1 pr-0" align="right">
                        <button type="button" class="btn btn-primary" id="btn_reset_layout" title="Tải lại danh sách danh mục"><i class='bx bx-refresh'></i></button>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label><span>Loại chuyên mục</span></label></div>
                    <div class="col-md-8">
                        <select name="type" id="type" class="form-control chzn-select">
                            <option value="">--Chọn loại chuyên mục--</option>
                            @if(isset($type))
                            @foreach($type as $key => $value)
                            <option
                                @if(isset($datas->type) && $value->code == $datas->type) selected @endif
                                value="{{ $value->code }}">{{ $value->name }}
                            </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-1 pr-0" align="right">
                        <button type="button" class="btn btn-primary" id="btn_reset_type" title="Tải lại danh sách danh mục"><i class='bx bx-refresh'></i></button>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label><span>Icon</span></label></div>
                    <div class="col-md-9"><input type="text" name="icon" id="icon" class="form-control" placeholder="Nhập Icon" value="{{ $datas->icon ?? '' }}"></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label><span>Ghi chú</span></label></div>
                    <div class="col-md-9"><textarea type="text" name="note" id="note" rows="2" class="form-control" placeholder="Nhập ghi chú">{{ $datas->note ?? '' }}</textarea></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Thứ tự</span></label></div>
                    <div class="col-md-3"><input type="number" name="order" id="order" class="form-control" placeholder="Thứ tự" value="{{ $datas->order ?? ( $order ?? '' ) }}"></div>
                    <div class="col-md-3">
                        <label class="form-control mt-0 border-0">
                            <input type="checkbox" name="status" id="status"
                                @if(isset($datas->status) && $datas->status === 1) checked="true" @endif>
                            <span>Hoạt động</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="form-control mt-0 border-0">
                            <input type="checkbox" name="is_display_menu" id="is_display_menu"
                                @if(isset($datas->is_display_menu) && $datas->is_display_menu === 1) checked="true" @endif>
                            <span>Hiển thị trang chủ</span>
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer justify-content-between">
            <div class="btn-other ms-0" style="display:flex;">
                <button type="button" id="btn_add_listtype" class="btn btn-success d-flex align-items-center"><i class="bx bx-plus"></i><span>Danh mục</span></button>
                <button type="button" id="btn_add_list" class="btn btn-success d-flex align-items-center ms-1"><i class="bx bx-plus"></i><span>Danh mục đối tượng</span></button>
            </div>
            <div class="ms-0">
                @if(!isset($datas->id))
                <button type="button" id="btn_update" class="btn btn-info">Lưu & Thêm</button>
                @endif
                <button type="button" id="btn_update_close" class="btn btn-primary">Lưu & Đóng</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#frmCategories_add #name").change(function(){
        var date = new Date;
        var str = Library.convertStr(($("#name").val()).trim());
        str = str + '-' + date.getTime() + '.html';
        $("#slug").val(str);
    });
</script>