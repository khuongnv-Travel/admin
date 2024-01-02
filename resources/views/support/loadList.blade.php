<table class="table table-bordered table-striped">
    <colgroup>
        <col width="5%">
        <col width="40%">
        <col width="40%">
        <col width="15%">
    </colgroup>
    <thead class="thead-light">
        <th>STT</th>
        <th colspan="2">Chức năng</th>
        <th>#</th>
    </thead>
    <tbody>
        @if(isset($datas) && count($datas) > 0)
        @php $i = 0; @endphp
        @foreach($datas as $key => $value)
        <tr>
            <td align="center">{{ ++$i }}</td>
            <td colspan="2">{{ $value['name'] }}</td>
            <td align="center">
                <button type="button" id="btn_{{ $value['code'] }}" class="btn btn-primary" onclick="updateData('{{ $key }}')">Cập nhật</button>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>