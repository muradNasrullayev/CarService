@section('title', 'Service Show Page')
@include('admin.layouts.head')
@include('admin.layouts.sidebar')
@include('admin.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Carousels Show Page</h1>

    <form class="carousel" method="post", action="" enctype="multipart/form-data">
        @csrf
        <div class="rows">
            <div class="input-group mt-3">
                <input type="text" value="{{$service->title}}" name="title" class="form-control" placeholder="Title">
            </div>

            <div class="input-group mt-3">
                <input type="text" name="our_services_name" value="{{$service->our_services_name}}" class="form-control" placeholder="Our Servoce Name">
            </div>

            <div class="input-group mt-3">
                <input type="text" name="icon" VALUE="{{$service->icon}}" class="form-control" placeholder="Icon">
            </div>
            Image

            <div class="input-group mt-3">
                <img src="{{ asset($service->image) }} "height="150" width="150"    >
            </div>

            <div class="input-group mt-3">
                <input type="text" name="description_title" value="{{$service->description_title}}" class="form-control" placeholder="Description Title">
            </div>


            <div class="input-group mt-3">
                <input type="text" name="description" value="{{$service->description}}" class="form-control" placeholder="Description">
            </div>
            <br>
            Advantage
            <div class="input-group mt-3">
                @foreach($service_advantages as $item => $service_advantage)
                    {{$item+1}}-{{$service_advantage}} <br>
                @endforeach
            </div>


        </div>


    </form>
</div>
<!-- /.container-fluid -->
@include('admin.layouts.footer')
