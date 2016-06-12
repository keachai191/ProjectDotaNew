<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project DOTA</title>

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
    margin-bottom: -98px;
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
            <div class="col-lg-12 ">

                <ol class="breadcrumb">
                    <li><a href="/">หน้าหลัก</a></li>
                    <li class="active">ค้นหา</li>
                </ol>

                <div class="col-lg-12 text-center">
                <h2>ค้นหาช่างภาพ</h2>
                <img src="assets\img\background\1.png" width="550" height="210"><br><br>

                    </div>
            </div>
        </div>
        <form method="get" action='s'>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group" align="center">
                            <div class="form-inline" col-xs-4>
                                &nbsp;&nbsp;&nbsp;
                                <h7>วันที่ต้องการเริ่มถ่ายภาพ</h7>
                                &nbsp;&nbsp;&nbsp;
                                <input class="form-control" type="date" min="<?php echo date("Y-m-d");?>" name="date"
                                       required>

                                &nbsp;&nbsp;&nbsp;
                                <h7>ระยะเวลาถ่าย</h7>
                                &nbsp;&nbsp;&nbsp;
                                <select id="OperationType" class="form-control" name="time" onChange="hideshow()">
                                    <option value="1">ครึ่งวัน</option>
                                    <option value="2">เต็มวัน</option>
                                </select>

                                &nbsp;&nbsp;&nbsp;
                                <h7 id="t1">ช่วงเวลา</h7>
                                &nbsp;&nbsp;
                                <select id="OperationNos" class="form-control" name="time2">
                                    <option value="1">ช่วงเช้า</option>
                                    <option value="2">ช่วงบ่าย</option>
                                    <option value="3">ช่วงเย็น</option>
                                </select>







                                <script>
                                    function hideshow()
                                    {
                                        var s1= document.getElementById('OperationType');
                                        var s2= document.getElementById('OperationNos');

                                        if( s1.options[s1.selectedIndex].text=="ครึ่งวัน")
                                        {
                                            s2.style.visibility = 'visible';
                                            document.getElementById('t1').style.visibility = 'visible';

                                        }
                                        if( s1.options[s1.selectedIndex].text=="เต็มวัน")
                                        {
                                            s2.style.visibility = 'hidden';
                                            document.getElementById('t1').style.visibility = 'hidden';


                                        }
                                        function hide()

                                        {

                                            document.getElementById('t1').style.visibility = 'hidden';}

                                    }
                                </script>

                            </div>
                        </div>
                        <br>

                        <form name="sentMessage" id="contactForm" novalidate>
                            <div class="row control-group" align="center">
                                <div class="form-inline" col-xs-4>
                                    &nbsp;&nbsp;&nbsp;
                                    <h7>งบประมาณต่อระยะเวลาถ่าย (บาท)</h7>
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="form-control" type="text"  placeholder="งบประมาณ 0-99999"
                                           name="money" pattern="[0-9]{5}" >

                                    <h7>ชือช่างภาพ</h7>
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="form-control" type="text" min="0" placeholder="ชื่อช่างภาพ"
                                           name="name"  >


                                </div>
                            </div>
                            <div id="success"></div>
                            <div class="row">
                                <div class="form-group col-xs-12" align="center">

                                    <br>
                                    <button class="btn btn-success">ค้นหา</button>




                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </form>
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