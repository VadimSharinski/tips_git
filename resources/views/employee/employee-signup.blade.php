<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png"/>

    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet"/>
    <script src="assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <title>Rocker - Multipurpose Bootstrap5 Admin Template</title>
</head>

<body class="bg-login">
<!--wrapper-->
<div class="wrapper">
    <header class="login-header shadow">
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded fixed-top rounded-0 shadow-sm">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"> <a class="nav-link active" aria-current="page" href="#"><i class='bx bx-home-alt me-1'></i>Home</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="#"><i class='bx bx-user me-1'></i>About</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="#"><i class='bx bx-category-alt me-1'></i>Features</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="#"><i class='bx bx-microphone me-1'></i>Contact</a>
                        </li>
                        <li>
                            <div class="col">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary">@lang('main.current_lang')</button>
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('changeLocale', 'en') }}">@lang('main.en')</a></li>
                                        <li><a class="dropdown-item" href="{{ route('changeLocale', 'ru') }}">@lang('main.ru')</a>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="d-flex align-items-center justify-content-center my-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                <div class="col mx-auto">
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">@lang('main.sign_up')</h3>
                                    <p>@lang('main.have_account_signup') <a
                                            href="{{ url('authentication-signin-with-header-footer') }}">
                                            @lang('main.sign_in_here')</a>
                                    </p>
                                </div>
                                <div class="d-grid">
                                    <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span
                                            class="d-flex justify-content-center align-items-center">
                              <img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
                              <span>@lang('main.sign_up_google')</span>
                                                </span>
                                    </a> <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>
                                        @lang('main.sign_up_facebook')</a>
                                </div>
                                <div class="login-separater text-center mb-4"><span>@lang('main.sign_up_email')</span>
                                    <hr/>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{route('employee.signup')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <form class="row g-3">
                                            <div class="col-sm-12">
                                                <label for="inputFirstName" class="form-label">@lang('main.first_name')</label>
                                                <input type="text" class="form-control" name="first_name"
                                                       placeholder="Walter" value="{{old('first_name')}}">
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="inputLastName" class="form-label">@lang('main.last_name')</label>
                                                <input type="text" class="form-control" name="last_name"
                                                       placeholder="White" value="{{old('last_name')}}">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputSelectCountry" class="form-label">@lang('main.country')</label>
                                                <select class="form-select" name="country_id" aria-label="Default select example">
                                                    @foreach($countries as $country)
                                                    <option value="{{ $country->id}}">{{ trans('main.' . $country->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputPhone" class="form-label">@lang('main.phone')</label>
                                                <input type="text" class="form-control" name="phone"
                                                       placeholder="XX-XXX-XXX-XXXX" maxlength="12"
                                                       value="{{old('phone')}}">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">@lang('main.email_address')</label>
                                                <input type="email" class="form-control" name="email"
                                                       placeholder="example@user.com" value="{{old('email')}}">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">@lang('main.password')</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                           name="password" placeholder="Enter Password"> <a
                                                        href="javascript:;" class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">
                                                    @lang('main.confirm_password')</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                           name="password_confirmation" placeholder="@lang('main.enter_password')"> <a
                                                        href="javascript:;" class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="agreement">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">
                                                        @lang('main.terms')</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class='bx bx-user'></i>@lang('main.sign_up')
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <footer class="bg-white shadow-sm border-top p-2 text-center fixed-bottom">
        <p class="mb-0">Copyright © 2021. All right reserved.</p>
    </footer>
</div>
<!--end wrapper-->
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--Password show & hide js -->
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>
<!--app JS-->
<script src="assets/js/app.js"></script>
</body>

</html>
