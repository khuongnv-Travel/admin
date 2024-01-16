@php use Modules\Backend\Helpers\SidebarHelper; @endphp
<div class="vertical-menu">
    <div data-simplebar="" class="h-100">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: -16.8px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%;overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <div id="sidebar-menu">
                                <ul class="metismenu list-unstyled" id="side-menu">
                                    @foreach($menuItems as $key => $value)
                                    @php echo SidebarHelper::menu($key, $value); @endphp
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>