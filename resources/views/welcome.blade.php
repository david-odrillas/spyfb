<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <title>Spy FB</title>
</head>
<body>
    <div class="col-md-4 offset-4">
        <h1>Welcome to SpyFB</h1>
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">{{__("Email address")}}</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
</body>
</html>