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

        section.phofile {
            padding: 20px;
            padding-bottom: 300px;
            background: #FFFFFF;
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

</nav>


<section class="theme"></section>
<section class="phofile">
    <div class="container"><br/><br/>

        <form action="Calendar" method="get" enctype="multipart/form-data">

            <button class="btn btn-warning" type="submit">ย้อนกลับ</button>
        </form>
        @foreach($calendars as $calendar)
            <table class="col-md-12 table">
                <tr>
                    <th class="col-md-3"><h4>หัวข้อ</h4></th>
                    <th class="col-md-2"><h4>วันที่เริ่มงาน</h4></th>
                    <th class="col-md-2"><h4>วันที่สิ้นสุดกานทำงาน</h4></th>
                    <th class="col-md-1"><h4>ช่วงเวลา</h4></th>
                    <th class="col-md-1"><h4>แก้ไข</h4></th>
                    <th class="col-md-1"><h4>ลบ</h4></th>
                </tr>


                <form action="/CalendarUpdate{{$calendar->id}}" method="post">
                    {!! csrf_field() !!}

                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="url" value="/editcalendar">
                    <tr>
                        <td><input class="form-control" type="text" name="title" value="{{$calendar->title}} "></td>

                        <td>
                            <input type="datetime" name="start" class="form-control" value="{{$calendar->start}}">
                        </td>

                        <td>
                            <input type="datetime" name="end" class="form-control" value="{{$calendar->end}}">
                        </td>

                        <td>
                            <input type="checkbox" name="morning"
                                   value="ช่วงเช้า" <?php if ($calendar->morning != null) echo "checked"; ?> > ช่วงเช้า
                            <br>
                            <input type="checkbox" name="afternoon"
                                   value="ช่วงบ่าย" <?php if ($calendar->afternoon != null) echo "checked"; ?> >
                            ช่วงบ่าย
                            <br>
                            <input type="checkbox" name="evening"
                                   value="ช่วงเย็น" <?php if ($calendar->evening != null) echo "checked"; ?> > ช่วงเย็น
                            <br>
                        </td>

                        <td>
                            <button class="glyphicon glyphicon-pencil btn btn-success" type="submit"
                                    onclick="return confirmEdit();"> แก้ไข
                            </button>
                        </td>
                </form>

                <td>
                    <form action="/CalendarDestroy{{$calendar->id}}" method="post">
                        {!! csrf_field() !!}

                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                        <button class="glyphicon glyphicon-remove btn btn-danger" type="submit"
                                onclick="return confirmDel();"> ลบ
                        </button>

                        <script>
                            function confirmDel() {

                                var x = confirm(" <?php echo  "คุณต้องการลบหัวข้อ {$calendar->title} ใช่หรือไม่! " ?> ")
                                if (x)
                                    return true;
                                else {
                                    return false;
                                }
                            }

                        </script>
                        <script>
                            function confirmEdit() {

                                var x = confirm(" <?php echo  "คุณต้องแก้ไขหัวข้อ {$calendar->title} ใช่หรือไม่! " ?> ")
                                if (x)
                                    return true;
                                else {
                                    return false;
                                }
                            }

                        </script>


                    </form>
                </td>
                </tr>


            </table>
        @endforeach
    </div>
</section>
</body>
</html>

