@section('title', 'Contact Page')
@include('admin.layouts.head')
@include('admin.layouts.sidebar')
@include('admin.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Messages</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Read Unread</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->surname}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->subject}}</td>
                            <td>{{$contact->message}}</td>
                            <td>{{$contact->read_unread}}</td>
                            <td>
                                <div class="btn-group" role="group" style="gap: 2px;">
                                    <a href="{{ route('admin.contact.edit', $contact->id) }}"
                                       class="btn btn-warning mt-0">Edit</a> <br>
                                    <form action="{{route('admin.contact.destroy', $contact->id)}}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mt-0">Delete</button> <br>
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
