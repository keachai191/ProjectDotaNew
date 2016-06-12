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

    <!-- Boographertstrap core CSS -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <link href='assets/css/fullcalendar.css' rel='stylesheet'/>
    <link href='assets/css/bootstrap-off-canvas-nav.css' rel="stylesheet">

    <style>
        html, body {
            width: 100%;
            height: 100%;
        }

        section.intro2 {
            margin-top: -50px;
            padding-top: 120px;
            padding-bottom: 658px;
            height: 100%;
            min-height: 100%;
            background: url("assets/img/background/IMG_5412.jpg") center center;
            -moz-background-size: cover;
            -webkit-background-size: cover;
        }

        section.intro2 h1 {
            text-align: center;
            font-weight: 700;
            font-size: 5rem;
            color: #dce4ec;
        }

        section.intro2 p {
            text-align: center;
            font-weight: 400;
            font-size: 2rem;
            color: #dce4ec;
        }

        section.photographer {
            text-align: center;
            padding: 100px;
            padding-bottom: 400px;
            background: #EEEEEE;
        }

        .button {
            background-color: white; /* Green */
            border: none;
            color: black;
            padding: 30px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 40px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s;
            cursor: pointer;
        }

        .button1 {
            border-radius: 50%;
            background-color: #bef8ff;
            color: black;
        }
        .button2 {
            border-radius: 50%;
            background-color: #f7ffde;
            color: black;
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
            <a href=""><img src="assets/img/portfolio/Logo3.png" width="400" height="70"></a>
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


<section id="search" class="intro2">

    <center><br/><br/><br/><br/><img src="assets/img/background/banner.png " width="700" height="250"></center>

    <center><a href="/search" class="button button1"><img src="assets/img/background/search.png " width="200" height="200"></a>
        <a href="./login" class="button button2"><img src="assets/img/background/photographer.png " width="200" height="200"></a></center>
</section>

<!--<section id="photographer" class="photographer">
    <h1>ช่างภาพในระบบ</h1>

</section>-->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-off-canvas-nav.js"></script>
</body>
</html>