@section('title','Advantages Page')
@include('web.layouts.header')

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('web-template/img/carousel-bg-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>7
    <!-- Page Header End -->

@include('web.widgets.advantage')
@include('web.widgets.about-15-years')
@include('web.widgets.fact')
@include('web.widgets.experts')
@include('web.layouts.footer')
