@php use Modules\Backend\Helpers\SidebarHelper; @endphp
<div class="vertical-menu">
    <div data-simplebar="" class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                @foreach($menuItems as $key => $value)
                    @php echo SidebarHelper::menu($key, $value); @endphp
                @endforeach
            </ul>
        </div>
    </div>
</div>