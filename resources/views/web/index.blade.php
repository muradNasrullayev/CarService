@section('title', 'Home page')
@include('web.layouts.header')

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($carousel as $index => $item)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img class="w-100" src="{{ asset($item->background_image) }}" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">{{$item->title}}</h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">{{$item->description}}</h1>
                                    <a href="{{route('about')}}" class="btn btn-primary py-3 px-5 animated slideInDown">Learn
                                        More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                                <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                    <img class="img-fluid" src="{{ asset($item->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

{{--@include('web.widgets.about-15-years')--}}
@include('web.widgets.service')
@include('web.widgets.booking')
@include('web.widgets.experts')
@include('web.widgets.advantage')
@include('web.widgets.fact')
@include('web.widgets.testimonial')
@include('web.layouts.footer')
