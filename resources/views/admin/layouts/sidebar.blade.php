<div class="navbar-bg">
</div>
<!-- Navbar Starts-->
@include('admin.layouts.navbar')
<!-- Navbar Ends -->
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">{{ __('Blog') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">{{ __('BG') }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('Dashboard') }}</li>
            <li class="active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>{{ __('Dashboard') }}</span></a>
            </li>
            <li class="menu-header">{{ __('Starter') }}</li>
            <li class="{{ setSidebarActive(['admin.category.*']) }}" ><a class="nav-link" href="{{ route('admin.category.index') }}"><i class="far fa-square"></i>
                    <span>{{ __('Category') }}</span></a></li>
            <li class="dropdown {{ setSidebarActive(['admin.news.*']) }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>{{ __('News') }}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.news.*']) }}" ><a class="nav-link" href="{{ route('admin.news.index') }}">{{ __('All News') }}</a></li>
                    <li><a class="nav-link" href="forms-editor.html">{{ __('Editor') }}</a></li>
                </ul>
            </li>
            <li class="dropdown {{ setSidebarActive(['admin.about.*', 'admin.contact.*']) }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>{{ __('Pages') }}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.about.*']) }}" ><a class="nav-link" href="{{ route('admin.about.index') }}">{{ __('About Page') }}</a></li>
                    <li class="{{ setSidebarActive(['admin.contact.*']) }}" ><a class="nav-link" href="{{ route('admin.contact.index') }}">{{ __('Contact Page') }}</a></li>
                </ul>
            </li>
            <li class="{{ setSidebarActive(['admin.social-count.*']) }}"><a class="nav-link" href="{{ route('admin.social-count.index') }}"><i class="far fa-square"></i>
                    <span>{{ __('Social Count') }}</span></a></li>
            <li class="{{ setSidebarActive(['admin.home-section-setting.*']) }}"><a class="nav-link" href="{{ route('admin.home-section-setting.index') }}"><i
                        class="far fa-square"></i> <span>{{ __('Home Section Setting') }}</span></a></li>
            <li class="{{ setSidebarActive(['admin.contact-form-message.*']) }}"><a class="nav-link" href="{{ route('admin.contact-form-message.index') }}"><i
                        class="far fa-square"></i> <span>{{ __('Contact Messages') }}</span>
                    @if ($unreadContactMessages > 0)
                        <i class="badge bg-success text-white">{{ $unreadContactMessages }}</i>
                    @endif
                </a></li>
            <li class="{{ setSidebarActive(['admin.advert.*']) }}"><a class="nav-link" href="{{ route('admin.advert.index') }}"><i class="far fa-square"></i>
                    <span>{{ __('Advertisement') }}</span></a></li>
            <li class="{{ setSidebarActive(['admin.language.*']) }}"><a class="nav-link" href="{{ route('admin.language.index') }}"><i class="far fa-square"></i>
                    <span>{{ __('Languages') }}</span></a></li>
            <li class="{{ setSidebarActive(['admin.subscribers.*']) }}"><a class="nav-link" href="{{ route('admin.subscribers.index') }}"><i class="far fa-square"></i>
                    <span>{{ __('Subscribers') }}</span></a></li>
            <li class="dropdown {{ setSidebarActive([
                                      'admin.social-link.*',
                                      'admin.footer-information.*',
                                      'admin.footer-grid-one.*',
                                      'admin.footer-grid-two.*',
                                      'admin.footer-grid-three.*'
                                      ])
                                 }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>{{ __('Footer Settings') }}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.social-link.*']) }}"><a class="nav-link" href="{{ route('admin.social-link.index') }}">{{ __('Social Links') }}</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-information.*']) }}"><a class="nav-link" href="{{ route('admin.footer-information.index') }}">{{ __('Footer Information') }}</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.footer-grid-one.*']) }}"><a class="nav-link" href="{{ route('admin.footer-grid-one.index') }}">{{ __('Footer Grid One') }}</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-grid-two.*']) }}"><a class="nav-link" href="{{ route('admin.footer-grid-two.index') }}">{{ __('Footer Grid Two') }}</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-grid-three.*']) }}"><a class="nav-link" href="{{ route('admin.footer-grid-three.index') }}">{{ __('Footer Grid Three') }}</a>
                    </li>
                </ul>
            </li>
            <li class="{{ setSidebarActive(['admin.setting.*']) }}"><a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="far fa-square"></i>
                <span>{{ __('Settings') }}</span></a></li>
        </ul>
    </aside>
</div>
