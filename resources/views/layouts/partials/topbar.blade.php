<div class="top_bar">
    <div class="top_bar_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                        <ul class="top_bar_contact_list">
                            <li>
                                <div class="question">Have any questions?</div>
                            </li>
                            {{-- <li>
                                <div>(009) 35475 6688933 32</div>
                            </li> --}}
                            <li>
                                <div>info@elaern.com</div>
                            </li>
                        </ul>
                        <div class="top_bar_login ml-auto">
                            <ul>
                                @if (is_null(Auth::user()))
                                    <li><a href="{{ route('register') }}">S'inscrire</a></li>
                                    <li><a href="{{ route('login') }}">Se connecter</a></li>
                                @else
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Se
                                            déconnecter</a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
