@section('title', '404 page')
@include('web.layouts.header')

<div class="container-xxl py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                <h1 class="display-1">503</h1>
                <h1 class="mb-4">Server xətası</h1>
            </div>
        </div>
    </div>
</div>
@endsection
@include('web.layouts.footer')
