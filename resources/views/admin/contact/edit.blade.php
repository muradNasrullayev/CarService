@section('title', 'Messages Page')
@include('admin.layouts.head')
@include('admin.layouts.sidebar')
@include('admin.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">
    <form class="expert" method="POST" action="{{route('admin.contact.update', $contact->id)}}"
          style="max-width: 600px; margin: auto;">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
            <input value="{{ $contact->name }}" type="email" readonly name="name" class="form-control" >
        </div>
        <div class="form-group mt-3">
            <input value="{{ $contact->surname }}" type="text" readonly name="surname" class="form-control" >
        </div>
        <div class="form-group mt-3">
            <input value="{{ $contact->email }}" type="email"  readonly name="email" class="form-control" >
        </div>
        <div class="form-group mt-3">
            <input value="{{ $contact->subject }}" readonly type="text" name="subject" class="form-control">
        </div>
        <div class="form-group mt-3">
            <input value="{{ $contact->message }}" type="text" readonly name="message" class="form-control">
        </div>

        <div class="form-group mt-3">
            <textarea name="answer" class="form-control" placeholder="Your answer" rows=5></textarea>
        </div>


        <a href="{{route('admin.contact.index')}}" class="btn btn-info mt-3">Back</a>
        <button type="submit" class="btn btn-success mt-3">Answer</button>
    </form>
</div>
<!-- /.container-fluid -->
@include('admin.layouts.footer')
