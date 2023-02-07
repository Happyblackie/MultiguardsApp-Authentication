<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | Home</title>

     <!-- Scripts  bootstrap-->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top:45px">
                <h4>User Dashboard</h4>
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>             {{--guard('web') added this at step v vi    --}}
                            <td >{{ Auth::guard('web')->user()->name}}</td>
                            <td>{{ Auth::guard('web')->user()->name}}</td>
                            <td>
                               {{--   part u ii  --}}
                                <a href="{{ route('user.logout')}}" onclick="event.preventDefault()
                                ;document.getElementById('logout-form').submit();">Logout</a>
                                <form action="{{ route('user.logout')}}" method="post" class="d-none" id="logout-form">@csrf</form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>