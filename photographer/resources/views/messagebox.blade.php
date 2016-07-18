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
            margin-top: -500px;
            margin-bottom: -50px;
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

        .form{
            float: left;
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
                                <li><a href="changepassword/{{Auth::user()->id}}">เปลี่ยนรหัสผ่าน</a></li>
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


<section class="theme">
</section>

<section class="phofile">
    <div class="container"><br/><br/>
        <a href="home" style="text-align: left" class="btn btn-warning" type="submit">ย้อนกลับ</a><br/>

        <h2>ประวัติการจ้างงาน</h2>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">คำขอที่ยังไม่ได้ดำเดินการ</a></li>
            <li><a data-toggle="tab" href="#menu1">คำขอที่ตอบรับ</a></li>
            <li><a data-toggle="tab" href="#menu2">คำขอที่ปฏิเสธ</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>อยู่ในช่วงดำเนินการ</h3>

                <div class="row">
                    @foreach($requests as $reque)

                        <div class="col-md-4">
                            <p style="display: inline"><big>รหัสแบบฟอร์มบันทึก :</big> <strong
                                        style="color: #c87f0a">#RQ0{{$reque->id}}</strong></p>


                            <br/>

                            <p style="display: inline"><big>คุณ : </big><strong
                                        style="color: #0e6f5c">{{$reque->name_facebook}}</strong></p><br/>

                            <p style="display: inline"><big></big>

                            <p><img src="{{$reque->facebook_avatar}}" width="100" height="100"></p><br/>

                            <br/>

                            <p style="display: inline"><big>วันที่ต้องการถ่ายภาพ : </big><strong
                                        style="color: #0e6f5c">{{$reque->start}}</strong><br/>

                                ช่วง: @if(!$reque->morning==null  and  !$reque->afternoon==null and  !$reque->evening==null)
                                    <input type="text"
                                           style=" border: 2px solid #3498db"
                                           value="เต็มวัน"
                                           readonly>
                                @else   <input type="text"
                                               style=" border: 2px solid #3498db"
                                               value="{{$reque->morning}} {{$reque->afternoon}} {{$reque->evening }}"
                                               readonly> @endif<br/>

                            <p style="display: inline"><big>รายละเอียดงาน :</big><textarea
                                        style=" border: 2px solid #3498db"
                                        class="form-control" name="detail_request"
                                        rows="3"
                                        cols="40"
                                        readonly>{{$reque->detail_request}}</textarea></p><br/>


                                <form action="/RequestUpdate/{{$reque->id}}/" method="post"
                                      enctype="multipart/form-data">
                                    {!! csrf_field() !!}

                                    <input type="hidden" name="checkview" value="0">
                                    <input type="hidden" name="morning" value="{{$reque->morning}} ">
                                    <input type="hidden" name="afternoon" value="{{$reque->afternoon}}">
                                    <input type="hidden" name="evening" value="{{$reque->evening }}">
                                    <input type="hidden" name="name_facebook" value="{{$reque->name_facebook }}">

                                    <button class="form btn btn-success" style="font-size: 12px;" name="checkreques"
                                            type="submit" value="3"
                                            onclick="return confirmreques();"> ตอบรับคำขอ
                                    </button>

                                </form>

                                <form action="/RequestDelete/{{$reque->id}}/" method="post"
                                      enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="checkview" value="0">
                                    <input type="hidden" name="name_facebook" value="{{$reque->name_facebook }}">
                                    <button class="form btn btn-danger" style="font-size: 12px;"  name="checkreques"
                                            type="submit" value="0"
                                            onclick="return confirmDel();"> ปฏิเสธคำขอ
                                    </button>
                                </form>

                            <br/>

                            <script>
                                function confirmDel() {
                                    var x = confirm
                                    (" <?php echo  "คุณต้องการปฏิเสธคำร้องขอใช่หรือไม่! " ?> ")
                                    if (x)
                                        return true;
                                    else {
                                        return false;
                                    }
                                }
                            </script>
                            <script>
                                function confirmreques() {
                                    var x = confirm
                                    (" <?php echo  "คุณตอบรับงานตามคำร้องขอใช่หรือไม่! " ?> ")
                                    if (x)
                                        return true;
                                    else {
                                        return false;
                                    }
                                }
                            </script>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>ตอบรับ</h3>

                <div class="row">
                    @foreach($accepts as $accept)
                        <div class="col-md-4">
                            <p style="display: inline"><big>รหัสแบบฟอร์มบันทึก :</big> <strong
                                        style="color: #c87f0a">#RQ0{{$accept->id}}</strong></p>

                            <br/>

                            <p style="display: inline"><big>คุณ : </big><strong
                                        style="color: #0e6f5c">{{$accept->name_facebook}}</strong></p><br/>

                            <p style="display: inline"><big></big>

                            <p><img src="{{$accept->facebook_avatar}}" width="100" height="100"></p>

                            <br/>

                            <p style="display: inline"><big>วันที่คุณตอบรับคำขอ : </big><strong
                                        style="color: #0e6f5c">{{$accept->start}}</strong></p><br/>

                            ช่วง: @if(!$accept->morning==null  and  !$accept->afternoon==null and  !$accept->evening==null)
                                <input type="text"
                                       style=" border: 2px solid #3498db"
                                       value="เต็มวัน"
                                       readonly>
                            @else   <input type="text"
                                           style=" border: 2px solid #3498db"
                                           value="{{$accept->morning}} {{$accept->afternoon}} {{$accept->evening }}"
                                           readonly> @endif<br/>

                            <p style="display: inline"><big>รายละเอียดงาน :</big><textarea
                                        style=" border: 2px solid #3498db"
                                        class="form-control" name="detail_request"
                                        rows="3"
                                        cols="40"
                                        readonly>{{$accept->detail_request}}</textarea></p>


                        </div>
                    @endforeach
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>ปฏิเสธ</h3>

                <div class="row">
                    @foreach($rejects as $reject)
                        <div class="col-md-4">
                            <p style="display: inline"><big>รหัสแบบฟอร์มบันทึก :</big> <strong
                                        style="color: #c87f0a">#RQ0{{$reject->id}}</strong></p>

                            <br/>

                            <p style="display: inline"><big>คุณ : </big><strong
                                        style="color: #0e6f5c">{{$reject->name_facebook}}</strong></p><br/>

                            <p style="display: inline"><big></big>

                            <p><img src="{{$reject->facebook_avatar}}"></p><br/>


                            <br/>

                            <p style="display: inline"><big>วันที่คุณปฏิเสธ : </big><strong
                                        style="color: #0e6f5c">{{$reject->start}}</strong></p><br/>

                            ช่วง: @if(!$reject->morning==null  and  !$reject->afternoon==null and  !$reject->evening==null)
                                <input type="text"
                                       style=" border: 2px solid #3498db"
                                       value="เต็มวัน"
                                       readonly>
                            @else   <input type="text"
                                           style=" border: 2px solid #3498db"
                                           value="{{$reject->morning}} {{$reject->afternoon}} {{$reject->evening }}"
                                           readonly> @endif<br/>

                            <p style="display: inline"><big>รายละเอียดงาน :</big><textarea
                                        style=" border: 2px solid #3498db"
                                        class="form-control" name="detail_request"
                                        rows="3"
                                        cols="40"
                                        readonly>{{$reject->detail_request}}</textarea></p>


                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</section>


</body>

</html>
