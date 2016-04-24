<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freelancer - Start Bootstrap Theme</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/freelancer.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href='assets/css/fullcalendar.css' rel='stylesheet'/>
    <link href='assets/css/fullcalendar.print.css' rel='stylesheet' media='print'/>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
    <script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
    <script src='assets/js/fullcalendar.js'></script>
    <script>

        $(document).ready(function () {

            $('#calendar').fullCalendar({
                defaultDate: '2016-04-12',

                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: 'http://localhost:8000/Calendarsend',
                eventColor: '#008080'

            });

        });


    </script>
    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>
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

            <a href="/"><img src="assets/img/portfolio/Logo3.png"  width="500" height="100" ></a>

        </div>

        @if(Auth::check())

            <ul class="nav navbar-nav navbar-right">
                <li><a href="home"><span class="glyphicon glyphicon-user"></span>คุณ {{Auth::user()->name}}</a></li>
                <li><a href="auth/logout"><span class="glyphicon glyphicon-log-in"></span> ออกจากระบบ </a></li>
            </ul>

            @endif


                    <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>

                </ul>
            </div>
    </div>

</nav>
<br/><br/><br/><br/><br/>

<div class="container"><br/><br/>

    <a href="home" class="glyphicon glyphicon-home btn btn-warning" type="submit"> ย้อนกลับไปหน้า HOME</a>


    <center><h3>เพิ่มรายละเอียดปฏิทิน</h3><br/>


        @if(Auth::check())

            <form action="storecalendar" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="url" value="/editcalendar">


                <textarea name="title" rows="" cols="60" required></textarea><br/><br>

                รับงานตั้งแต่วันที่ <input type="date" min="<?php echo date("Y-m-d");?>" size="30" name="start" value="" required>
                จนถึงวันที่<input type="date" min="<?php echo date("Y-m-d");?>" size="30" name="end" value="" required><br>

                <label class="checkbox-inline"><input name="morning" type="checkbox" value="ช่วงเช้า"
                                                      checked>ช่วงเช้า</label>
                <label class="checkbox-inline"><input name="afternoon" type="checkbox" value="ช่วงบ่าย">ช่วงบ่าย</label>
                <label class="checkbox-inline"><input name="evening" type="checkbox"
                                                      value="ช่วงเย็น">ช่วงเย็น</label><br/>

                <button class="btn btn-success" type="submit">ยืนยันการเพิ่มข้อมูล</button>

                <br/><br/><br/>
            </form>

        @endif


    </center>

    <center><h1>ปฏิทินช่างภาพ</h1></center>


    <div id='calendar'></div>

</div>


</body>
</html>

