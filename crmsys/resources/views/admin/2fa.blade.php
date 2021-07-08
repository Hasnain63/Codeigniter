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
    @if(!session()->has('secretKey'))
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Set up Google Authenticator</div>
                    <img width="100px" height="100px"
                        src="https://chart.googleapis.com/chart?chs=200x200&chld=M|0&cht=qr&chl={{ $qrCodeUrl }}"
                        alt="">

                    <div class="panel-body" style="text-align: center;">
                        <p>Set up your two factor authentication by scanning the barcode below.

                        <div>

                        </div>
                        <p>You must set up your Google Authenticator app before continuing. You will be
                            unable to login otherwise</p>
                        <div>
                            <a href=""><button class="btn-primary">Complete Registration</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Main Wrapper -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{('2fa')}}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="one_time_password" class="col-md-4 control-label">One Time Password</label>

                                <div class="col-md-6">
                                    <input id="one_time_password" type="number" class="form-control" name="code"
                                        required autofocus>
                                </div>
                                <div class="col-md-6">
                                    <input id="secretKey" type="hidden" class="form-control" name="secretKey"
                                        value="{{$secretKey}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('footer_content')