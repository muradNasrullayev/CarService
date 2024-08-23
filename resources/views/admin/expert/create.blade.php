@section('title', 'Experts Create Page')
@include('admin.layouts.head')
@include('admin.layouts.sidebar')
@include('admin.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Expert Create Page</h1>

    <form class="expert" method="POST", action="{{route('admin.expert.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="rows">
            <div class="input-group mt-3">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>

            <div class="input-group mt-3">
                <input type="text" name="job" class="form-control" placeholder="Job">
            </div>  <br>
            Image

            <div class="input-group mt-3">
                <input type="file" name='image' class="form-control" accept="image/png, image/gif, image/jpeg">
            </div>
            <br>
            <div class="input-group mt-3">
                <input type="text" name="facebook" class="form-control" placeholder="Facebook">
            </div>
            <div class="input-group mt-3">
                <input type="text" name="twitter" class="form-control" placeholder="Twitter">
            </div>
            <div class="input-group mt-3">
                <input type="text" name="instagram" class="form-control" placeholder="Instagram">
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3"> Create </button>
    </form>
</div>
<!-- /.container-fluid -->
@include('admin.layouts.footer')
