@section('title', 'Testimonial Edit Page')
@include('admin.layouts.head')
@include('admin.layouts.sidebar')
@include('admin.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Testimonial Show Page</h1>

    <form class="carousel" method="post" action="{{route('admin.testimonial.update', $testimonial->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="rows">
            <div class="input-group mt-3">
                <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $testimonial->first_name }}">
            </div>

            <div class="input-group mt-3">
                <input type="text" name="last_name" class="form-control" placeholder="First Name" value="{{ $testimonial->last_name }}">
            </div>

            Image
            <br>
            <img src="{{asset($testimonial->image)}}" HEIGHT="120" width="140 "> <br>
            <div class="input-group mt-3">
            </div>


            <div class="input-group mt-3">
                <input type="text" name="profession" class="form-control" placeholder="profession"
                       value="{{ $testimonial->profession }}">
            </div>

            <div class="input-group mt-3">
                <input type="text" name="feedback" class="form-control" placeholder="First Name" value="{{ $testimonial->feedback }}">
            </div>
        </div>


    </form>
</div>
<!-- /.container-fluid -->
@include('admin.layouts.footer')
