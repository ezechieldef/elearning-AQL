<div class="header_container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header_content d-flex flex-row align-items-center justify-content-start">
                    <div class="logo_container">
                        <a href="#">
                            <div class="logo_content d-flex flex-row align-items-end justify-content-start">
                                <div class="logo_img"><img src="{{ asset('elearn-master/images/logo.png') }}"
                                        alt=""></div>
                                <div class="logo_text">learn</div>
                            </div>
                        </a>
                    </div>
                    <nav class="main_nav_contaner ml-auto">
                        <ul class="main_nav">
                            <li class="{{ Request::is('home*') ? 'active' : '' }}"><a
                                    href="{{ route('home') }}">Accueil</a></li>
                            <li class="{{ Request::is('cours-public*') ? 'active' : '' }}"><a
                                    href="{{ route('cours-public') }}">Cours</a></li>
                            <li class="{{ Request::is('seance-live*') ? 'active' : '' }}"><a
                                    href="{{ route('seance-live') }}">Séance Live</a></li>
                            <li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a
                                    href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="{{ Request::is('contact*') ? 'active' : '' }}"><a
                                    href="{{ route('contact') }}">Qui somme nous / Contact</a></li>
                        </ul>
                        <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>

                        <!-- Hamburger -->

                        <div class="hamburger menu_mm">
                            <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</div>
