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
                defaultDate: '2016-05-12',
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: 'http://localhost:8000/CalendarsendHome',
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


<!-- Contact Section --> <!--facebook -->
<section class="theme"></section>

<section class="phofile">
    <div class="container">
        <a href="home" style="text-align: left" class="btn btn-warning" type="submit">ย้อนกลับ</a>
    </div>
    <div class="container">
        <br>

        @if(Auth::check())
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
            <div class="col-md-6 col-md-offset-3">
                <form method="post" action="update/{{Auth::user()->id}}" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="_method" value="PATCH"/>

                    <center><h2> แก้ไขข้อมูลช่างภาพ</h2></center>
                    <br>

                    {{--<span class="col-md-2 glyphicon glyphicon-user" aria-hidden="true">รูปภาพ</span>
                    <input type="file"  name="image" src="{{Auth::user()->image}}" required><br><br>--}}
                    <span class="glyphicon glyphicon-user" aria-hidden="true">รูปประจำตัว </span>

                    <input type="file" name="image" class="form-control"
                           value="{{Auth::user()->image}}">

                 {{--   <p>(นามสกุลไฟล์ jpg หรือ png)</p> <br>--}}

                    <center><img src="assets/img/portfolio/{{Auth::user()->image}}" width="200" height="200"
                                 alt=""></center>
                    <br/><br/>

                    <span class="glyphicon glyphicon-user" aria-hidden="true">ชื่อติดต่อ</span>
                    <input class="form-control" type="text" size="25" name="name" value="{{Auth::user()->name}}"
                           required><br>

                    <span class=" glyphicon glyphicon-home" aria-hidden="true">ที่อยู่</span>
                    <input class="form-control" type="text" size="25" name="addres" value="{{Auth::user()->addres}}"
                           placeholder="ที่อยู่ปัจจุบันของคุณ" required><br>

                    <ul class="list-inline">
                        <li><span class=" glyphicon glyphicon-phone" aria-hidden="true" data-toggle="tooltip"
                                  data-placement="right" title="ตัวอย่างรูปแบบ https://www.facebook.com/photographer
                        ">สามารถติดต่อได้ที่(URL)</span>
                        </li>
                    </ul>
                    <input class="form-control" type="url" size="25" name="website"
                           value="{{Auth::user()->website}}"
                           placeholder="ตัวอย่างรูปแบบ https://www.facebook.com/photographer"
                           required><br>


                    <ul class="list-inline">
                        <li><span class=" glyphicon glyphicon-phone" aria-hidden="true" data-toggle="tooltip"
                                  data-placement="right" title="ไม่สามารถแก้ไขได้">อีเมล์</span>
                        </li>
                    </ul>
                    <input class="form-control" type="email" size="30" name="email" style="background: #C0F9BD"
                           value="{{Auth::user()->email}} " readonly><br>


                    <ul class="list-inline">
                        <li><span class=" glyphicon glyphicon-phone" aria-hidden="true" data-toggle="tooltip"
                                  data-placement="right"
                                  title="ต้องขึ้นต้นด้วย 0 และมี 10 ตัวเลข ตัวอย่างรูปแบบ 09xxxxxxxx!">เบอร์โทรศัพท์</span>
                        </li>
                    </ul>
                    <input class="form-control" type="tel" size="25" name="phonenumber"
                           pattern="[0][8|9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]"
                           value="{{Auth::user()->phonenumber}}"
                           placeholder="ต้องขึ้นต้นด้วย 0 และมี 10 ตัวเลข ตัวอย่างรูปแบบ 09xxxxxxxx!"
                           required="true"/><br>


                    <span class=" glyphicon glyphicon-camera" aria-hidden="true"> ราคา(บาท)</span><br/>

                    <div class="form-control"> ครึ่งวัน : <input type="number" min="0" name="halfprice" size="7"
                                                                 placeholder="(บาท)"
                                                                 value="{{Auth::user()->halfprice}}"/>
                        เต็มวัน : <input type="number" name="fullprice" min="0" size="7"
                                         placeholder="(ต้องมากกว่าจำนวนเงินครึ่งวัน)"
                                         value="{{Auth::user()->fullprice}}"/></div>
                    <br/><br/>

                    <button type="submit" class="btn btn-info " aria-label="Left Align" onclick="return confirmEdit();">
                    <span class="glyphicon glyphicon-edit glyphicon-align-center"
                          aria-hidden="true" >บันทึกการแก้ไข</span>
                    </button>
                </form>
            </div>

            <script>
                $(document).ready(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
            </script>

            <script>
                function confirmEdit() {

                    var x = confirm(" <?php echo  "คุณต้องการบันทึกข้อข้อมูลส่วนตัว ใช่หรือไม่! " ?> ")
                    if (x)
                        return true;
                    else {
                        return false;
                    }
                }

            </script>


        @endif


    </div>

</section>
</body>
</html>
