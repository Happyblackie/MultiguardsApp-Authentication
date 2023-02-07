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

                <form action="{{ route('doctor.check') }}" method="post" autocomplete="off">
                    {{--  part 3 l  --}}
                    {{--  incase login fails error  --}}
                    
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                        
                    @endif
                    
                    {{--  end of step z ii  --}}
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" value="{{ old ('email') }}">
                        {{--   step Y  --}}
                          <span class="text-danger">@error('email'){{$message}}  @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old ('password') }}">
                        {{--   step y  --}}
                        <span class="text-danger">@error('password'){{$message}}  @enderror</span>
                    </div>
                    <div class="form-group mt-1">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <br>
                    <a href="{{ route('doctor.register') }}">Create new Account</a>
                </form>

            </div>
        </div>
    </div>
</body>
</html>