@include('web.layouts.header')
<div class="card text-center" style="width: 300px; ">

    <div class="card-header h5 text-white bg-primary">Password Reset</div>
    <div class="card-body px-5" >

        <form action="{{route('login-register.forgetPasswordPost')}}" method="post" >
    @csrf
        <div data-mdb-input-init class="form-outline">

            <label class="form-label" for="typeEmail">Old Password</label>
            <input type="text"  class="form-control my-3" name="oldPassword"/>

            <label class="form-label" for="typeEmail">New Password</label>
            <input type="password" class="form-control my-3" name="newPassword" />

            <label class="form-label" for="typeEmail">Confirm Password</label>
            <input type="password"  class="form-control my-3" name="confirmPassword"/>
            <input type="submit" class="btn btn-primary w-100">
        </div>
        </form>
            <a href="#" data-mdb-ripple-init>Reset password</a>
        <div class="d-flex justify-content-between mt-4">
            <a class="" href="#">Login</a>
            <a class="" href="#">Register</a>
        </div>
    </div>

</div>
@include('web.layouts.footer')
