<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | {{config('app.name')}}</title>
    @include('template.header')
</head>
<body>
    <div class="container">
        <h3>{{config('app.name')}}</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('auth.login')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username / Email</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
    </div>

    @include('template.footer')
</body>
</html>