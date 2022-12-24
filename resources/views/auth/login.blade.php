@extends('base')

@include('navbar')

@section('content')

@section('title', 'Log in')
<body>
    <div class="container col-md-4 offset-md-4" style="margin-top: 10%;">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card shadow rounded border border-light" id="card">
            <div>
                <h3 class="text-center text-white mt-2">LOG IN</h3>
            </div>
            <div class="card-body">
                <form action="{{ '/' }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group mb-3 mt-1 col-sm-10 offset-sm-1">
                        <div class="input-group mb-3">
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control transparent-input">
                        </div>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-4 mt-1 col-sm-10 offset-sm-1">
                        <div class="input-group mb-3">
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control transparent-input">
                        </div>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-center">
                        <div>
                            <button class="btn btn-primary px-3 form-control mb-3" type="submit">Login</button>
                            <a style="text-decoration: none; color: black; background-color: white; padding: 2px; border-radius: 5px; font-size: 18px;" href="{{ '/register' }}">Sign up for an account</a>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</body>

@endsection

<style>
body{
    background-color: #bd4bb1;
    background-image: url("images/bg.gif");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 100%;
    box-sizing: border-box;
    overflow: hidden;
}
#card {
    background: transparent;
}
input.transparent-input{
    background-color: transparent !important;
    color: white !important;
    border: 1px solid white !important;
}
input::placeholder {
    color: white !important;
}
</style>
