<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>

     <!-- Scripts  bootstrap-->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body style="background-color:#d7dadb;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top:45px">
                <h4>Doctor Dashboard</h4>
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Hospital</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>             {{--guard('doctor') added this at step v vi    --}}
                            <td >{{ Auth::guard('doctor')->user()->name}}</td>
                            <td>{{ Auth::guard('doctor')->user()->email}}</td>
                            <td>{{ Auth::guard('doctor')->user()->hospital}}</td>
                            <td>
                               {{--   part 2 b i --}}
                                <a href="{{ route('doctor.logout')}}" onclick="event.preventDefault()
                                ;document.getElementById('logout-form').submit();">Logout</a>
                                <form action="{{ route('doctor.logout')}}" method="post" class="d-none" id="logout-form">@csrf</form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>