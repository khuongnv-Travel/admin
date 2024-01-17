<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">{{ isset($datas) ? 'Cập nhật' : 'Thêm mới' }}</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="frmApartments_add" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" id="id" value="{{ $datas->id ?? '' }}">
                {!! $htmls !!}
                {{--<div class="mb-3 row">
                    <div class="col-md-3"><label><span>Ảnh đại diện</span></label></div>
                    <div class="col-md-9">
                        <label for="images" class="btn btn-default mt-0">Chọn ảnh</label>
                        <input type="file" hidden name="images" id="images" onchange="JS_Apartment.showImage(this)">
                        <div id="feature_img" class="mt-1 col-md-3">
                            @if(isset($datas->images) && $datas->images)
                            <img src="{{ $datas->images }}" alt="Ảnh đại diện" width="100%">
                            @endif
                        </div>
                    </div>
                </div>--}}
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Thứ tự</span></label></div>
                    <div class="col-md-3">
                        <input type="number" name="order" id="order" class="form-control" placeholder="Thứ tự" value="{{ $datas->order ?? ( $order ?? '' ) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-control mt-0 border-0 ps-0 pe-0">
                            <input type="checkbox" name="status" id="status" @if(isset($datas->status) && $datas->status === 1) checked="true" @endif>
                            <span>Hoạt động</span>
                        </label>
                    </div>
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
<script>
    $("#name").change(function() {
        var date = new Date;
        var str = Library.convertStr(($("#name").val()).trim());
        str = str + '-' + date.getTime() + '.html';
        $("#slug").val(str);
    });
</script>