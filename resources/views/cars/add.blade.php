<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">{{ isset($datas) ? 'Cập nhật' : 'Thêm mới' }}</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="frmCars_add" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" id="id" value="{{ $datas->id ?? '' }}">
                <!-- Danh mục -->
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Danh mục loại xe</span></label></div>
                    <div class="col-md-10">
                        <select name="listtype_id" id="listtype_id" class="chzn-select form-control">
                            @if(isset($listtype))
                            @foreach($listtype as $value)
                            <option value="{{ $value['id'] }}" @if(isset($listtype_id) && $listtype_id==$value['id']) selected @endif>{{ $value['name'] }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <!-- Mã xe -->
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Mã xe</span></label></div>
                    <div class="col-md-10"><input type="text" name="code" id="code" class="form-control text-uppercase" placeholder="Nhập mã xe" value="{{ $datas->code ?? '' }}"></div>
                </div>
                <!-- Tên xe -->
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Tên xe</span></label></div>
                    <div class="col-md-10"><input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên xe" value="{{ $datas->name ?? '' }}"></div>
                </div>
                <!-- Đường dẫn -->
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Đường dẫn</span></label></div>
                    <div class="col-md-10"><input type="text" name="slug" id="slug" class="form-control" disabled placeholder="Nhập đường dẫn" value="{{ $datas->slug ?? '' }}"></div>
                </div>
                <!-- Ảnh đại diện -->
                <div class="mb-3 row">
                    <div class="col-md-2"><label><span>Ảnh đại diện</span></label></div>
                    <div class="col-md-10">
                        <label for="images" class="btn btn-default mt-0 mb-0">Chọn ảnh</label>
                        <input type="file" hidden name="images" id="images" onchange="JS_Car.showImage(this)">
                        <div id="feature_img" class="mt-1 col-md-3">
                            @if(isset($datas->images) && $datas->images)
                            <img src="{{ $datas->images }}" alt="Ảnh đại diện" width="100%">
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Mô tả -->
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Mô tả</span></label></div>
                    <div class="col-md-10">
                        <textarea name="content" id="content" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <!-- Thứ tự & trạng thái -->
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Thứ tự</span></label></div>
                    <div class="col-md-2">
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