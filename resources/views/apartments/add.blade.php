<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">{{ isset($datas) ? 'Cập nhật' : 'Thêm mới' }}</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="frmApartments_add" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" id="id" value="{{ $datas->id ?? '' }}">
                <!-- Danh mục -->
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Danh mục căn hộ</span></label></div>
                    <div class="col-md-10">
                        <select name="listtype" id="listtype" class="chzn-select form-control">
                            @if(isset($listtype))
                            @foreach($listtype as $value)
                            <option value="{{ $value['id'] }}" @if(isset($listtype_id) && $listtype_id==$value['id']) selected @endif>{{ $value['name'] }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <!-- Mã căn hộ -->
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Mã căn hộ</span></label></div>
                    <div class="col-md-10"><input type="text" name="code" id="code" class="form-control text-uppercase" placeholder="Nhập mã căn hộ" value="{{ $datas->code ?? '' }}"></div>
                </div>
                <!-- Tên căn hộ -->
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Tên căn hộ</span></label></div>
                    <div class="col-md-10"><input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên căn hộ" value="{{ $datas->name ?? '' }}"></div>
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
                        <input type="file" hidden name="images" id="images"
                                accept=".jpg, .jpeg, .png, .gif"
                                onchange="JS_Apartment.showImage(this)">
                        <div id="feature_img" class="mt-1 col-md-3">
                            @if(isset($datas->images) && $datas->images)
                            <img src="{{ $datas->images }}" alt="Ảnh đại diện" width="100%">
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Tỉnh/Thành -->
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Chọn địa chỉ</span></label></div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-4">
                                <select name="provinces" id="provinces" class="chzn-select form-control">
                                    <option value="">--Chọn Tỉnh/Thành--</option>
                                    @if(isset($provinces))
                                    @foreach($provinces as $key => $value)
                                    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="districts" id="districts" class="chzn-select form-control">
                                    <option value="">--Chọn Quận/Huyện--</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="wards" id="wards" class="chzn-select form-control">
                                    <option value="">--Chọn Phường/Xã/Thị trấn--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Địa chỉ -->
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Địa chỉ</span></label></div>
                    <div class="col-md-10"><input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ" value="{{ $datas->slug ?? '' }}"></div>
                </div>
                <!-- Ghi chú -->
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Ghi chú</span></label></div>
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