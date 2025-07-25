<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>User Login</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords"
        content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ url('/assets/images/favicon.svg') }}" type="image/x-icon">
    <!-- [Google Font] Family -->
    <link rel="stylesheet"
        href="{{ url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap') }}"
        id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ url('/assets/fonts/tabler-icons.min.css') }}">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ url('/assets/fonts/feather.css') }}">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ url('/assets/fonts/fontawesome.css') }}">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ url('/assets/fonts/material.css') }}">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ url('/assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ url('/assets/css/style-preset.css') }}">

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    {{-- @include('component.global-message') --}}

    <form method="POST" action="{{ route('verify.user') }}" id="loginForm">
        @csrf
        <div class="auth-main">
            <div class="auth-wrapper v3">
                <div class="auth-form">
                    <div class="auth-header">
                        <a href="{{ route('users.login') }}"><img src="{{ url('/assets/images/logo-dark.svg') }}" alt="img"></a>
                    </div>
                    <div class="card my-5">
                        <div class="card-body">
                            <span id="alert_msg" class="mx-6 mb-2 text-success">
                                @include('component.global-message')
                            </span>
                            <div class="d-flex justify-content-between align-items-end mb-4">

                                <h3 class="mb-0"><b> Login</b></h3>
                                <a href="{{ route('user.signup') }}" class="link-primary">Don't have an account?</a>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="Email Address">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="d-flex mt-1 justify-content-end">
                                <!-- <div class="form-check">
                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                <label class="form-check-label text-muted" for="customCheckc1">Keep me sign in</label>
              </div> -->
                                {{-- <a href="#" class="link-secondary">Forgot password ?</a> --}}
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>

                        </div>
                    </div>
                    <div class="auth-footer row">
                        <!-- <div class=""> -->
                        <div class="col my-1">
                            <p class="m-0">Copyright © <a href="#">Codedthemes</a></p>
                        </div>
                        <div class="col-auto my-1">
                            <ul class="list-inline footer-link mb-0">
                                <li class="list-inline-item"><a href="{{ route('landing.page') }}">Home</a></li>
                                <li class="list-inline-item"><a href="{{ route('contact.page') }}">Contact us</a></li>
                            </ul>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="{{ url('/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ url('/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ url('/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ url('/assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ url('/assets/js/pcoded.js') }}"></script>
    <script src="{{ url('/assets/js/plugins/feather.min.js') }}"></script>





    <script>
        layout_change('light');
    </script>




    <script>
        change_box_container('false');
    </script>



    <script>
        layout_rtl_change('false');
    </script>


    <script>
        preset_change("preset-1");
    </script>


    <script>
        font_change("Public-Sans");
    </script>



</body>
<!-- [Body] end -->

</html>
