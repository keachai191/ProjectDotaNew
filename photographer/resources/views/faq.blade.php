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

    <!--test-->
    <link href="assets/nou/nouislider.min.css" rel="stylesheet">

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
    <style>

    section.theme {
    margin-top: -620px;
    margin-bottom: -95px;
    padding-top: 0px;
    height: 100%;
    min-height: 100%;
    background: url("assets/img/background/bg.jpg") center center;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    }
    .btn-default {
        color: #333;
        background-color: #fff;
        border-color: #ccc;
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
    </style>
</head>


<body id="page-top" class="index">

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

<section class="phofile">


<!-- Contact Section -->

    <div class="container">
        <div class="row">
                            <div class="alert alert-success alert-fixed-top">
                                {{--<img class="pix" src="{{session()->get('FacebookAvatar')}}" width="130" height="130"><br/>--}}
                                <img src="assets/img/icon/FAQ-100.png" width="60" height="60" alt="">
                                <strong>คำถามที่พบบ่อย!</strong>
                                </div>

            <h4 style="color:red;">1.โดนระงับการใช้งาน แก้ไขอย่างไร?</h4>
            <h5>ตอบ. ให้ทำการติดต่อผู้ดูแลระบบ ทางอีเมล์นี้ Wanchalermkiki@gmail.com </h5>
            <h4 style="color:red;">2.ต้องการยกเลิกการจ้างงานในกรณีที่ช่างภาพกดยอมรับไปแล้ว ทำอย่างไร?</h4>
            <h5>ตอบ. ให้ทำการติดต่อผู้ดูแลระบบเพื่อยกเลิกการจ้างงาน ทางอีเมล์นี้ Wanchalermkiki@gmail.com</h5>
            <h7><ul>
                    สิ่งที่ต้องบอกในอีเมล์ที่จะต้องให้ผู้ดูแลระบบ
                    <li>ชื่อผู้จ้างงาน</li>
                    <li>ชื่อผู้รับงาน</li>
                    <li>รหัสเลขที่คำขอจ้างงาน</li>
                </ul></h7>
        </div>
    </div>

</section>
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