@section('title', 'Experts Update Page')
@include('admin.layouts.head')
@include('admin.layouts.sidebar')
@include('admin.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Expert Show Page</h1>

    <form class="expert" method="POST", action="{{route('admin.expert.update',$expert->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="rows">
            <div class="input-group mt-3">
                <input value="{{$expert->name}}" type="text" name="name" class="form-control" placeholder="Name">
            </div>

            <div class="input-group mt-3">
                <input value= "{{$expert->job}}" type="text" name="job" class="form-control" placeholder="Job">
            </div>  <br>
            Image

            <div class="input-group mt-3">
                <img src="{{asset($expert->image)}}"height="120" width="120"> <br>
            </div>

            <br>
            <div class="input-group mt-3">
                <input value=" {{$expert->facebook}} " type="text" name="facebook" class="form-control" placeholder="Facebook">
            </div>
            <div class="input-group mt-3">
                <input value=" {{$expert->twitter}}" type="text" name="twitter" class="form-control" placeholder="Twitter">
            </div>
            <div class="input-group mt-3">
                <input value=" {{$expert->instagram}}" type="text" name="instagram" class="form-control" placeholder="Instagram">
            </div>
        </div>


    </form>
</div>
<!-- /.container-fluid -->
@include('admin.layouts.footer')
