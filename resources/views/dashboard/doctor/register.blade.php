<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color:#cBc9E8;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top:45px;">
                <h4>Doctor Login</h4><hr>

                <form action="{{ route('doctor.create') }}" method="post" autocomplete="off">
                   {{-- part 3 k  show the messages for registration success and fail  --}}
                   @if(Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                   @endif

                   @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                   @endif

                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" name="name" placeholder="Enter name " value="{{ old ('name') }}">
                        {{--   step   --}}
                        <span class="text-danger">@error('name'){{$message}}  @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" value="{{ old ('email') }}">
                        {{--   step   --}}
                        <span class="text-danger">@error('email'){{$message}}  @enderror</span>
                    </div>
                     <div class="form-group">
                        <label for="hospital">Hospital</label>
                        <input type="hospital" class="form-control" name="hospital" placeholder="Enter Hospital" value="{{ old ('hospital') }}">
                        {{--   step   --}}
                        <span class="text-danger">@error('hospital'){{$message}}  @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old ('password') }}">
                        {{--   step   --}}
                        <span class="text-danger">@error('password'){{$message}}  @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="cpassword" class="form-control" name="cpassword" placeholder="Confirm password" value="{{ old ('cpassword') }}">
                        {{--   step   --}}
                        <span class="text-danger">@error('cpassword'){{$message}}  @enderror</span>
                    </div>
                    <div class="form-group mt-1">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <br>
                    <a href="{{ route('doctor.login') }}">I already have an account, Login now</a>
                </form>

            </div>
        </div>
    </div>
</body>
</html>