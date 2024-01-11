@extends('layouts.index')

@section('script')
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_Listtype = new JS_Listtype(baseUrl, 'listtype', 'listtype');
    jQuery(document).ready(function() {
        JS_Listtype.loadIndex();
    });
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách danh mục</h4>
                <div class="page-title-right">
                    @include('button.index')
                </div>

            </div>
        </div>
    </div>
    <div class="card">
        <form id="frmListtype_index">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="card-header">
                <div class="form-search">
                    <div class="input-group wp60">
                        <input type="text" class="form-control" name="txt_search" id="txt_search" autocomplete="off" onkeydown="if (event.key == 'Enter'){search();return false;}" placeholder="Tìm kiếm ...">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-primary" id="btn_search">Tìm kiếm</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive datatable-custom">
                    <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                        <div id="table-container">
                            <table id="table-data" class="table table-lg table-borderless table-thead-bordered table-bordered table-striped" role="grid" aria-describedby="datatable_info">
                                <colgroup>
                                    <col width="5%">
                                    <col width="35%">
                                    <col width="35%">
                                    <col width="10%">
                                    <col width="15%">
                                </colgroup>
                                <thead class="thead-light">
                                    <tr>
                                        <th><input type="checkbox" name="chk_all_item_id" onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></th>
                                        <th>Mã danh mục</th>
                                        <th>Tên danh mục</th>
                                        <th>Thứ tự</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center"><input type="checkbox" ondblclick="" onclick="{select_checkbox_row(this);}" name="chk_item_id" value="93a2544b-8b43-421b-bbe9-22ba90c27adf"></td>
                                        <td onclick="{select_row(this);}">DM_TRANG_THAI_BAI_VIET</td>
                                        <td onclick="{select_row(this);}">Danh mục trạng thái bài viết</td>
                                        <td onclick="{select_row(this);}" align="center">7</td>
                                        <td onclick="{select_row(this);}" align="center">
                                            <label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">
                                                <input type="checkbox" hidden="" class="custom-control-input toggle-status" id="status_93a2544b-8b43-421b-bbe9-22ba90c27adf" data-id="93a2544b-8b43-421b-bbe9-22ba90c27adf" checked="">
                                                <span class="custom-control-indicator p-0 m-0" onclick="changeStatus('93a2544b-8b43-421b-bbe9-22ba90c27adf')"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input type="checkbox" ondblclick="" onclick="{select_checkbox_row(this);}" name="chk_item_id" value="f8890db6-6e22-4dbe-a6a3-26ade9eaa84c"></td>
                                        <td onclick="{select_row(this);}">DM_LOAI_BAI_VIET</td>
                                        <td onclick="{select_row(this);}">Danh mục loại bài viết</td>
                                        <td onclick="{select_row(this);}" align="center">6</td>
                                        <td onclick="{select_row(this);}" align="center">
                                            <label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">
                                                <input type="checkbox" hidden="" class="custom-control-input toggle-status" id="status_f8890db6-6e22-4dbe-a6a3-26ade9eaa84c" data-id="f8890db6-6e22-4dbe-a6a3-26ade9eaa84c" checked="">
                                                <span class="custom-control-indicator p-0 m-0" onclick="changeStatus('f8890db6-6e22-4dbe-a6a3-26ade9eaa84c')"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input type="checkbox" ondblclick="" onclick="{select_checkbox_row(this);}" name="chk_item_id" value="672ece40-f981-4ef5-b092-95260c857ea1"></td>
                                        <td onclick="{select_row(this);}">DM_CATEGORY_TYPE</td>
                                        <td onclick="{select_row(this);}">Danh mục loại chuyên mục</td>
                                        <td onclick="{select_row(this);}" align="center">5</td>
                                        <td onclick="{select_row(this);}" align="center">
                                            <label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">
                                                <input type="checkbox" hidden="" class="custom-control-input toggle-status" id="status_672ece40-f981-4ef5-b092-95260c857ea1" data-id="672ece40-f981-4ef5-b092-95260c857ea1" checked="">
                                                <span class="custom-control-indicator p-0 m-0" onclick="changeStatus('672ece40-f981-4ef5-b092-95260c857ea1')"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input type="checkbox" ondblclick="" onclick="{select_checkbox_row(this);}" name="chk_item_id" value="7f067301-f5de-4e67-bf3a-cc69a4a740ae"></td>
                                        <td onclick="{select_row(this);}">DM_LAYOUT</td>
                                        <td onclick="{select_row(this);}">Danh mục layout</td>
                                        <td onclick="{select_row(this);}" align="center">4</td>
                                        <td onclick="{select_row(this);}" align="center">
                                            <label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">
                                                <input type="checkbox" hidden="" class="custom-control-input toggle-status" id="status_7f067301-f5de-4e67-bf3a-cc69a4a740ae" data-id="7f067301-f5de-4e67-bf3a-cc69a4a740ae" checked="">
                                                <span class="custom-control-indicator p-0 m-0" onclick="changeStatus('7f067301-f5de-4e67-bf3a-cc69a4a740ae')"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input type="checkbox" ondblclick="" onclick="{select_checkbox_row(this);}" name="chk_item_id" value="9579c7d0-cab0-45b4-9efd-3dabf74a8f1c"></td>
                                        <td onclick="{select_row(this);}">DM_PHUONG_XA</td>
                                        <td onclick="{select_row(this);}">Danh mục phường xã</td>
                                        <td onclick="{select_row(this);}" align="center">3</td>
                                        <td onclick="{select_row(this);}" align="center">
                                            <label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">
                                                <input type="checkbox" hidden="" class="custom-control-input toggle-status" id="status_9579c7d0-cab0-45b4-9efd-3dabf74a8f1c" data-id="9579c7d0-cab0-45b4-9efd-3dabf74a8f1c" checked="">
                                                <span class="custom-control-indicator p-0 m-0" onclick="changeStatus('9579c7d0-cab0-45b4-9efd-3dabf74a8f1c')"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input type="checkbox" ondblclick="" onclick="{select_checkbox_row(this);}" name="chk_item_id" value="bcf43d28-5c10-48c8-986a-d8df794aeb89"></td>
                                        <td onclick="{select_row(this);}">DM_QUAN_HUYEN</td>
                                        <td onclick="{select_row(this);}">Danh mục quận huyện</td>
                                        <td onclick="{select_row(this);}" align="center">2</td>
                                        <td onclick="{select_row(this);}" align="center">
                                            <label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">
                                                <input type="checkbox" hidden="" class="custom-control-input toggle-status" id="status_bcf43d28-5c10-48c8-986a-d8df794aeb89" data-id="bcf43d28-5c10-48c8-986a-d8df794aeb89" checked="">
                                                <span class="custom-control-indicator p-0 m-0" onclick="changeStatus('bcf43d28-5c10-48c8-986a-d8df794aeb89')"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input type="checkbox" ondblclick="" onclick="{select_checkbox_row(this);}" name="chk_item_id" value="cd2ff4cb-f701-43cb-8b84-9c19d7f50f32"></td>
                                        <td onclick="{select_row(this);}">DM_TINH_THANH</td>
                                        <td onclick="{select_row(this);}">Danh mục tỉnh thành</td>
                                        <td onclick="{select_row(this);}" align="center">1</td>
                                        <td onclick="{select_row(this);}" align="center">
                                            <label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">
                                                <input type="checkbox" hidden="" class="custom-control-input toggle-status" id="status_cd2ff4cb-f701-43cb-8b84-9c19d7f50f32" data-id="cd2ff4cb-f701-43cb-8b84-9c19d7f50f32" checked="">
                                                <span class="custom-control-indicator p-0 m-0" onclick="changeStatus('cd2ff4cb-f701-43cb-8b84-9c19d7f50f32')"></span>
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="10">
                                            <div class="row align-items-center">
                                                <input type="hidden" name="_currentPage" id="_currentPage" value="1">
                                                <div class="col-md-3">
                                                    <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">Có 7/ 7 bản ghi</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="main_paginate">
                                                        <ul class="pagination pagination-rounded"  style="margin: 0;white-space: nowrap;text-align: center;display: flex;justify-content: center;">
                                                            <li class="paginate_button page-item previous disabled" id="datatable-buttons_previous"><a href="#" aria-controls="datatable-buttons" data-dt-idx="0" tabindex="0" class="page-link"><i class="bx bxs-chevrons-left"></i></a></li>
                                                            <li class="paginate_button page-item previous disabled" id="datatable-buttons_previous"><a href="#" aria-controls="datatable-buttons" data-dt-idx="0" tabindex="0" class="page-link"><i class="bx bxs-chevron-left"></i></a></li>
                                                            <li class="paginate_button page-item active"><a href="#" aria-controls="datatable-buttons" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                            <li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                            <li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                            <li class="paginate_button page-item next" id="datatable-buttons_next"><a href="#" aria-controls="datatable-buttons" data-dt-idx="7" tabindex="0" class="page-link"><i class="bx bxs-chevron-right"></i></a></li>
                                                            <li class="paginate_button page-item next" id="datatable-buttons_next"><a href="#" aria-controls="datatable-buttons" data-dt-idx="7" tabindex="0" class="page-link"><i class="bx bxs-chevrons-right"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row left_paginate text-end">
                                                        <span class="col-md-6" style="padding:5px;text-align: center;">Hiển thị</span>
                                                        <select id="cbo_nuber_record_page" class="col-md-6 form-control input-sm" name="cbo_nuber_record_page" style="width: 80px">
                                                            <option id="15" name="15" value="15">15</option>
                                                            <option id="50" name="50" value="50">50</option>
                                                            <option id="100" name="100" value="100">100</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="addModal" data-bs-backdrop="static"></div>
@endsection