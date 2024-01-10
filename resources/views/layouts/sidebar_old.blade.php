@php use Modules\Backend\Helpers\SidebarHelper; @endphp
<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-base navbar-vertical-aside-initialized">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <a class="navbar-brand" href="index.html" aria-label="Front">
                <div class="logo">
                    <span class="d-flex align-items-center">
                        <img class="navbar-brand-logo" src="{{ URL::asset('dist/images/logo.png') }}" alt="Logo" data-hs-theme-appearance="default">
                        <span class="ps-1" style="font-size: 2rem;"><b class="text-logo">DEVPRO</b></span>
                    </span>
                </div>
                <div class="logo-mini">
                    <img class="navbar-brand-logo-mini" src="{{ URL::asset('dist/images/logo.png') }}" alt="Logo" data-hs-theme-appearance="default">
                </div>
            </a>
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bx bx-chevron-left navbar-toggler-short-align"></i>
                <i class="bx bx-menu navbar-toggler-full-align"></i>
            </button>

            <div class="navbar-vertical-content">
                <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
                    <div id="navbarVerticalMenuPagesMenu">
                        @foreach($menuItems as $key => $value)
                            @php echo SidebarHelper::menu('admin', $key, $value); @endphp
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="navbar-vertical-footer">
                <ul class="navbar-vertical-footer-list">
                    <li class="navbar-vertical-footer-list-item">
                        <!-- Style Switcher -->
                        <div class="dropdown dropup">
                            <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>

                            </button>

                            <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                                <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                                    <i class="bi-moon-stars me-2"></i>
                                    <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
                                </a>
                                <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                                    <i class="bi-brightness-high me-2"></i>
                                    <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
                                </a>
                                <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                                    <i class="bi-moon me-2"></i>
                                    <span class="text-truncate" title="Dark">Dark</span>
                                </a>
                            </div>
                        </div>

                        <!-- End Style Switcher -->
                    </li>

                    <li class="navbar-vertical-footer-list-item">
                        <!-- Other Links -->
                        <div class="dropdown dropup">
                            <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="otherLinksDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                <i class="bi-info-circle"></i>
                            </button>

                            <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="otherLinksDropdown">
                                <span class="dropdown-header">Help</span>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-journals dropdown-item-icon"></i>
                                    <span class="text-truncate" title="Resources &amp; tutorials">Resources &amp; tutorials</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-command dropdown-item-icon"></i>
                                    <span class="text-truncate" title="Keyboard shortcuts">Keyboard shortcuts</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-alt dropdown-item-icon"></i>
                                    <span class="text-truncate" title="Connect other apps">Connect other apps</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-gift dropdown-item-icon"></i>
                                    <span class="text-truncate" title="What's new?">What's new?</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <span class="dropdown-header">Contacts</span>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-chat-left-dots dropdown-item-icon"></i>
                                    <span class="text-truncate" title="Contact support">Contact support</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Other Links -->
                    </li>

                    <li class="navbar-vertical-footer-list-item">
                        <!-- Language -->
                        <div class="dropdown dropup">
                            <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                <img class="avatar avatar-xss avatar-circle" src="" alt="United States Flag">
                            </button>

                            <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown">
                                <span class="dropdown-header">Select language</span>
                                <a class="dropdown-item" href="#">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="" alt="Flag">
                                    <span class="text-truncate" title="English">English (US)</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="" alt="Flag">
                                    <span class="text-truncate" title="English">English (UK)</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="" alt="Flag">
                                    <span class="text-truncate" title="Deutsch">Deutsch</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="" alt="Flag">
                                    <span class="text-truncate" title="Dansk">Dansk</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="" alt="Flag">
                                    <span class="text-truncate" title="Italiano">Italiano</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="" alt="Flag">
                                    <span class="text-truncate" title="中文 (繁體)">中文 (繁體)</span>
                                </a>
                            </div>
                        </div>

                        <!-- End Language -->
                    </li>
                </ul>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</aside>