@extends('layouts.index')

@section('script')
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_Car = new JS_Car(baseUrl, 'cars');
    jQuery(document).ready(function() {
        JS_Car.loadIndex();
    });
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách xe</h4>
                <div class="page-title-right">
                    @include('button.index')
                </div>

            </div>
        </div>
    </div>
    <div class="card">
        <form id="frmCars_index">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <select name="listtype_id" id="listtype_id" class="chzn-select form-control">
                            @if(isset($listtype))
                            @foreach($listtype as $value)
                            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    @include('button.search')
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive datatable-custom">
                    <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                        <div id="table-container"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-focus="false"></div>
@endsection