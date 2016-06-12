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
<br/><br/><br/>
<section class="theme">
</section>

<section class="phofile">

<!-- Contact Section -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <ol class="breadcrumb">
                    <li><a href="/">หน้าหลัก</a></li>
                    <li><a href="/search">ค้นหา</a></li>
                    <li class="active">เลือกช่างภาพ</li>
                </ol>
                <div class="col-lg-12 text-center">

                <h2>ผลลัพธ์การค้นหา</h2>
                <img src="assets\img\background\2.png" width="550" height="210"></div>
            </div>
        </div>
        <form method="GET" action="memberuser.blade.php">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group" align="center">
                            <div class="form-inline" col-xs-4>
                                <h5>จำนวนช่างภาพที่พบ  <u>{{count($photo)}}</u> คน,
                                    ผลการค้นหาจาก วันที่ <u>{{$date}}</u>,
                                    ราคา <u>{{$money}}</u>,
                                    ระยะเวลา <u>@if($helf == 1)ครึ่งวัน @elseif($helf == 2) เต็มวัน @endif</u>,
                                    @if($helf ==1)ช่วงเวลา <u> @if($helf1 == 1)ช่วงเช้า @elseif($helf1 == 2)
                                        ช่วงบ่าย  @elseif($helf1 == 3) ช่วงเย็น @endif @endif
                                    @if($helf ==2)ช่วงเวลา <u>เต็มวัน@endif</u>


                                </h5>



                                <h5>
                                    &nbsp;&nbsp;&nbsp;
                                    <h7>เรียงตาม</h7>
                                    &nbsp;&nbsp;&nbsp;
                                    <select class="form-control">
                                        <option>งบประมาณ</option>
                                        <option>คะแนน</option>
                                    </select>
                                </h5>
                            </div>
                        </div>
                        <br>


                        <table class="col-md-12 table">
                            <tr>
                                <th class="col-md-1">
                                    <center><h5>รูป</h5></center>
                                </th>
                                <th class="col-md-4"><h5>รายชื่อช่างภาพ</h5></th>
                                <th class="col-md-2"><h5>เต็มวัน</h5></th>
                                <th class="col-md-2"><h5>ครึ่งวัน</h5></th>
                                <th class="col-md-3"><h5>เบอร์ติดต่อ</h5></th>
                                <th class="col-md-2"><h5>สามารถติดต่อได้ที่</h5></th>
                                <th class="col-md-2"><h5>ส่งคำร้อง</h5></th>
                                <th class="col-md-2"><h5>คะแนน</h5></th>
                            </tr>

                            @foreach ($photo as $photo)

                                <tr>
                                    <td>
                                        <img src="assets/img/portfolio/{{$photo->image}}" width="50" height="50" alt="">
                                    </td>
                                    <td>
                                        <a style="color: #2ca02c" href="#"
                                           onClick="window.open('ShowProfile{{$photo->name}}',''); return false;">{{$photo->name}}</a>
                                    </td>
                                    <td>
                                        {{$photo->fullprice}}
                                    </td>
                                    <td>
                                        {{$photo->halfprice}}
                                    </td>
                                    <td>
                                        {{$photo->phonenumber}}
                                    </td>
                                    <td>
                                        {{$photo->website}}
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-info btn-xs" style="color: #FFFFFF" href="#"
                                           onClick="window.open('sendreques{{$photo->name}}',''); return false;">
                                            <span class="glyphicon glyphicon-pencil"
                                                  aria-hidden="true"></span>คำร้อง</a>
                                    </td>
                                    <td>
                                        <img src="assets/img/portfolio/like2.png" width="30" height="25" alt=""> {{count($photo['count'])}}

                                    </td>

                            @endforeach

                        </table>

                    </form>
                </div>
            </div>
        </form>
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