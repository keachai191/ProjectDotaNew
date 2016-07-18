<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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
    <!-- Boographertstrap core CSS -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <link href='assets/css/fullcalendar.css' rel='stylesheet'/>
    <link href='assets/css/bootstrap-off-canvas-nav.css' rel="stylesheet">


    <style>
        html, body {
            width: 100%;
            height: 100%;
        }

        section.intro {
            padding: 20px;
            padding-bottom: 150px;
            background: rgba(238, 238, 238, 0);
        }

        section.theme {
            margin-top: -500px;
            margin-bottom: -10px;
            padding-top: 0px;
            height: 100%;
            min-height: 100%;
            background: url("assets/img/background/bg.jpg") center center;
            -moz-background-size: cover;
            -webkit-background-size: cover;
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

        th {
            background-color: #C0F9BD;
            color: black;
        }

        .alert {
            background-color: #99ee99;
        }


    </style>

</head>

<body class="off-canvas-nav-left" style="padding-top:30px;">

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
            <br>
            <a href="/"><img src="assets/img/portfolio/Logo3.png" width="400" height="70"></a>
        </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">

            <br>
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

<section class="theme"></section>

<section class="intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <ol class="breadcrumb">

                    <li><a href="/">หน้าหลัก</a></li>
                    <li><a href="/search">ค้นหา</a></li>
                    <li class="active">ประเมินช่างภาพ</li>
            </div>
            </ol>
            <div class="col-lg-12">


                            <center>
                                <h3>แบบประเมินของช่างภาพ {{session()->get('UserName')}}</h3>
                            </center>
                <hr class="star-primary">
                            {{--<hr class="star-primary">--}}
                        </div><br/>

                        <form action="ReviewC" method="get" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="row">

                                <div class="col-lg-12">

                                        <div class="row control-group" align="center">
                                            <div class="form-inline" col-xs-4>
                                                <input type="hidden" name="checkreques" value="1">
                                                <input type="hidden" name="checkview" value="1">
                                                <input type="hidden" name="title"
                                                       value={{session()->get('FacebookName')}}>
                                                <input type="hidden" name="name_facebook"
                                                       value="{{session()->get('FacebookName')}}">
                                                <input type="hidden" name="avatar"
                                                       value="{{session()->get('FacebookAvatar')}}">


                                                <img src="{{session()->get('FacebookAvatar')}}">

                                                <h4>คุณ {{session()->get('FacebookName')}}</h4><br/>




                                                    <input type="hidden" name="name_facebook"
                                                           value="{{session()->get('FacebookName')}}">
                                                    <input type="radio" name="like" value="1" required> <img
                                                            src="assets/img/portfolio/like.jpg"
                                                            width="100" height="90" alt="">&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="like" value="2"> <img
                                                            src="assets/img/portfolio/unlike.jpg" width="100"
                                                            height="90"
                                                            alt=""><br><br><br>

                                                </div>
                                                <br>

                                                <div class="col-lg-4 col-lg-offset-4">
                                                    <textarea class="form-control" rows="3" name="detail" placeholder="กรุณาระบุรายละเอียดการประเมิน" required></textarea>
                                                </div>
                                                <div class="col-lg-12">
                                                    <br>
                                                    <button class="btn btn-success">บันทึก</button>
                                                    <button type="reset" class="btn btn-default">ล้างข้อมูล</button>

                                                    <br/><br/><br/>
                                                </div>
                                            </div>


                            </div>
                        </form>

                    </div>
                </div>


            </div>
        </div>

    </div>

</section>

<!-- jQuery -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-off-canvas-nav.js"></script>




</body>

</html>
