<!-- @include('inc.config') -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Ledger - Tricasolutions</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets')}}/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/line-awesome.min.css">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/dataTables.bootstrap4.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/select2.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap-datetimepicker.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">


</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="container  mt-4 pt-4">

            <!-- Account Logo -->
            <div class="account-logo">
                <a href="index.html"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a>
            </div>
            <!-- /Account Logo -->

            <div class="account-box">
                <div class="account-wrapper">
                    <h3 class="account-title">Login</h3>
                    <p class="account-subtitle">Access to our dashboard</p>

                    <!-- Account Form -->
                    <form action="{{ route('admin_login_submit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="form-control" name="email" id="email" type="text">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label>Password</label>
                                </div>

                            </div>
                        </div>
                        <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary account-btn" type="submit">Login</button>
                </div>
                <div class="account-footer">
                    <p>Don't have an account yet? <a href="{{route('admin_signup')}}">Register</a></p>
                </div>
                </form>

            </div>
        </div>
    </div>

    @yield('footer_content')