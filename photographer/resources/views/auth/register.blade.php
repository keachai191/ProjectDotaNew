<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project DOTA</title>
    <link rel="icon" href="assets/img/icon/favicon.ico" />

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/freelancer.css" rel="stylesheet">

    <!-- jquery pattern -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        $(document).ready(function () {
            $('#calendar').fullCalendar

            ({
                defaultDate: '2016-05-12',
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: 'http://localhost:8000/CalendarsendHome',
                eventColor: '#008080'

            });

        });

    </script>
    <style>

        html, body {
            width: 100%;
            height: 100%;
        }

        section.theme {
            margin-top: -500px;
            margin-bottom: -100px;
            padding-top: 0px;
            height: 100%;
            min-height: 100%;
            background: url("assets/img/background/bg.jpg") center center;
            -moz-background-size: cover;
            -webkit-background-size: cover;
        }

        section.box {
            padding-top: 20px;
            font-size: 5rem;
            color: #080808;
        }

        section.phofile {
            padding: 20px;
            padding-bottom: 150px;
            background: #EEEEEE;
        }

        #btnedit {
            background-color: #c7ddef;

        }

        #calendar {
            max-width: 700px;
            margin: 0 auto;

        }

        .navbar-default.transparent {
            border-width: 0px;
            border-color: black;
            -webkit-box-shadow: 0px 0px;
            box-shadow: 0px 0px;
            background-color: rgba(0, 0, 0, 0.0);
            background-image: -webkit-gradient(linear, 50.00% 0.00%, 50.00% 100.00%, color-stop(0%, rgba(0, 0, 0, 0.00)), color-stop(100%, rgba(0, 0, 0, 0.00)));
            background-image: -webkit-linear-gradient(270deg, rgba(0, 0, 0, 0.00) 0%, rgba(0, 0, 0, 0.00) 100%);
            background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 0%, rgba(0, 0, 0, 0.00) 100%);
        }


    </style>
</head>

<body id="page-top" class="index">

<!-- Navigation -->
<nav class="navbar navbar-default transparent navbar-fixed-top">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navtop">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <br>
            <a href="/"><img src="assets/img/portfolio/Logo3.png" width="400" height="70"></a>
        </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <br>


        </ul>


    </div>
    <!-- /.navbar-collapse -->

    <!-- /.container-fluid -->
</nav>

<br><br><br><br><br><br><br/>
<section class="theme">
</section>
<section class="phofile">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">

            @if(count($errors)>0)
                <tr>
                    <td colspan="2"></td>
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <il> {{$error}} </il>
                            @endforeach
                        </ul>
                    </div>
                </tr>
            @endif
            <br/>


            <div class="modal-content">
                <div class="modal-body">
                    <h1 class="well text-center">สมัครเป็นช่างภาพ</h1>

                    <form action="/auth/register" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <form role="form">
                            <div class="form-group">
                                <label for="email">ชื่อติดต่อ : </label>
                                <input type="text" class="form-control" name="name"
                                       placeholder="ชื่อแสดงตัวตน">
                            </div>
                            <div class="form-group">
                                <label for="email">อีเมล์ : </label>
                                <input type="email" class="form-control" name="email"
                                       placeholder="photographer@mail.com , @hotmail , @live">
                            </div>
                            <div class="form-group">
                                <label for="pwd">รหัสผ่าน : </label>
                                <input type="password" class="form-control" name="password"
                                       placeholder="อย่างน้อย 6 ตัวอักษร">
                            </div>
                            <div class="form-group">
                                <label for="pwd">ยืนยันรหัสผ่าน : </label>
                                <input type="password" class="form-control" name="password_confirmation"
                                       placeholder="ยืนยันรหัสผ่าน">
                            </div>
                            <div class="form-group">
                               <center> {!! app('captcha')->display() !!}</center>
                            </div>

                            <center>
                                <button type="submit" class="btn btn-success">สมัครสมาชิก</button>
                            </center>
                        </form>
                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>


    {{--{!! Form::open(["url" => "/auth/register"]) !!}
    <table class="table">

        <tr>
            <td colspan="2">
                <h1 class="well text-center">สมัครเป็นช่างภาพ</h1>
            </td>
        </tr>
        <tr>
            <td>ชื่อที่ใช้ติดต่อ :</td>
            <td>
                {!! Form::text("name") !!}
            </td>
        </tr>
        <tr>
            <td>
                <ul class="list-inline">
                    อีเมล์ :
                </ul>

            </td>
            <td>
                {!! Form::email("email") !!}
            </td>
        </tr>
        <tr>
            <td>
                รหัสผ่าน :
            </td>
            <td>
                {!! Form::password("password") !!}
            </td>
        </tr>
        <tr>
            <td>
                ยืนยันรหัสผ่าน :
            </td>
            <td>
                {!! Form::password("password_confirmation") !!}
            </td>
        </tr>
            <td>

            </td>
        <td>
            <center>
                {!! app('captcha')->display() !!}

                @if($errors->has('g-recaptcha-response'))
                    <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                @endif
            </center>
        </td>

        <tr>
            <td colspan="2">
                <center> {!! Form::submit("สมัครสมาชิก") !!}</center>
            </td>
        </tr>
    </table>
    {!! Form::Close() !!}
</div>--}}

    </div>
</section>


<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<!-- jQuery -->
<script src="assets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="assets/js/classie.js"></script>
<script src="assets/js/cbpAnimatedHeader.js"></script>

<!-- Contact Form JavaScript -->
<script src="assets/js/jqBootstrapValidation.js"></script>
<script src="assets/js/contact_me.js"></script>

<!-- Custom Theme JavaScript -->
<script src="assets/js/freelancer.js"></script>

</body>

</html>
