<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="Davur - Restaurant Bootstrap template Dashboard + FrontEnd" />
    <meta property="og:title" content="Davur - Restaurant Bootstrap template Dashboard + FrontEnd" />
    <meta property="og:description" content="Davur - Restaurant Bootstrap template Dashboard + FrontEnd" />
    <meta property="og:image" content="https://davur.dexignzone.com/dashboard/social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <title>Aplikasi Kasir Restoran</title>
    <!-- Favicon icon -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h3 class="text-center mb-5">Login</h3>
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                autocomplete="off">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                            @enderror
                                        </div>
                                        <div class="
                                                text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('template/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('template/js/custom.min.js') }}"></script>
    <script src="{{ asset('template/js/deznav-init.js') }}"></script>

</body>

</html>
