@extends('layouts.index')

@section('script')
<script>
    var baseUrl = "{{ url('') }}";
    var JS_Room = new JS_Room(baseUrl, 'rooms');
    jQuery(document).ready(function() {
        JS_Room.loadIndex();
    });
</script>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách phòng</h4>
                <div class="page-title-right">
                    @include('button.index')
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <form id="frmRooms_index">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="card-header">
                <div class="row">
                    @include('rooms.search')
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
<div class="modal fade" id="addList" data-bs-backdrop="static"></div>
<div class="modal fade" id="addListtype" data-bs-backdrop="static"></div>
@endsection