<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project DOTA</title>
    <link rel="icon" href="assets/img/icon/favicon.ico"/>
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

    <!-- DataTables -->
    <link rel="stylesheet" href="assets/datatables/dataTables.bootstrap.css">


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

        section.theme2 {
            width: 100%;
            background-color: #C1FFC1;

        }

        section.theme3 {
            width: 100%;
            background-color: #BBFFFF;

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
                <div class="col-md-6 col-md-offset-3">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-lg-12 text-center">

                    <h2>ผลลัพธ์การค้นหา</h2>
                    <img src="assets\img\background\2.png" width="550" height="210"></div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row control-group" align="center">
                        <div class="form-inline" col-xs-4>



                        </div>
                    </div>
            </div>
            </form>
            <br>


            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#Onesearch">ค้นหาแบบวันเดียว</a></li>
                <li><a data-toggle="tab" href="#dd">ค้นหาแบบหลายวัน</a></li>
            </ul>


            <div class="tab-content">
                <div id="Onesearch" class="tab-pane fade in active">

                        <form method="get" action='s'>
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                                    <div name="sentMessage" id="contactForm" novalidate>
                                        <div class="row control-group" align="center">
                                            <div class="form-inline" col-xs-4>
                                                <br><br<br>&nbsp;&nbsp;&nbsp;
                                                <h7>วันที่ต้องการถ่ายภาพ</h7>
                                                &nbsp;&nbsp;&nbsp;
                                                <input class="form-control" type="date"
                                                       min="<?php echo date("Y-m-d");?>" name="date">


                                                &nbsp;&nbsp;&nbsp;
                                                <h7>ระยะเวลาถ่าย</h7>
                                                &nbsp;&nbsp;&nbsp;
                                                <select id="OperationType" class="form-control" name="time"
                                                        onChange="hideshow()">

                                                    <option value="0"> กรุณาระบุ</option>
                                                    <option value="1">ครึ่งวัน</option>
                                                    <option value="2">เต็มวัน</option>

                                                </select>

                                                &nbsp;&nbsp;&nbsp;
                                                <h7 id="t1">ช่วงเวลา</h7>
                                                &nbsp;&nbsp;
                                                <select id="OperationNos" class="form-control" name="time2">

                                                    <option value="0"> กรุณาระบุ</option>
                                                    <option value="1">เช้า</option>
                                                    <option value="2">บ่าย</option>
                                                    <option value="3">เย็น</option>

                                                </select>


                                                <script>
                                                    function hideshow() {
                                                        var s1 = document.getElementById('OperationType');
                                                        var s2 = document.getElementById('OperationNos');

                                                        if (s1.options[s1.selectedIndex].text == "ครึ่งวัน") {
                                                            s2.style.visibility = 'visible';
                                                            document.getElementById('t1').style.visibility = 'visible';

                                                        }
                                                        if (s1.options[s1.selectedIndex].text == "เต็มวัน") {
                                                            s2.style.visibility = 'hidden';
                                                            document.getElementById('t1').style.visibility = 'hidden';


                                                        }
                                                        function hide() {

                                                            document.getElementById('t1').style.visibility = 'hidden';
                                                        }

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
                                                    <input title="โปรกรอกตัวเลขเท่านั้น" class="form-control"
                                                           type="text" placeholder="งบประมาณ 1-99999"
                                                           name="money" pattern="[0-9]{1,5}">

                                                    &nbsp;
                                                    <h7>ชือ/รหัส ช่างภาพ</h7>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <input class="form-control" type="text" min="0"
                                                           placeholder="เช่น วันเฉลิม "
                                                           name="name">
                                                    <br> <br>
                                                    &nbsp;
                                                    <h7>รหัสช่างภาพ</h7>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <input class="form-control" type="text" min="0"
                                                           placeholder="รหัสประจำตัวช่างภาพ"
                                                           name="idpro">


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

                            </div>
                        </form>

                </div>
                <!--###############################Muti Search#########################-->
                <div id="dd" class="tab-pane">
                    <form method="get" action='mutisearch'>

                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                                    <div name="sentMessage" id="contactForm" novalidate>
                                        <div class="row control-group" align="center">
                                            <div class="form-inline" col-xs-4>
                                                <br>

                                                <div class="input_fields_wrap">
                                                    @foreach(session()->get('data') as $index => $dateArray)
                                                        <div>
                                                            &nbsp;&nbsp;&nbsp;
                                                            <h7>วันที่ต้องการถ่ายภาพ</h7>
                                                            &nbsp;&nbsp;&nbsp;

                                                            <input class="form-control" type="date"
                                                                   min="<?php echo date("Y-m-d");?>" name="date[]"
                                                                   value="{{$dateArray}}">


                                                            &nbsp;&nbsp;&nbsp;
                                                            <h7>ระยะเวลาถ่าย</h7>
                                                            &nbsp;&nbsp;&nbsp;
                                                            <select id="OperationType3[{{$index}}]" class="form-control"
                                                                    name="time[]" onChange="hideshow2({{$index}})">
                                                                @if(session()->get('helf')[$index] == 0)
                                                                    <option value="0" selected> กรุณาระบุ</option>
                                                                    <option value="1">ครึ่งวัน</option>
                                                                    <option value="2">เต็มวัน</option>
                                                                @endif
                                                                @if(session()->get('helf')[$index] == 1)
                                                                    <option value="0"> กรุณาระบุ</option>
                                                                    <option value="1" selected>ครึ่งวัน</option>
                                                                    <option value="2">เต็มวัน</option>
                                                                @endif
                                                                @if(session()->get('helf')[$index] == 2)
                                                                    <option value="0"> กรุณาระบุ</option>
                                                                    <option value="1">ครึ่งวัน</option>
                                                                    <option value="2" selected>เต็มวัน</option>
                                                                @endif
                                                            </select>


                                                            &nbsp;&nbsp;
                                                            <h7 id="t3[{{$index}}]"
                                                                @if(session()->get('helf')[$index] == 2) style="visibility: hidden" @endif >
                                                                ช่วงเวลา
                                                            </h7>
                                                            &nbsp;&nbsp;
                                                            <select id="OperationNos3[{{$index}}]" class="form-control"
                                                                    name="time2[]"
                                                                    @if(session()->get('helf')[$index] == 2) style="visibility: hidden" @endif>
                                                                @if(session()->get('helf1')[$index] == '0')
                                                                    <option value="0" selected> กรุณาระบุ</option>
                                                                    <option value="morning">เช้า</option>
                                                                    <option value="afternoon">บ่าย</option>
                                                                    <option value="evening">เย็น</option>
                                                                @endif
                                                                @if(session()->get('helf1')[$index] == "morning")
                                                                    <option value="0"> กรุณาระบุ</option>
                                                                    <option value="morning" selected>เช้า</option>
                                                                    <option value="afternoon">บ่าย</option>
                                                                    <option value="evening">เย็น</option>
                                                                @endif
                                                                @if(session()->get('helf1')[$index] == "afternoon")
                                                                    <option value="0"> กรุณาระบุ</option>
                                                                    <option value="morning" selected>เช้า</option>
                                                                    <option value="afternoon" selected>บ่าย</option>
                                                                    <option value="evening">เย็น</option>
                                                                @endif
                                                                @if(session()->get('helf1')[$index] == "evening")
                                                                    <option value="0"> กรุณาระบุ</option>
                                                                    <option value="morning" selected>เช้า</option>
                                                                    <option value="afternoon">บ่าย</option>
                                                                    <option value="evening" selected>เย็น</option>
                                                                @endif
                                                            </select>

                                                            @if($index == 0)
                                                                &nbsp;&nbsp;&nbsp;<a href="#"
                                                                                     class="add_field_button"><img
                                                                            src="assets/img/icon/sign-add-icon.png"
                                                                            width="30" height="30"></a>
                                                            @else
                                                                &nbsp;&nbsp;&nbsp;<a href="#" onclick=""
                                                                                     class="remove_field"> <img
                                                                            src="assets/img/icon/remove-button-md.png"
                                                                            width="25" height="25"></a>
                                                            @endif
                                                            <br><br>


                                                            <script>
                                                                function hideshow3() {
                                                                    var s1 = document.getElementById('OperationType2');
                                                                    var s2 = document.getElementById('OperationNos2');

                                                                    if (s1.options[s1.selectedIndex].text == "-") {
                                                                        s2.style.visibility = 'visible';
                                                                        document.getElementById('t2').style.visibility = 'visible';

                                                                    }
                                                                    if (s1.options[s1.selectedIndex].text == "ครึ่งวัน") {
                                                                        s2.style.visibility = 'visible';
                                                                        document.getElementById('t2').style.visibility = 'visible';

                                                                    }
                                                                    if (s1.options[s1.selectedIndex].text == "เต็มวัน") {
                                                                        s2.style.visibility = 'hidden';
                                                                        document.getElementById('t2').style.visibility = 'hidden';


                                                                    }
                                                                    function hide() {

                                                                        document.getElementById('t2').style.visibility = 'hidden';
                                                                    }

                                                                }
                                                            </script>

                                                        </div>
                                                    @endforeach

                                                </div>


                                            </div>
                                        </div>


                                    </div>
                                    <div id="success"></div>
                                    <div class="row">
                                        <div class="form-group col-xs-12" align="center">

                                            <br>
                                            <button class="btn btn-success">ค้นหา</button>
                                        </div>
                                    </div>


                                    <input type="hidden" id="coutDate" value="{{count(session()->get('data'))}}">
                                </div>



                    </form>


                </div>
            </div>
            <center><h5>จำนวนช่างภาพที่พบ <u>{{count($photo)}}</u> คน ,


                @foreach(session()->get('data') as $index => $data  )
                    @if(session()->get('helf')[$index] == 0)
                        @if( session()->get('helf1')[$index] == "morning")
                            จากวันที่ <u>{{$data}}</u>
                            ช่วงเวลา <u>เช้า</u>,
                        @endif
                        @if( session()->get('helf1')[$index] == "afternoon")
                            จากวันที่ <u>{{$data}}</u>
                            ช่วงเวลา <u>บ่าย</u>,
                        @endif
                        @if( session()->get('helf1')[$index] == "evening")
                            จากวันที่ <u>{{$data}}</u>
                            ช่วงเวลา <u>เย็น</u>,
                        @endif
                        @if( session()->get('helf1')[$index] == "0")
                            จากวันที่ <u>{{$data}}</u>
                            ช่วงเวลา -,
                        @endif
                    @endif
                    @if(session()->get('helf')[$index] == 1)
                        @if( session()->get('helf1')[$index] == "morning")
                            จากวันที่ <u>{{$data}}</u>
                            ช่วงเวลา <u>เช้า</u>,
                        @endif
                        @if( session()->get('helf1')[$index] == "afternoon")
                            จากวันที่ <u>{{$data}}</u>
                            ช่วงเวลา <u>บ่าย</u>,
                        @endif
                        @if( session()->get('helf1')[$index] == "evening")
                            จากวันที่ <u>{{$data}}</u>
                            ช่วงเวลา <u>เย็น</u>,
                        @endif
                        @if( session()->get('helf1')[$index] == "0")
                            จากวันที่ <u>{{$data}}</u>
                            ช่วงเวลา -,
                        @endif
                    @endif
                    @if(session()->get('helf')[$index] == 2)
                        {{$data}}
                        ระยะเวลา <u>เต็มวัน</u>
                    @endif

                @endforeach

                {{--ระยะเวลา <u>@if($helf == 1)ครึ่งวัน @elseif($helf == 2) เต็มวัน @endif</u>,--}}
                {{--@if($helf ==1)ช่วงเวลา <u> @if($helf1 == 1)ช่วงเช้า @elseif($helf1 == 2)--}}
                {{--ช่วงบ่าย  @elseif($helf1 == 3) ช่วงเย็น @endif @endif--}}
                {{--@if($helf ==2)ช่วงเวลา <u>เต็มวัน@endif</u>--}}


            </center></h5>

        </div>

        <table class="col-md-4 example1" id="example1" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="col-md-4"><h5>รหัสสมาชิก</h5></th>
                <th class="col-md-1">
                    <center><h5>รูป</h5></center>
                </th>
                <th class="col-md-4"><h5>รายชื่อช่างภาพ</h5></th>
                <th class="col-md-2"><h5>เต็มวัน</h5></th>
                <th class="col-md-2"><h5>ครึ่งวัน</h5></th>
                <th class="col-md-3"><h5>เบอร์ติดต่อ</h5></th>
                <th class="col-md-2"><h5>สามารถติดต่อได้ที่</h5></th>
                <th class="col-md-2"><h5>ดูข้อมูล</h5></th>
                <th class="col-md-2"><h5>ส่งคำร้อง</h5></th>
                <th class="col-md-2"><h5>คะแนน</h5></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($photo as $photo)

                <tr>
                    <td>
                        #P0{{$photo->id}}
                    </td>
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
                        <a style="color: #2ca02c" href="#"
                           onClick="window.open('ShowProfile{{$photo->name}}',''); return false;"><img
                                    src="assets/img/icon/magnifying-glass.png" width="40" height="35"
                                    alt=""></a>
                    </td>

                    <td>
                        <a type="button" class="btn btn-info btn-xs" style="color: #FFFFFF" href="#"
                           onClick="window.open('mutisendreques{{$photo->name}}',''); return false;">
                                            <span class="glyphicon glyphicon-pencil"
                                                  aria-hidden="true"></span>คำร้อง</a>
                    </td>
                    <td>
                        <img src="assets/img/portfolio/like2.png" width="30" height="30"
                             alt=""> {{count($photo['likes'])}}

                    </td>
                </tr>


            @endforeach
            </tbody>
        </table>


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

<script>
    $(document).ready(function () {
        $('#example1').DataTable();
    });
</script>
<!-- DataTables -->
<script src="assets/datatables/jquery.dataTables.min.js"></script>
<script src="assets/datatables/dataTables.bootstrap.min.js"></script>

<script> $(document).ready(function () {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = document.getElementById("coutDate").value;
        var y = document.getElementById("coutDate").value;
        ;//initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment

                $(wrapper).append('<div><br>&nbsp;&nbsp;&nbsp; <h7>วันที่ต้องการถ่ายภาพ</h7> &nbsp;&nbsp;&nbsp; <input class="form-control" type="date" min="<?php echo date("Y-m-d");?>" name="date[]">  '
                        + '&nbsp;&nbsp;&nbsp; <h7>ระยะเวลาถ่าย</h7> &nbsp;&nbsp;&nbsp;<select id="OperationType3[' + y + ']" class="form-control" name="time[]" onChange=hideshow2(' + y + ')> '
                        + '<option value="0">-</option><option value="1">ครึ่งวัน</option> <option value="2">เต็มวัน</option> </select>'
                        + '&nbsp;&nbsp;&nbsp; <h7 id="t3[' + y + ']">ช่วงเวลา</h7> &nbsp;&nbsp;&nbsp; <select id="OperationNos3[' + y + ']" class="form-control" name="time2[]">'
                        + '<option value="0">-</option><option value="morning">เช้า</option> <option value="afternoon">บ่าย</option> <option value="evening">เย็น</option> </select> '
                        + '&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="remove_field">  <img src="assets/img/icon/remove-button-md.png" width="25" height="25"></a></div>'); //add input box

                y++;
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text

            var check = confirmDel();
            if (check == true) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            }
        })
    }); </script>

<script>
    function hideshow2(y) {
        var s1 = document.getElementById('OperationType3[' + y + ']');
        var s2 = document.getElementById('OperationNos3[' + y + ']');
        console.log(s1);

        if (s1.options[s1.selectedIndex].text == "-") {
            s2.style.visibility = 'visible';
            document.getElementById('t3[' + y + ']').style.visibility = 'visible';

        }
        if (s1.options[s1.selectedIndex].text == "ครึ่งวัน") {
            s2.style.visibility = 'visible';
            document.getElementById('t3[' + y + ']').style.visibility = 'visible';

        }
        if (s1.options[s1.selectedIndex].text == "เต็มวัน") {
            s2.style.visibility = 'hidden';
            document.getElementById('t3[' + y + ']').style.visibility = 'hidden';


        }
        function hide() {

            document.getElementById('t3[' + y + ']').style.visibility = 'hidden';
        }

    }
</script>
<script>
    function confirmDel() {

        if (confirm("คุณต้องการลบใช่หรือไม่!") == true) {


            return true;

        } else {
            return false;
        }
    }

</script>
</body>

</html>