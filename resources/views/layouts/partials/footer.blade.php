<footer class="footer mt-3">
    <div class="container">
        <div class="row">

            <!-- About -->
            <div class="col-lg-4 footer_col">
                <div class="footer_about">
                    <div class="logo_container">
                        <a href="#">
                            <div class="logo_content d-flex flex-row align-items-end justify-content-start">
                                <div class="logo_img"><img src="{{ asset('elearn-master/images/logo.png') }}"
                                        alt=""></div>
                                <div class="logo_text">learn</div>
                            </div>
                        </a>
                    </div>
                    <div class="footer_about_text">
                        <p>Maecenas rutrum viverra sapien sed fermentum. Morbi tempor odio eget lacus tempus
                            pulvinar.</p>
                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>

            <div class="col-lg-4 footer_col">
                <div class="footer_links">
                    <div class="footer_title">Quick menu</div>
                    <ul class="footer_list">
                        <li class="{{ Request::is('home*') ? 'active' : '' }}"><a href="{{ route('home') }}">Accueil</a>
                        </li>
                        <li class="{{ Request::is('cours-public*') ? 'active' : '' }}"><a
                                href="{{ route('cours-public') }}">Cours</a></li>
                        <li class="{{ Request::is('seance-live*') ? 'active' : '' }}"><a
                                href="{{ route('seance-live') }}">Séance Live</a></li>
                        <li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a
                                href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="{{ Request::is('contact*') ? 'active' : '' }}"><a href="{{ route('contact') }}">Qui
                                somme nous / Contact</a></li>

                    </ul>
                </div>
            </div>



            <div class="col-lg-4 footer_col">
                <div class="footer_contact">
                    <div class="footer_title">Contact Us</div>
                    <div class="footer_contact_info">
                        <div class="footer_contact_item">
                            <div class="footer_contact_title">Address:</div>
                            <div class="footer_contact_line">1481 Creekside Lane Avila Beach, CA 93424</div>
                        </div>
                        <div class="footer_contact_item">
                            <div class="footer_contact_title">Phone:</div>
                            <div class="footer_contact_line">+53 345 7953 32453</div>
                        </div>
                        <div class="footer_contact_item">
                            <div class="footer_contact_title">Email:</div>
                            <div class="footer_contact_line">yourmail@gmail.com</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
