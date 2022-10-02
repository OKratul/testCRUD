<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container p-5">
        <div>
            <h1>Login</h1>
            @include('error')
            @if(session('loginError'))
                <li class="alert alert-danger">{{session('loginError')}}</li>
            @endif
            <form method="POST" action="{{ route('login') }}">
                {{csrf_field()}}
                <div class="form-group">
                  <label >User name</label>
                  <input type="text" class="form-control" name="name">

                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>

                <button type="submit" class="btn btn-primary" name="submit">login</button>
              </form>
        </div>
    </div>
</body>
</html>
