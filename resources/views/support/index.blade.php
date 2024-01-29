@extends('layouts.index')
@section('css')
<style>
    #frmSupport_index table tr td {
        vertical-align: middle;
    }
</style>
@endsection
@section('script')
<script>
    var baseUrl = "{{ url('') }}";
    var JS_Support = new JS_Support(baseUrl, 'support');
    jQuery(document).ready(function() {
        JS_Support.loadIndex();
    });
</script>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Hỗ trợ hệ thống</h4>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="card">
            <form id="frmSupport_index">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="card-body">
                    <div class="datatable-custom">
                        <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                            <div id="table-container">
                                @include('support.loadList')
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addModal" data-bs-backdrop="static"></div>
@endsection