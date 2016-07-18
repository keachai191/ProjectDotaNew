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
                defaultDate: '2016-06-12',
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: 'http://localhost:8000/CalendarsendHome',
                eventColor: '#008080'

            });

        });

    </script>
    <script>
        function confirmEdit() {

            var x = confirm(" <?php echo  "คุณต้องการบันทึกข้อมูล ใช่หรือไม่! " ?> ")
            if (x)
                return true;
            else {
                return false;
            }
        }

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

        section.intro {
            padding: 20px;
            padding-bottom: 150px;
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

<section class="theme">
</section>

<section class="intro">
    <div class="container">
        <div class="col-lg-12 text-center">

        </div>

        <!-- #############################  showrofile ... ########################################################-->


        <ul class="nav nav-pills nav-justified">
            @foreach($profiles as $profile)
                <h2><u> หน้าสำหรับผู้ดูแลระบบ  </u> </h2><br/><br/>
                <center><h4> ช่างภาพ {{$profile->name}}</h4></center><br/>

            @endforeach

            <ul class="nav nav-tabs">

                <li><a data-toggle="tab" href="#tabalbum">อัลบั้มช่างภาพ</a></li>
                <li class="active"><a data-toggle="tab" href="#tabcalendar">ปฏิทินช่างภาพ</a></li>
                <li><a data-toggle="tab" href="#tabcomment">ข้อความตอบกลับ</a></li>
            </ul>


        </ul>

        <div class="tab-content">


            <!-- ##############################  Album ... #######################################################-->

            <div class="tab-pane fade" id="tabalbum">

                <center><h2>อัลบั้มงาน</h2></center>
                <br/>


                <div id="stylealbum">
                    <span id="optinforms-form5-name-field" name="FNAME"
                          style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#002D31">


                                <table class="col-md-12 table">
                                    <tr>
                                        <th>
                                            <h4>
                                                <center><a style="color: #0f7864">
                                                        <span class="glyphicon glyphicon-th-large"
                                                              aria-hidden="true"></span>
                                                    </a>ประเภทอัลบั้ม
                                                </center>
                                            </h4>
                                        </th>
                                        <th>
                                            <h4>
                                                <center><a style="color: #0f7864">
                                                    <span class="glyphicon glyphicon-globe"
                                                          aria-hidden="true"></span>
                                                    </a>ที่อยู่อัลบั้ม
                                                </center>
                                            </h4>
                                        </th>
                                        <th>
                                            <h4>
                                                <center><a style="color: #0f7864">
                                                    <span class="glyphicon glyphicon-check"
                                                          aria-hidden="true"></span>
                                                    </a>รายละเอียด
                                                </center>
                                            </h4>
                                        </th>
                                        <th>
                                            <h4>
                                                <center><a style="color: #0f7864">
                                                    <span class="glyphicon glyphicon-check"
                                                          aria-hidden="true"></span>
                                                    </a>ลบ
                                                </center>
                                            </h4>
                                        </th>
                                    </tr>


                                    @foreach($albums as $album )
                                        <tr>

                                            <td>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <p data-toggle="collapse">
                                                                {{$album->type_al}}
                                                            </p>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <a style="color: #2ca02c" href="#"
                                                   onClick="window.open('{{$album->url_al}}',''); return false;">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <p data-toggle="collapse">
                                                                    {{$album->url_al}}
                                                                </p>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <p data-toggle="collapse">
                                                                {{$album->detail_al}}
                                                            </p>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <form action="/adminDestroyAlbum/{{$album->id}}/" method="post">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="user_id" value="{{$album->user_id}}">
                                                    <button class="glyphicon glyphicon-remove btn btn-danger"
                                                            type="submit"  onclick="return confirmEdit();"> ลบ
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                    </span>
                </div>
            </div>
            <!-- ############################# Calendar ...  #####################################################-->
            <div id="tabcalendar" class="tab-pane fade in active">
                <center><h2>ตารางปฏิทิน</h2></center>
                <br>

                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th>
                            <h4><a style="color: #0f7864">
                                </a>รหัส

                            </h4>
                        </th>
                        <th>
                            <h4><a style="color: #0f7864">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </a>ผู้จ้างงาน

                            </h4>
                        </th>
                        <th>
                            <h4><a style="color: #0f7864">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                </a>ช่างภาพ

                            </h4>
                        </th>
                        <th>
                            <h4><a style="color: #0f7864">
                                    <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                                </a>วันที่

                            </h4>
                        </th>
                        <th>
                            <h4><a style="color: #0f7864">
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                </a>สถานะ

                            </h4>
                        </th>
                        <th>
                            <h4><a style="color: #0f7864">
                                    <span class="glyphicon glyphicon-remove btn-xl" aria-hidden="true"></span>
                                </a>ลบ

                            </h4>
                        </th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requests as $reque)
                        @if($reque->checkreques == 3)
                            <tr>
                                <td>
                                    <strong>
                                        #RQ0{{$reque->id}}
                                    </strong>
                                </td>

                                <td>
                                    <strong>
                                        {{$reque->name_facebook}}
                                    </strong>

                                </td>

                                <td>
                                    <strong>
                                        {{$reque->name_user}}
                                    </strong>
                                </td>

                                <td>
                                    <strong><input type="date" min="<?php echo date("Y-m-d");?>" name="start"
                                                   value="{{$reque->start}}" readonly><br/>
                                    </strong>
                                </td>

                                <td>
                                    <span style="color: #3D7700"><h4>ตอบรับ</h4></span>

                                </td>
                                <td>
                                    <form action="/adminDestroyCalendar/{{$reque->id}}/" method="post">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="user_id" value="{{$reque->user_id}}">
                                        <button class="glyphicon glyphicon-remove btn btn-danger" type="submit"  onclick="return confirmEdit();"> ลบ
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- ##############################  Comment ... #######################################################-->

            <div class="tab-pane fade" id="tabcomment">

                <center><h2>ผลการประเมิณ</h2></center>
                <br/>



                    <span id="optinforms-form5-name-field" name="FNAME"
                          style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#002D31">


                                <table class="col-md-12 table">
                                    <thead>
                                    <tr>
                                        <th>
                                            <h4>
                                                <center><a style="color: #0f7864">
                                                        <span class="glyphicon glyphicon-user"
                                                              aria-hidden="true"></span>
                                                    </a>รายชื่อช่างภาพ
                                                </center>
                                            </h4>
                                        </th>
                                        <th>
                                            <h4>
                                                <center><a style="color: #0f7864">
                                                        <span class="glyphicon glyphicon-check"
                                                              aria-hidden="true"></span>
                                                    </a>รายละเอียด
                                                </center>
                                            </h4>
                                        </th>
                                        <th>
                                            <h4>
                                                <center><a style="color: #0f7864">
                                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                    </a>สถานะ
                                                </center>
                                            </h4>
                                        </th>
                                        <th>
                                            <h4>
                                                <center><a style="color: #0f7864">
                                                        <span class="glyphicon glyphicon-calendar"
                                                              aria-hidden="true"></span>
                                                    </a>วันที่ประเมิน
                                                </center>
                                            </h4>
                                        </th>


                                    </tr>
                                    </thead>


                                    @foreach($comment as $comment )
                                        <tr>

                                            {!! csrf_field() !!}

                                            <td>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <p data-toggle="collapse">
                                                                {{$comment->name_facebook}}
                                                            </p>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="panel-group">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <p data-toggle="collapse"
                                                                   href="#{{$comment->id}}">{{$comment->detail}}<span
                                                                            style="float: right"
                                                                            @if(!$comment->replycomment == null)
                                                                            class="label label-warning">ตอบกลับ
                                                                        @endif</span>
                                                                </p>
                                                            </h4>
                                                        </div>
                                                        <div id="{{$comment->id}}" class="panel-collapse collapse">
                                                            <div class="panel-body">{{$comment->replycomment}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <center> @if( $comment->like == 1 )<img
                                                            src="assets/img/portfolio/like.jpg"
                                                            width="50" height="50" alt="">
                                                    @else <img src="assets/img/portfolio/unlike.jpg" width="50"
                                                               height="50"
                                                               alt="">
                                                    @endif
                                                </center>
                                            </td>
                                            <td>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <p data-toggle="collapse">
                                                                {{$comment->created_at}}
                                                            </p>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <form action="adminUpdateComment/{{$comment->id}}" method="post">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="user_id" value="{{$comment->user_id}}">
                                                    <input type="text" class="form-control"
                                                           name="detail"
                                                           value="{{$comment->detail}}">
                                                    <button style="float: right" type="submit"  onclick="return confirmEdit();">บันทึก</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                    </span>
            </div>

        </div>
    </div>
</section>


</body>
</html>

