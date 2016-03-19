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

        $(document).ready(function() {

            $('#calendar').fullCalendar({
                defaultDate: '2016-03-12',
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: 'http://localhost:8000/CalendarIndex'

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
<--
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

            <a class="navbar-brand" href="/">เว็บแอปพลิเคชันจัดหาช่างภาพ</a>


        </div>


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
<br/><br/><br/>


<center><h3>เพิ่มรายระเอียด</h3><br/>


    <form action="storecalendar" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <h4>รายเพิ่มเอียดของงาน</h4>

        <textarea name="title" rows="" cols="60"></textarea><br/><br>

        รับงานตั้งแต่วันที่ <input type="date" size="30" name="start" value="">
        จนถึงวันที่<input type="date" size="30" name="end" value=""><br>

        <label class="checkbox-inline"><input name="morning" type="checkbox" value="ช่วงเช้า" checked>ช่วงเช้า</label>
        <label class="checkbox-inline"><input name="afternoon" type="checkbox" value="ช่วงบ่าย">ช่วงบ่าย</label>
        <label class="checkbox-inline"><input name="evening" type="checkbox" value="ช่วงเย็น">ช่วงเย็น</label><br/>

        <button class="btn btn-success" type="submit">ยืนยันการเพิ่มข้อมูล</button>


        <br/><br/><br/>

    </form>
</center>
<center><h1>ปฏิทินช่างภาพ</h1></center>

<div id='calendar'></div>



</body>
</html>
