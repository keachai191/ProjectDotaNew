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

            <a class="navbar-brand" href="/">เว็บแอปพลิเคชันจัดหาช่างภาพ</a>


        </div>

        @if(Auth::check())

            <a class="col-md-offset-4">{{Auth::user()->name}} : กำลังใช้งาน</a><br/>
            <a class="col-md-offset-4" href="auth/logout">ออกจากระบบ</a>


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
                    <td><input class="form-control" type="text" name="title" value="{{$calendar->title}}"></td>
                    <td><input class="form-control" type="date" name="start" size="" value="{{$calendar->start}}"></td>
                    <td><input class="form-control" type="date" name="end" value="{{$calendar->end}}">
                    <td>



                            <input type="checkbox" name="morning" value="ช่วงเช้า" <?php if($calendar->morning != null)  echo "checked"; ?> >  ช่วงเช้า <br>
                            <input type="checkbox" name="afternoon" value="ช่วงบ่าย" <?php if($calendar->afternoon != null)  echo "checked"; ?> >  ช่วงบ่าย <br>
                            <input type="checkbox" name="evening" value="ช่วงเย็น" <?php if($calendar->evening != null)  echo "checked"; ?> >  ช่วงเย็น <br>
                        {{--@elseif($calendar->afternoon != null)--}}
                            {{--<input type="checkbox" name="afternoon" value="ช่วงเช้า"> ช่วงเช้า <br>--}}
                            {{--<input type="checkbox" name="afternoon" value="ช่วงบ่าย" checked> ช่วงบ่าย <br>--}}
                            {{--<input type="checkbox" name="afternoon" value="ช่วงเย็น"> ช่วงเย็น <br>--}}
                        {{--@elseif($calendar->evening != null)--}}
                            {{--<input type="checkbox" name="evening" value="ช่วงเช้า"> ช่วงเช้า <br>--}}
                            {{--<input type="checkbox" name="evening" value="ช่วงบ่าย"> ช่วงบ่าย <br>--}}
                            {{--<input type="checkbox" name="evening" value="ช่วงเย็น" checked> ช่วงเย็น <br>--}}


                    </td>

                    <td>
                        <button class="btn btn-info" type="submit"> แก้ไข</button>
                    </td>
            </form>

            <td>
                <form action="/CalendarDestroy{{$calendar->id}}" method="post">
                    {!! csrf_field() !!}

                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                    <button class="btn btn-danger" type="submit" onclick="return confirmDel();"> ลบ</button>

                    <script>
                        function confirmDel(){

                            var  x = confirm("แน่ใจเหย่อออออออออออออ")
                            if(x)
                                return true;
                            else{
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


</body>
</html>

