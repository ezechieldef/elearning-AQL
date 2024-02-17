@php
    $breadcrumbs = [
        'Cours' => '/cours',
        'Cours de soutien' => '/cours-de-soutien',
        'Cours de soutien en ligne' => '/cours-de-soutien-en-ligne',
        'Cours de soutien en ligne en groupe' => '/cours-de-soutien-en-ligne-en-groupe',
    ];
    $pageTitle = 'Cours de soutien en ligne en groupe';
@endphp
<section class="hero-wrap hero-wrap-2" style="background-image: url('studylab-main/images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="/">Accueil </a></span>
                    @foreach ($breadcrumbs ?? [] as $brkey => $brval)
                        <a href="{{ $brval }}" class="text-white">
                            <i class="fa fa-chevron-right"></i>
                            {{ $brkey }}
                        </a>
                    @endforeach
                </p>
                <h1 class="mb-0 bread">{{ $pageTitle ?? 'PageTitle' }} </h1>
            </div>
        </div>
    </div>
</section>
