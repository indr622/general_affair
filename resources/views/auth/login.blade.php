<!DOCTYPE html>

<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ config('app.name') }} | LOGIN</title>

    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('') }}vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="{{ asset('') }}css/vendors/simplebar.css">
    <link href="{{ asset('') }}css/style.css" rel="stylesheet">
    <link href="{{ asset('') }}css/examples.css" rel="stylesheet">
</head>

<body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-7 p-4 mb-0 bg-warning">
                            <div class="card-body">
                                <form method="post" action="{{ url('/login') }}">
                                    @csrf
                                    <h1>Login</h1>
                                    <p class="text-medium-emphasis">Sign In to your account</p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                            </svg></span>
                                        <input class="form-control @error('username') is-invalid @enderror"
                                            type="text" placeholder="Username" name="username">

                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-4"><span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked">
                                                </use>
                                            </svg></span>
                                        <input class="form-control @error('password') is-invalid @enderror"
                                            name="password" type="password" placeholder="Password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="button">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card col-md-5 text-white bg-white py-5">
                            <div class="card-body text-center">
                                <div>
                                    <img src="{{ asset('images/ga.png') }}" alt=""width="230">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('') }}vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="{{ asset('') }}vendors/simplebar/js/simplebar.min.js"></script>


</body>

</html>
