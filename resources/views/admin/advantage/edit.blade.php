@section('title', 'Advantage Update Page')
@include('admin.layouts.head')
@include('admin.layouts.sidebar')
@include('admin.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Advantage Create Page</h1>

    <form class="expert" method="POST", action="{{route('admin.advantage.update',$advantage->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="rows">
            Title
            <div class="input-group mt-3">
                <input value="{{$advantage->title}}" type="text" name="title" class="form-control" placeholder="Name">
            </div>
            <br>
            Description
            <div class="input-group mt-3">
                <input value= "{{$advantage->description}}" type="text" name="description" class="form-control" placeholder="Job">
            </div>  <br>

            Icon
            <div class="input-group mt-3">
                <input value=" {{$advantage->icon}} " type="text" name="icon" class="form-control" placeholder="Facebook">
            </div>

        </div>

        <button type="submit" class="btn btn-success mt-3"> Update </button>
    </form>
</div>
<!-- /.container-fluid -->
@include('admin.layouts.footer')
