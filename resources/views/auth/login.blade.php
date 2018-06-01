<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>User Management System</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="login-page">
    <div id="app">
        <div class="login-box">
            @include('layouts.errors')
            <div class="login-logo" >
                <a href="#"><b>User</b>&nbsp;Management System</a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <!-- LOGIN FORM -->
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <!-- /.col -->
                        <div class="col-xs-4">
                          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <a class="btn btn-link" data-toggle="modal" data-target="#myModal">
                            Register Here!
                        </a>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- REGISTRATION FORM-->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <p class="login-box-msg" style="font-weight: bold; font-size: 20px;">Please Register!</p>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
                                    <span class="glyphicon glyphicon-user
        form-control-feedback"></span>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div><!-- Name -->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="company" type="text" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" autofocus placeholder="Company Name">
                                    <i class="far fa-building form-control-feedback"></i>

                                    @if ($errors->has('company'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('company') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div><!-- Company -->

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"required autofocus placeholder="Address">
                                   <i class="fa fa-address-book form-control-feedback"></i>


                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div><!-- Address -->

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="age" type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age"required autofocus placeholder="Age">
                                    <i class="fas fa-birthday-cake form-control-feedback"></i>

                                    @if ($errors->has('age'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('age') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div><!-- Age -->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <select class="form-control" id="sel1" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender"required autofocus placeholder="Gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                    <i class="fa fa-intersex custom form-control-feedback"></i>

                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div><!-- Gender -->
                        </div><!-- COL MD 6-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="about_me" type="text" class="form-control{{ $errors->has('about_me') ? ' is-invalid' : '' }}" name="about_me"required autofocus placeholder="About Me"></textarea> 
                                    <span class="glyphicon glyphicon-user
        form-control-feedback"></span>

                                    @if ($errors->has('about_me'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('about_me') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div><!-- About Me -->

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-0">
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
          
        </div>
    </div> <!-- END MODAL -->
    <style type="text/css">
        .login-page{
            background: #d2d6de;
        }
        .login-logo a{
            color: #444;
            text-decoration: none!important;
            color: green;
            font-weight: bold;
        }
        .login-box {
            width: 360px;
            margin: 7% auto;
            font-size: 14px!important;
        }
        .login-box-msg {
            font-weight: bold; 
            font-size: 20px;
        }
        .login-box-body {
            background: #fff;
        }
        form { 
            padding: 15px;
        }
        form input {
            font-size: 14px!important;
        }
        select#sel1 {
            height: 36px;
            font-size: 14px;
        }
        span.glyphicon{
            font-size: 20px;
            color: gray;
            margin-right: 20px
        }
        i.fa.form-control-feedback {
            font-size: 20px;
            color: gray;
            margin-right: 20px
        }
        i.fas.form-control-feedback {
            font-size: 20px;
            color: gray;
            margin-right: 20px;
            margin-top: 6px;
        }
        i.far.form-control-feedback {
            font-size: 20px;
            color: gray;
            margin-right: 20px;
            margin-top: 6px;
        }
        .col-xs-4 button {
            font-size: 14px;
        }
        a.btn.btn-link {
            margin-left: 85px;
            font-size: 14px;
        }
        textarea#about_me {
            height: 77px;
            font-size: 14px;
        }
        button.close {
            font-size: 30px;
        }
        @media (max-width: 768px) {
            .login-box {
                width: 90%;
                margin-top: 20px;
            }
        }
    </style>
</body>
</html>