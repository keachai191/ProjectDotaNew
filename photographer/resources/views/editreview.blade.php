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
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!--test-->
    <link href="/assets/nou/nouislider.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/css/freelancer.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: rgba(204, 204, 204, 0);
        }

        section.theme {
            margin-top: -600px;
            margin-bottom: -98px;
            padding-top: 0px;
            height: 100%;
            min-height: 100%;
            background: url("assets/img/background/bg.jpg") center center;
            -moz-background-size: cover;
            -webkit-background-size: cover;
        }

        html, body {
            width: 100%;
            height: 100%;
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

        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #18bc9c;
            color: white;
        }
    </style>

</head>

<body id="page-top" class="index">

<!-- Navigation -->
<!-- Navigation -->
<!-- Static navbar -->
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

            <a href="../"><img src="assets/img/portfolio/Logo3.png" width="400" height="70"></a>
        </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">


            <li> @if(!session()->get('FacebookName'))
                    <a href="facebooklogin">
                        <div><img src="assets/img/portfolio/login_Facebook.jpg" width="200" height="40">
                        </div>
                    </a>
                @endif

                @if(session()->get('FacebookName'))
                    <div>
                        <div class="btn-group" role="group">


                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                <img src="{{session()->get('FacebookAvatar')}}" width="30" height="30">
                                {{session()->get('FacebookName')}}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="viewreques">ประวัติคำขอร้อง</a></li>
                                <li><a href="viewcomment">ประวัติการประเมินช่างภาพ</a></li>
                                <li><a href="faq">FAQ : คำตอบที่พบบ่อย</a></li>
                                <li><a href="logoutfacebook">ออกจากระบบ</a></li>
                            </ul>

                        </div>
                    </div>
                @endif</li>
            <li><a href="#"></a></li>


        </ul>


    </div>
    <!-- /.navbar-collapse -->

    <!-- /.container-fluid -->
</nav>
<br/><br/><br/><br/>

<section class="theme">
</section>

<!-- Contact Section -->

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <ol class="breadcrumb">

                    <li><a href="/">หน้าหลัก</a></li>
                    <li><a href="/viewcomment">ประวัติการประเมิน</a></li>
                    <li class="active">ค้นหา</li>
            </div>
            </ol>

            <div class="col-lg-12 text-center">


                <h3>แบบประเมินของช่างภาพ {{$id->name_user}}</h3>
                <hr class="star-primary">
                <img src="{{session()->get('FacebookAvatar')}}">
                <h4>คุณ {{session()->get('FacebookName')}}</h4><br/>

                <form method="post" action='updateComment/{{$id->id}}'>
                    {!! csrf_field() !!}
                    <div class="col-lg-12">
                        <div class="row control-group" align="center">
                            <div class="form-inline" col-xs-4>


                                <input type="hidden" name="name_facebook" value="{{session()->get('FacebookName')}}">
                                @if($id->like == '1')
                                    <input type="radio" name="like" value="1" checked> <img
                                            src="/assets/img/portfolio/like2.png" width="100" height="90" alt="">&nbsp;
                                    &nbsp;&nbsp;
                                    <input type="radio" name="like" value="2"> <img
                                            src="/assets/img/portfolio/unlike2.png" width="100" height="90" alt="">
                                @else <input type="radio" name="like" value="1"> <img
                                        src="/assets/img/portfolio/like2.png" width="100" height="90" alt="">
                                <input type="radio" name="like" value="2" checked> <img
                                        src="/assets/img/portfolio/unlike2.png" width="100" height="90" alt=""><br>
                                @endif
                            </div>
                            <br>

                            <div class="col-lg-4 col-lg-offset-4">
                                <textarea class="form-control" rows="3" name="detail" placeholder="กรุณาระบุรายละเอียด"
                                          maxlength="100" required> {{$id->detail}}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <br>
                                <button class="btn btn-success">บันทึก</button>

                            </div>


                        </div>

                    </div>
            </div>
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

<script src="assets/nou/nouislider.min.js"></script>

</body>

</html>