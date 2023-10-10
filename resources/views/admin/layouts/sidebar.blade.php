<div class="navbar-bg"></div>
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
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>{{ __('Dashboard') }}</span></a>
            </li>
            <li class="menu-header">{{ __('Starter') }}</li>
            <li><a class="nav-link" href="{{ route('admin.category.index') }}"><i class="far fa-square"></i> <span>{{ __('Category') }}</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>News</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.news.index') }}">All News</a></li>
                    <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                    <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('admin.social-count.index') }}"><i class="far fa-square"></i> <span>{{ __('Social Count') }}</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.home-section-setting.index') }}"><i class="far fa-square"></i> <span>{{ __('Home Section Setting') }}</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.advert.index') }}"><i class="far fa-square"></i> <span>{{ __('Advertisement') }}</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.language.index') }}"><i class="far fa-square"></i> <span>{{ __('Languages') }}</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.subscribers.index') }}"><i class="far fa-square"></i> <span>{{ __('Subscribers') }}</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>Footer Settings</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.social-link.index') }}">Social Links</a></li>
                    <li><a class="nav-link" href="{{ route('admin.footer-information.index') }}">Footer Information</a></li>
                    <li><a class="nav-link" href="{{ route('admin.footer-grid-one.index') }}">Footer Grid One</a></li>
                    <li><a class="nav-link" href="{{ route('admin.footer-grid-two.index') }}">Footer Grid Two</a></li>
                    <li><a class="nav-link" href="{{ route('admin.footer-grid-three.index') }}">Footer Grid Three</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
