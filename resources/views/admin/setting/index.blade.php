@section('title', 'Settings Page')
@include('admin.layouts.head')
@include('admin.layouts.sidebar')
@include('admin.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">
    <form class="expert" method="POST" action="{{route('admin.setting.update', $setting->id)}}" style="max-width: 600px; margin: auto;">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
            <input value="{{ $setting->email }}" type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group mt-3">
            <input value="{{ $setting->mobile }}" type="text" name="mobile" class="form-control" placeholder="Mobile">
        </div>
        <div class="form-group mt-3">
            <input value="{{ $setting->phone }}" type="text" name="phone" class="form-control" placeholder="Phone">
        </div>
        <div class="form-group mt-3">
            <input value="{{ $setting->fb_url }}" type="text" name="fb_url" class="form-control" placeholder="Facebook">
        </div>
        <div class="form-group mt-3">
            <input value="{{ $setting->inst_url }}" type="text" name="inst_url" class="form-control" placeholder="Instagram">
        </div>
        <div class="form-group mt-3">
            <input value="{{ $setting->yt_url }}" type="text" name="yt_url" class="form-control" placeholder="Youtube">
        </div>
        <div class="form-group mt-3">
            <input value="{{ $setting->tlg_url }}" type="text" name="tlg_url" class="form-control" placeholder="Telegram">
        </div>
        <div class="form-group mt-3">
            <input value="{{ $setting->address }}" type="text" name="address" class="form-control" placeholder="Address">
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
<!-- /.container-fluid -->
@include('admin.layouts.footer')
