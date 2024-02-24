<div class="container-fluid">
    @if ($errors->any())
        <div class="alert alert-danger mt-3" role="alert">
            <div class="d-flex">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="alert-icon icon icon-tabler icon-tabler-circle-x"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M10 10l4 4m0 -4l-4 4"></path>
                    </svg>
                </div>
                <div class="">
                    <h4 class="alert-title"> Oops !</h4>
                    <div class="text-muted">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
