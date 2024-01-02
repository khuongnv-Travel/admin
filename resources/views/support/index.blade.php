@extends('layouts.index')
@section('css')
<style>
    #frmSupport_index table tr td {
        vertical-align: middle;
    }
</style>
@endsection
@section('js')
<script src="{{ URL::asset('dist/js/JS_Support.js') }}"></script>
@endsection
@section('content')
<div class="main-content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Hỗ trợ hệ thống</h1>
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
<script>
    var baseUrl = "{{ url('') }}";
    var JS_Support = new JS_Support(baseUrl, 'support');
    jQuery(document).ready(function() {
        JS_Support.loadIndex();
    });
</script>
@endsection