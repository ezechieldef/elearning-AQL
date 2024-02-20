@php
    // Exemple:
    // $breadcrumbs = [
    //     'Cours' => '/cours',
    //     'Cours de soutien' => '/cours-de-soutien',
    //     'Cours de soutien en ligne' => '/cours-de-soutien-en-ligne',
    //     'Cours de soutien en ligne en groupe' => '/cours-de-soutien-en-ligne-en-groupe',
    // ];
    // $pageTitle = 'Cours de soutien en ligne en groupe';
@endphp

<div class="home mb-3">
    <!-- Background image artist https://unsplash.com/@thepootphotographer -->
    <div class="home_background parallax_background parallax-window" data-parallax="scroll"
        data-image-src="elearn-master/images/courses.jpg" data-speed="0.8"></div>
    <div class="home_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="home_content text-center">
                        <div class="home_title">{{ $pageTitle ?? '$pageTitle' }} </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{ route('home') }}">Accueil</a>
                                </li>
                                @foreach ($breadcrumbs ?? [] as $brkey => $brval)
                                    <li class="{{ $loop->last ? 'active' : '' }}"><a
                                            @if (!empty($brkey)) href="{{ $brval }}" @endif>{{ $brkey }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
