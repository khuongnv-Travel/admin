@php use Modules\Backend\Helpers\SidebarHelper; @endphp
<div class="vertical-menu">
    <div data-simplebar="" class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                @foreach($menuItems as $key => $value)
                @php echo SidebarHelper::menu($key, $value); @endphp
                @endforeach

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-share-line"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" class="has-arrow">Level 2.1</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="javascript: void(0);">Level 2.1.1</a></li>
                                        <li><a href="javascript: void(0);">Level 2.2.2</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>