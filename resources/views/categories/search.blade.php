<div class="col-md-4">
    <select name="listtype_id" id="listtype_id" class="form-control chzn-select">
        @if(isset($listtype))
        @foreach($listtype as $key => $value)
        <option id="{{ $value->id }}" value="{{ $value->id }}">{{ $value->name }}</option>
        @endforeach
        @endif
    </select>
</div>
<div class="col-md-8">
    <div class="form-search">
        <div class="input-group">
            <input type="text" class="form-control" name="txt_search" id="txt_search" autocomplete="off" onkeydown="if (event.key == 'Enter'){search();return false;}" placeholder="Tìm kiếm ...">
            <span class="input-group-btn">
                <button type="button" class="btn btn-base" id="btn_search">Tìm kiếm</button>
            </span>
        </div>
    </div>
</div>