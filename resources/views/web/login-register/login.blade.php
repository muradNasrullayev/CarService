@include('web.layouts.header')
<br>
<br>
<br>
<div class="login-container" style="display: flex; justify-content: center; align-items: center; width: 100%; max-width: 100%;">
    <form class="login-form" method="post" action="{{ route('login-register.loginPost') }}">
        @csrf
        @if($errors->any())
            <div class="alert alert-danger">
                <p><strong>Opps, Something went wrong</strong></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Email input -->
        <div class="form-group">
            <label class="form-label" for="form2Example1">Email address</label>
            <input type="email" id="form2Example1" class="form-control" name="email" value="{{ old('email') }}"  />
        </div>

        <!-- Password input -->
        <div class="form-group" style="margin-bottom: 20px; display: flex; flex-direction: column;">
            <label class="form-label" for="form2Example2">Password</label>
            <input type="password" id="form2Example2" class="form-control" name="password"  />
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>


        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="{{ route('login-register.registerPost') }}">Register</a></p>
        </div>
    </form>
</div>

@include('web.layouts.footer')
