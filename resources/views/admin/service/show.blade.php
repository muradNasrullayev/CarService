@section('title', 'Carousels Edit Page')
@include('admin.layouts.head')
@include('admin.layouts.sidebar')
@include('admin.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Carousels Show Page</h1>

    <form class="carousel" method="post" action="{{route('admin.carousels.update', $carousel->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="rows">
            <div class="input-group mt-3">
                <input type="text" name="title" class="form-control" placeholder="title" value="{{ $carousel->title }}">
            </div>

            <div class="input-group mt-3">
                <input type="text" name="description" class="form-control" placeholder="description"
                       value="{{ $carousel->description }}">
            </div>
            Image
            <br>
            <img src="{{asset($carousel->image)}}" HEIGHT="120" width="140 "> <br>
            <br>
            <div class="input-group mt-3">
                {{--                <img src="">--}}



            </div>
            <br>Background Image
            <br>
            <img src="{{asset($carousel->background_image)}} "HEIGHT="120" width="140 "> <br>

            <div class="input-group mt-3">

            </div>
        </div>


    </form>
</div>
<!-- /.container-fluid -->
@include('admin.layouts.footer')
