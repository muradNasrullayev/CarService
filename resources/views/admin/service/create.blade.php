@section('title', 'Carousels Create Page')
@include('admin.layouts.head')
@include('admin.layouts.sidebar')
@include('admin.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Carousels Create Page</h1>

    <form class="carousel" method="post", action="{{route('admin.service.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="rows">
            <div class="input-group mt-3">
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>

            <div class="input-group mt-3">
                <input type="text" name="our_services_name" class="form-control" placeholder="Our Servoce Name">
            </div>

            <div class="input-group mt-3">
                <input type="text" name="icon" class="form-control" placeholder="Icon">
            </div>
            Image
            <div class="input-group mt-3">
                <input type="file" name='image' class="form-control" accept=".png, .jpg, .jpeg, .gif, .svg">
            </div>

            <div class="input-group mt-3">
                <input type="text" name="description_title" class="form-control" placeholder="Description Title">
            </div>


            <div class="input-group mt-3">
                <input type="text" name="description" class="form-control" placeholder="Description">
            </div>

            @foreach($advantages as $advantage)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$advantage->id}}"
                           id="flexCheckDefault{{$advantage->id}}" name="advantages[]">
                    <label class="form-check-label" for="flexCheckDefault{{$advantage->id}}">
                        {{$advantage->title}}
                    </label>
                </div>
            @endforeach

        </div>

        <button type="submit" class="btn btn-success mt-3"> Create </button>
    </form>
</div>
<!-- /.container-fluid -->
@include('admin.layouts.footer')
