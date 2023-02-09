<!-- BEGIN: TOPBAR
    ==================================================== -->
<div class="topbar">
    <!-- BEGIN: HEADER
    ==================================================== -->
    <div class="g-header">
        <!-- BEGIN: WRAPPER
        ==================================================== -->
        <div class="g-wrapper">
            <!-- Begin: g-header-brand -->
            <img src="{{ asset('/images/dash_01.svg') }}" class="g-header-brand" alt="company logo">
            <!-- End: g-header-brand -->

            <!-- Begin: g-header-nav -->
            <div class="g-header-nav">
                @if(Auth::user()->is_admin)
                <!-- Begin: g-header-nav-item -->
                <a href="/admin/quotations" class="g-header-nav-item" title="Orçamentos">
                    <i class="icon-invoice_02"></i>
                    @if($unread)
                    <span class="danger-bg">{{ $unread->count() }}</span>
                    @endif
                </a>
                <!-- End: g-header-nav-item -->
                @endif
                <!-- Begin: g-header-profile -->
                <a href="/admin/users/{{ Auth::user()->id }}/profile" class="g-header-profile" title="O meu Perfil">
                    <img src="/images/{{ Auth::user()->media ? Auth::user()->media : 'user_03.svg' }}"
                        class=g-profile-pholder" alt="user" title="O Meu Perfil">
                </a>
                <!-- End: g-header-profile -->

                <!-- Begin: g-header-settings -->
                <a href="/admin/settings" class="g-header-settings" style="text-decoration: none;" title="Definições">
                    <img src="/images/settings_01.svg" alt="settings" title="Definições">
                </a>
                <!-- End: g-header-settings -->
                <!-- Begin: g-header-logout -->
                <form action="{{ route('logout') }}" class="g-header-settings" method="POST" title="Sair">
                    @csrf
                    <button class="btn btn-link" type="submit" style="text-decoration: none">
                        <img src="/images/logout_04.svg" alt="logout" title="Sair">
                    </button>
                </form>
                <!-- End: g-header-logout -->
            </div>
            <!-- End: g-header-nav -->
        </div>
        <!-- END: WRAPPER -->
    </div>
    <!-- END: HEADER -->

    <!-- BEGIN: NAVBAR
    ==================================================== -->
    <div class="g-navbar">
        <!-- BEGIN: WRAPPER
        ==================================================== -->
        <div class="g-wrapper">
            <ul>
                <li class="{{ Request::is('home') ? 'active' : ''}}">
                    <!-- Begin: g-navlink-head -->
                    <span class="g-navlink-head ddown">
                        Início
                    </span>
                    <!-- End: g-navlink-head -->
                </li>
                <li class="g-nav-item {{ Request::is('admin/articles') ? 'active' : ''}}">
                    <!-- Begin: g-navlink-head -->
                    <span class="g-navlink-head ddown">
                        Artigos
                    </span>
                    <!-- End: g-navlink-head -->
                    <!-- Begin: g-nav-item-menu -->
                    <div class="g-nav-item-menu shadow">
                        <a href="/admin/headers">Cabeçalhos</a>
                        <a href="/admin/articles">Artigos</a>
                        <a href="/admin/placards">Placards</a>
                        <a href="/admin/services">Serviços</a>
                    </div>
                    <!-- End: g-nav-item-menu -->
                </li>
                <li class="g-nav-item {{ Request::is('admin/galleries') ? 'active' : ''}}">
                    <!-- Begin: g-navlink-head -->
                    <span class="g-navlink-head ddown">
                        Galerias
                    </span>
                    <!-- End: g-navlink-head -->
                    <!-- Begin: g-nav-item-menu -->
                    <div class="g-nav-item-menu ddown">
                        <a href="/admin/galleries">Lista</a>
                        <a href="/admin/galleries/create">Adicionar</a>
                    </div>
                    <!-- End: g-nav-item-menu -->
                </li>
                <li class="g-nav-item {{ Request::is('admin/quotations') ? 'active' : ''}}">
                    <!-- Begin: g-navlink-head -->
                    <span class="g-navlink-head ddown">
                        Orçamentos
                    </span>
                    <!-- End: g-navlink-head -->
                    <!-- Begin: g-nav-item-menu -->
                    <div class="g-nav-item-menu ddown">
                        <a href="/admin/quotations">Lista</a>
                        {{-- <a href="">Adicionar</a> --}}
                    </div>
                    <!-- End: g-nav-item-menu -->
                </li>
                <li class="g-nav-item {{ Request::is('admin/users') ? 'active' : ''}}">
                    <!-- Begin: g-navlink-head -->
                    <span class="g-navlink-head ddown">
                        Utilizadores
                    </span>
                    <!-- End: g-navlink-head -->
                    <!-- Begin: g-nav-item-menu -->
                    <div class="g-nav-item-menu">
                        <a href="/admin/users">Lista</a>
                    </div>
                    <!-- End: g-nav-item-menu -->
                </li>
            </ul>
        </div>
        <!-- END: WRAPPER -->
    </div>
    <!-- END: NAVBAR -->
</div>
<!-- END: TOPBAR -->