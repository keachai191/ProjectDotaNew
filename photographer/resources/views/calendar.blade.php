<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project DOTA</title>
    <link rel="icon" href="assets/img/icon/favicon.ico" />
    <!-- + -->
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Calendar -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='assets/css/fullcalendar.css' rel='stylesheet'/>
    <link href='assets/css/fullcalendar.print.css' rel='stylesheet' media='print'/>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
    <script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
    <script src='assets/js/fullcalendar.js'></script>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

    <script>
        $(document).ready(function () {
            $('#calendar').fullCalendar

            ({
                defaultDate: '2016-06-12',
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: 'http://localhost:8000/Calendarsend',
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
            margin-top: -450px;
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
            background: #FFFFFF;
        }


        #calendar {
            max-width: 800px;
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
            <li> @if(Auth::check())


                    <div align="right">
                        <div class="btn-group" role="group">

                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                <img src="assets/img/portfolio/{{Auth::user()->image}}" width="30" height="30">
                                ช่างภาพ {{Auth::user()->name}}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->status == 'admin')
                                    <li><a href="admin">สำหรับผู้ดูแลระบบ</a></li>
                                @endif
                                <li><a href="home">Home</a></li>
                                <li><a href="auth/logout">ออกจากระบบ</a></li>
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
<section class="phofile">
    <div class="container">
        <a href="home" style="text-align: left" class="btn btn-warning" type="submit">ย้อนกลับ</a><br/><br/><br/>

        <a class="w3-btn-floating-large  w3-red"
           data-toggle="modal" data-target="#myModal">
            + <span class="badge"></span>
        </a>
        <br/>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> ปฏิทิน!! </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-inline" col-xs-4>

                            <center> @if(Auth::check())
                                    <h4>รายละเอียดงาน</h4>
                                    <form action="storecalendar" method="post" enctype="multipart/form-data">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="url" value="/editcalendar">


                                        <textarea name="title" rows="" cols="60" class="form-control"
                                                  required></textarea><br/>

                                        <br>รับงานตั้งแต่วันที่ <input class="form-control" type="date"
                                                                       min="<?php echo date("Y-m-d");?>" size="30"
                                                                       name="start" value=""
                                                                       required>
                                        จนถึงวันที่ <input class="form-control" type="date"
                                                           min="<?php echo date("Y-m-d");?>" size="30" name="end"
                                                           value=""
                                                           required><br>

                                        <label class="checkbox-inline"><input name="morning" type="checkbox"
                                                                              value="ช่วงเช้า"
                                                                              checked>ช่วงเช้า</label>
                                        <label class="checkbox-inline"><input name="afternoon" type="checkbox"
                                                                              value="ช่วงบ่าย">ช่วงบ่าย</label>
                                        <label class="checkbox-inline"><input name="evening" type="checkbox"
                                                                              value="ช่วงเย็น">ช่วงเย็น</label><br/>

                                        <button class="btn btn-success" type="submit">ยืนยันการเพิ่มข้อมูล</button>

                                        <br/><br/><br/>
                                    </form>


                                @endif
                            </center>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <center><h2>ปฏิทินช่างภาพ</h2></center>
    <div id='calendar'></div>
</section>
</div>


</body>
</html>

