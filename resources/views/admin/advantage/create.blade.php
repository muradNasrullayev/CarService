@section('title', 'Advantage Create Page')
@include('admin.layouts.head')
@include('admin.layouts.sidebar')
@include('admin.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Advantage Create Page</h1>

    <form class="carousel" method="post", action="{{route('admin.advantage.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="rows">
            <div class="input-group mt-3">
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>

            <div class="input-group mt-3">
                <input type="text" name="description" class="form-control" placeholder="Description">
            </div>

            <div class="input-group mt-3">
                <input type="text" name="icon" class="form-control" placeholder="Icon">
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3"> Create </button>
    </form>
</div>
<!-- /.container-fluid -->
@include('admin.layouts.footer')
