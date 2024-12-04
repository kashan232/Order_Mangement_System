<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/feather.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <div class="main-wrapper login-body">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-lg-6 login-wrap">
                    <div class="login-sec">
                        <div class="log-img">
                            <img class="img-fluid" src="assets/img/login-03.png" alt="Logo">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 login-wrap-bg">
                    <div class="login-wrapper">
                        <div class="loginbox">
                            <div class="login-right">
                                <div class="login-right-wrap">
                                    <div class="account-logo">
                                        <!-- <a href="index.html"><img src="assets/img/login-logo.png" alt=""></a> -->
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>

                                    <h2>Login</h2>
                                    <!-- Form -->
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="input-block">
                                            <label for="email">Email <span class="login-danger">*</span></label>
                                            <input class="form-control" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus>
                                        </div>
                                        <div class="input-block">
                                            <label for="password">Password <span class="login-danger">*</span></label>
                                            <input class="form-control pass-input" id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                                        </div>
                                        <div class="forgotpass">
                                            <div class="remember-me">
                                                <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Remember me
                                                    <input type="checkbox" name="radio">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <!-- {{ route('password.request') }} -->
                                            <a href="#">Forgot Password?</a>
                                        </div>
                                        <div class="input-block login-btn">
                                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                                        </div>
                                    </form>
                                    <!-- /Form -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /Login Content -->

            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.7.1.min.js" type="82eb6717d191b19c74f21499-text/javascript"></script>
    <script src="assets/js/bootstrap.bundle.min.js" type="82eb6717d191b19c74f21499-text/javascript"></script>
    <script src="assets/js/feather.min.js" type="82eb6717d191b19c74f21499-text/javascript"></script>
    <script src="assets/js/app.js" type="82eb6717d191b19c74f21499-text/javascript"></script>
    <script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="82eb6717d191b19c74f21499-|49" defer></script>
</body>

</html>