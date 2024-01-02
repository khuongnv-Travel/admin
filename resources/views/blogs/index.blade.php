@extends('layouts.index')
@section('js')
<script src="{{ URL::asset('dist/js/JS_Blog.js') }}"></script>
@endsection
@section('content')
<div class="main-content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Quản trị bài viết</h1>
            </div>
            @include('button.index')
        </div>
    </div>
    <div class="page-body">
        <div class="card">
            <form id="frmBlogs_index">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="card-header">
                    <div class="row">
                        @include('blogs.search')
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
</div>
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-focus="false"></div>
<div class="modal fade" id="addList" data-bs-backdrop="static"></div>
<div class="modal fade" id="addListtype" data-bs-backdrop="static"></div>
<script>
    var baseUrl = "{{ url('') }}";
    var JS_Blog = new JS_Blog(baseUrl, 'blogs');
    jQuery(document).ready(function() {
        JS_Blog.loadIndex();
    });
</script>
@endsection