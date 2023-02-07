<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Register</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top:45px;">
                <h4>User Register</h4><hr>
                <form action="{{ route('user.create') }}" method="post" autocomplete="off">
                
                   {{-- part p  show the messages for registration success and fail  --}}
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
                        <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{ old ('name')}}">
                       {{--   step n  --}}
                        <span class="text-danger">@error('name'){{$message}}  @enderror</span>
                    </div>
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" value="{{ old ('email')}}">
                        {{--  step n  --}}
                        <span class="text-danger">@error('email'){{$message}}  @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old ('password')}}">
                        {{--  step n  --}}
                        <span class="text-danger">@error('password'){{$message}}  @enderror</span>
                    </div>
                     <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Confirm password" value="{{ old ('cpassword')}}">
                        {{--  step n  --}}
                        <span class="text-danger">@error ('cpassword'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-1">Register</button>
                    </div>
                    <br>
                    <a href="{{ route ('user.login') }}">I have already an account</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>