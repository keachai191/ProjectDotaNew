<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freelancer - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/freelancer.css" rel="stylesheet">


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


</head>

<body id="page-top" class="index">

<!-- Navigation -->

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://se.ict.up.ac.th/photographerMatching">เว็บแอปพลิเคชันจัดหาช่างภาพ</a>

            <!--<a class="navbar-brand" href="#page-top">เว็บแอปพลิเคชันจัดหาช่างภาพ</a>-->

        </div>
        @if(Auth::check())

            <a class="col-md-offset-4" href="home">{{Auth::user()->name}} : กำลังใช้งาน</a><br/>
            <a class="col-md-offset-4" href="auth/logout">ออกจากระบบ</a>


            @endif

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <!--<li class="page-scroll">
                    <a href="#portfolio">จัดอันดับช่างภาพ</a>
                </li>
                <li class="page-scroll">
                    <a href="#about">ช่างภาพในระบบ</a>
                </li>-->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<br><br><br><br><br><br>

<div class="container">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open(["url" => "/auth/login"]) !!}
        <table class="table">
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


            <tr>
                <td colspan="2">
                    <h1 class="well text-center">เข้าสู่ระบบ</h1>
                </td>
            </tr>
            <tr>
                <td>อีเมล์ของคุณ:</td>
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
                <td>จดจำรหัสผ่าน ?</td>
                <td>{!! Form::checkbox("remember") !!}</td>
            </tr>
            <tr>

               <!-- <td>
                    <center><a href="/password/email">Forgot your password ?! </a></center><br/>
                </td>-->
                <td colspan="2">
                    <center>{!! Form::submit("เข้าสู่ระบบ") !!}</center> <br/>
                    <a href="register">สมัครสมาชิก</a>
                </td>
            </tr>
            <!--<tr>
                <td colspan="2" class="text-center">
                    <a href="/auth/facebook">facebook</a>
                </td>
            </tr>-->

        </table>
        {!! Form::Close() !!}
    </div>
</div>


<br><br><br><br><br><br><br><br><br><br>


<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Location</h3>

                    <p>3481 Melrose Place<br>Beverly Hills, CA 90210</p>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Around the Web</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>About Freelancer</h3>

                    <p>Freelance is a free to use, open source Bootstrap theme created by <a
                                href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Your Website 2014
                </div>
            </div>
        </div>
    </div>
</footer>

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
