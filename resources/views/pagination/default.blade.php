<div class="row align-items-center">
    <input type="hidden" name="_currentPage" id="_currentPage" value="{{$paginator->currentPage()}}">
    <div class="col-md-3">
        <div><span class="page-link text-start">Có {{$paginator->count()}}/ {{$paginator->total()}} bản ghi</span></div>
    </div>
    <div class="col-md-6">
        <div class="main_paginate">
            @if ($paginator->hasPages())
            <ul class="pagination pagination-sm" style="margin: 0;white-space: nowrap;text-align: center;display: flex;justify-content: center;">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled"><span class="page-link next_prev"><i class='bx bxs-chevrons-left'></i></span></li>
                    <li class="page-item disabled"><span class="page-link next_prev"><i class='bx bxs-chevron-left'></i></span></li>
                @else
                    <li class="page-item"><a page="1" class="page-link next_prev" rel="prev"><i class='bx bxs-chevrons-left'></i></a></li>
                    <li class="page-item"><a page="{{$paginator->currentPage() - 1}}" class="page-link next_prev" rel="prev"><i class='bx bxs-chevron-left'></i></a></li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a page="{{ $page }}" class="page-link">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item"><a page="{{$paginator->currentPage() + 1}}" class="page-link next_prev" rel="next"><i class='bx bxs-chevron-right'></i></a></li>
                    <li class="page-item"><a page="{{$paginator->lastPage()}}" class="page-link next_prev" rel="next"><i class='bx bxs-chevrons-right'></i></a></li>
                @else
                    <li class="page-item disabled"><span class="page-link next_prev"><i class='bx bxs-chevron-right'></i></span></li>
                    <li class="page-item disabled"><span class="page-link next_prev"><i class='bx bxs-chevrons-right'></i></span></li>
                @endif
            </ul>
            @else
            <ul class="pagination pagination-sm" style="margin: 0;white-space: nowrap;text-align: center;display: flex;justify-content: center;">
                <li class="page-item disabled"><span class="page-link next_prev"><i class='bx bxs-chevrons-left'></i></span></li>
                <li class="page-item disabled"><span class="page-link next_prev"><i class='bx bxs-chevron-left'></i></span></li>
                <li class="page-item active"><span class="page-link">1</span></li>
                <li class="page-item disabled"><span class="page-link next_prev"><i class='bx bxs-chevron-right'></i></span></li>
                <li class="page-item disabled"><span class="page-link next_prev"><i class='bx bxs-chevrons-right'></i></span></li>
            </ul>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="row left_paginate text-end">
            <span class="col-md-6" style="padding:5px;text-align: center;">Hiển thị</span>
            <select id="cbo_nuber_record_page" class="col-md-6 form-control input-sm" name="cbo_nuber_record_page" style="width: 80px">
                <option id="15" name="15" value="15">15</option>
                <option id="50" name="50" value="50">50</option>
                <option id="100" name="100" value="100">100</option>
            </select>
        </div>
    </div>
</div>