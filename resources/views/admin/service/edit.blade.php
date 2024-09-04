@section('title', 'Service Edit Page')
@include('admin.layouts.head')
@include('admin.layouts.sidebar')
@include('admin.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Service Edit Page</h1>

    <form class="carousel" method="post" action="{{route('admin.service.update', $service->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
            <br>
            <img src="{{ asset($service->image) }} "height="150" width="150"    > <br>
            <div class="input-group mt-3">
                <br>
                <br>
                <input type="file" name='image'> <br>
            </div>


            <div class="input-group mt-3">
                <input type="text" name="description_title" value="{{$service->description_title}}" class="form-control" placeholder="Description Title">
            </div>



            <div class="input-group mt-3">
                <input type="text" name="description" value="{{$service->description}}" class="form-control" placeholder="Description">
            </div>


            @foreach($advantages as $advantage)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$advantage->id}}"
                           id="flexCheckDefault{{$advantage->id}}" name="advantages[]"
                           @if($advantages_id->contains($advantage->id)) checked @endif>
                    <label class="form-check-label" for="flexCheckDefault{{$advantage->id}}">
                        {{$advantage->title}}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success mt-3"> Save </button>
    </form>
</div>

<!-- /.container-fluid -->
@include('admin.layouts.footer')
