<table id="table-data" class="table table-lg table-borderless table-thead-bordered table-bordered table-striped" role="grid" aria-describedby="datatable_info">
    <colgroup>
        <col width="5%">
        <col width="35%">
        <col width="35%">
        <col width="10%">
        <col width="15%">
    </colgroup>
    <thead class="thead-light">
        <th align="center"><input type="checkbox" name="chk_all_item_id" onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></th>
        <th>Mã danh mục</th>
        <th>Tên danh mục</th>
        <th>Thứ tự</th>
        <th>Trạng thái</th>
    </thead>
    <tbody>
        @if(isset($datas) && count($datas) > 0)
        @foreach($datas as $data)
        @php $id = $data->id; @endphp
        <tr>
            <td align="center"><input type="checkbox" ondblclick="" onclick="{select_checkbox_row(this);}" name="chk_item_id" value="{{$data->id}}"></td>
            <td onclick="{select_row(this);}">{{ $data->code }}</td>
            <td onclick="{select_row(this);}">{{ $data->name }}</td>
            <td onclick="{select_row(this);}" align="center">{{ $data->order }}</td>
            <td onclick="{select_row(this);}" align="center">
                <label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">
                    <input type="checkbox" hidden class="custom-control-input toggle-status" id="status_{{$id}}" data-id="{{$id}}" {{ $data->status == 1 ? 'checked' : '' }}>
                    <span class="custom-control-indicator p-0 m-0" onclick="JS_Listtype.changeStatus('{{$id}}')"></span>
                </label>
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