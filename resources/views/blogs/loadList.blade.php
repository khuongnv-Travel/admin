<table id="table-data" class="table table-lg table-borderless table-thead-bordered table-bordered table-striped" role="grid" aria-describedby="datatable_info">
    <colgroup>
        <col width="5%">
        <col width="30%">
        <col width="15%">
        <col width="20%">
        <col width="10%">
        <col width="15%">
        <col width="5%">
    </colgroup>
    <thead class="thead-light">
        <th><input type="checkbox" name="chk_all_item_id" onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></th>
        <th>Tiêu đề</th>
        <th>Ngày đăng</th>
        <th>Ảnh</th>
        <th>Thứ tự</th>
        <th>Trạng thái</th>
        <th>#</th>
    </thead>
    <tbody>
        @if(isset($datas) && count($datas) > 0)
        @foreach($datas as $data)
        @php $id = $data->id; @endphp
        <tr>
            <td align="center"><input type="checkbox" ondblclick="" onclick="{select_checkbox_row(this);}" name="chk_item_id" value="{{$data->id}}"></td>
            <td onclick="{select_row(this);}">{{ $data->title }}</td>
            <td onclick="{select_row(this);}" align="center">{{ !empty($data->date_create) ? date('d/m/Y', strtotime($data->date_create)) : '' }}</td>
            <td onclick="{select_row(this);}" align="center">
                <img src="{{ $data->images ?? '' }}" alt="Ảnh đại diện" width="80">
            </td>
            <td onclick="{select_row(this);}" align="center">{{ $data->order }}</td>
            <td onclick="{select_row(this);}" align="center">
                <label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">
                    <input type="checkbox" hidden class="custom-control-input toggle-status" id="status_{{$id}}" data-id="{{$id}}" {{ $data->status == 1 ? 'checked' : '' }}>
                    <span class="custom-control-indicator p-0 m-0" onclick="changeStatus('{{$id}}')"></span>
                </label>
            </td>
            <td>
                <a href="{{ config('moduleConfig.url_client') . 'blog/reader/' . $data->slug }}" class="btn btn-success" target="_blank"><i class="bx bx-show"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
    <tfoot>
        @if(isset($datas) && count($datas) > 0)
        <tr>
            <td colspan="10">{{ $datas->links('pagination.default') }}</td>
        </tr>
        @else
        <tr>
            <td align="center" colspan="10">Không tìm thấy dữ liệu!</td>
        </tr>
        @endif
    </tfoot>
</table>