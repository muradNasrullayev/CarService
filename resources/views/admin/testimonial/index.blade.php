@section('title', 'Testimonials Page')
@include('admin.layouts.head')
@include('admin.layouts.sidebar')
@include('admin.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Testimonials Page</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('admin.testimonial.create') }}" class="btn btn-success">Create New Feedback</a>
        </div>
        <div class="card-body">
            <div class="table-responsive" >
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Image</th>
                        <th>Profession</th>
                        <th>Feedback</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($testimonials as $testimonial)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$testimonial->first_name}}</td>
                            <td>{{$testimonial->last_name}}</td>
                            <td><img src="{{ asset($testimonial->image) }}" height="100" width="120"></td>
                            <td> {{$testimonial->profession}}</td>
                            <td>{{$testimonial->feedback}}</td>
                            <td>
                                <div class="btn-group" role="group" style="gap: 2px;">
                                <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                   class="btn btn-warning mt-3">Edit</a> <br>
                                <a href="{{route('admin.testimonial.show', $testimonial->id)}}" class="btn btn-primary mt-3">
                                    <svg href="" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                </a>
                                <form action="{{route('admin.testimonial.destroy', $testimonial->id)}}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mt-3">Delete</button> <br>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@include('admin.layouts.footer')


