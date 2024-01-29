<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Cập nhật</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="frmForm_add" autocomplete="off">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <select name="listtype_id" id="listtype_id" class="form-control chzn-select">
                    @if(isset($datas) && count($datas) > 0)
                    @foreach($datas as $key => $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                    @endif
                </select>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" id="btn_update" class="btn btn-primary">Cập nhật</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
        </div>
    </div>
</div>