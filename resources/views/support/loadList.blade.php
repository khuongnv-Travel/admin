<table class="table table-bordered table-striped">
    <colgroup>
        <col width="5%">
        <col width="70%">
        <col width="25%">
    </colgroup>
    <thead class="thead-light">
        <th>STT</th>
        <th>Chức năng</th>
        <th>#</th>
    </thead>
    <tbody>
        @if(isset($datas) && count($datas) > 0)
        @php $i = 0; @endphp
        @foreach($datas as $key => $value)
        <tr>
            <td align="center">{{ ++$i }}</td>
            <td>{{ $value['name'] }}</td>
            <td align="center">
                <button type="button" id="btn_{{ $value['code'] }}" class="btn btn-primary" onclick="JS_Support.updateData('{{ $key }}')">Cập nhật</button>
                @if(isset($value['options']))
                    @foreach($value['options'] as $k => $v)
                    @php $code = $v['code']; @endphp
                    <br>
                    {{-- <button type="button" id="btn_child_{{ $code }}" class="btn btn-primary mt-1" onclick="JS_Support.updateData('{{ $key }}', '{{ $code }}')">{{ $v['name'] }}</button> --}}
                    <button type="button" id="btn_child_{{ $code }}" class="btn btn-primary mt-1" onclick="JS_Support.formUpdate('{{ $key }}', '{{ $code }}')">{{ $v['name'] }}</button>
                    @endforeach
                @endif
            </td>
        </tr>
        @endforeach
        @endif
        <tr>
            <td></td>
            <td>
                <input type="file" id="file" name="file">
            </td>
            <td><button type="button" id="btn_file">xác nhận</button></td>

        </tr>
    </tbody>
</table>