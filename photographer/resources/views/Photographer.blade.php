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
                defaultDate: '2016-07-12',
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
    <div class="container">
        <a href="/messagebox" type="button" class=" btn btn-danger btn-sm pull-right">
            กล่องข้อความ <span class="badge">{{count($requests)}}</span>
        </a><br/><br/>

        @if(Auth::user()->phonenumber == null or Auth::user()->halfprice==null or Auth::user()->fullprice==null
        or Auth::user()->website == null or Auth::user()->addres == null or Auth::user()->image == null )

        <div class="bg-danger"><h4><big>เนื่องจากคุณยังไม่ได้กรอกข้อมูลประวัติส่วนตัวให้ครบ</big></h4>
            <p>ระบบค้นหาจึงไม่สามารถค้นหารายชื่อคุณพบ</p></div>
        @endif

        @if(!empty (session()->get('checksuccess')))

            <div class="alert alert-success">
                <center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <strong>เรียบร้อย!</strong>
                    คุณได้ตอบรับคำขอของคุณ {{session()->get('checkname')}} เรียบร้อยแล้ว <br/>

                </center>
            </div>
            <?php
            session()->forget('checksuccess');
            session()->forget('checkname');
            ?>
        @endif
        @if(!empty (session()->get('checkdelete')))

            <div class="alert alert-success">
                <center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <strong>เรียบร้อย!</strong>
                    คุณได้ปฏิเสธคำขอของคุณ {{session()->get('checkname')}} เรียบร้อยแล้ว <br/>

                </center>
            </div>

            <?php
            session()->forget('checkdelete');
            session()->forget('checkname');
            ?>

        @endif

        <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#tabprofile">ข้อมูลส่วนตัว</a></li>
            <li><a data-toggle="tab" href="#tabalbum">อัลบั้มช่างภาพ</a></li>
            <li class="active"><a data-toggle="tab" href="#tabcalendar">ปฏิทินช่างภาพ</a></li>
            <li><a data-toggle="tab" href="#tabcomment">การประเมิน</a></li>
        </ul>

        <!-- ############################# Profile ...  #####################################################-->
        <div class="tab-content">
            <div id="tabprofile" class="tab-pane"><br/>

                <div class="modal-content col-md-12">
                    <div class="modal-header">
                        <a href="edit" id="btnedit" type="button" class="btn btn-default btn-lg">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไขข้อมูล
                        </a>
                    </div>
                    <div class="modal-body">
                        <div class="row col-md-4">
                            <center><img src="assets/img/portfolio/{{Auth::user()->image}}" width="200" height="200"
                                         alt="">
                            </center>
                        </div>


                        <div class="row col-md-8">
                            <div class="panel">
                                <div class="panel-body">
                                    <strong>
                                        <div class="col-md-3">
                                            <center><img align="left" src="assets/img/icon/user-38.png" width="30"
                                                         height="30"
                                                         alt=""></center>
                                            ชื่อติดต่อ
                                        </div>

                                        <p>{{Auth::user()->name}}</p><br><br/>


                                        <div class="col-md-3">
                                            <img align="left" src="assets/img/icon/placeholder.png" width="30"
                                                 height="30"
                                                 alt="">
                                            ที่อยู่
                                        </div>

                                        <p>{{Auth::user()->addres}}</p>
                                        <br><br/>


                                        <div class="col-md-3">
                                            <img align="left" src="assets/img/icon/browser.png" width="30" height="30"
                                                 alt="">
                                            ติดต่อได้ที่
                                        </div>
                                        <p>{{Auth::user()->website}}</p><br><br/>


                                        <div class="col-md-3">
                                            <img align="left" src="assets/img/icon/email.png" width="30" height="30"
                                                 alt="">
                                            อีเมล์
                                        </div>

                                        <p>{{Auth::user()->email}}</p><br><br/>


                                        <div class="col-md-3">
                                            <img align="left" src="assets/img/icon/smartphone.png" width="30"
                                                 height="30"
                                                 alt="">
                                            เบอร์โทรศัพท์
                                        </div>

                                        <p> {{Auth::user()->phonenumber}}</p><br><br/>

                                        <div class="col-md-3">
                                            <img align="left" src="assets/img/icon/price-tag.png" width="30" height="30"
                                                 alt="">
                                            ราคา
                                        </div>

                                        ครึ่งวัน : {{Auth::user()->halfprice}}
                                        เต็มวัน : {{Auth::user()->fullprice}} <br/><br/><br/>
                                    </strong>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <!-- ############################# Album ...  #####################################################-->
            <div id="tabalbum" class="tab-pane fade"><br/>

                <div class="modal-content col-md-12"><br/>

                    <a href="Album{{Auth::user()->id}}" id="btnedit" type="button"
                       class="btn btn-default btn-lg">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไขอัลบั้มภาพ
                    </a>

                    <br/>


                    <div class="modal-body">
                        @if(Auth::check())

                            <form action="Album" method="get" enctype="multipart/form-data">

                                {!! csrf_field() !!}

                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                <table class="col-md-12 table">
                                    <tr>
                                        <th class="col-md-3">
                                            <h4>
                                                <center>
                                                    <div style="color: #0f7864">
                                                        <span class="glyphicon glyphicon-th-large"
                                                              aria-hidden="true"></span>
                                                    </div>
                                                    ประเภทอัลบั้ม
                                                </center>
                                            </h4>
                                        </th>
                                        <th class="col-md-3">
                                            <h4>
                                                <center>
                                                    <div style="color: #0f7864">
                                                    <span class="glyphicon glyphicon-globe"
                                                          aria-hidden="true"></span>
                                                    </div>
                                                    ที่อยู่อัลบั้ม
                                                </center>
                                            </h4>
                                        </th>
                                        <th class="col-md-3">
                                            <h4>
                                                <center>
                                                    <div style="color: #0f7864">
                                                    <span class="glyphicon glyphicon-check"
                                                          aria-hidden="true"></span>
                                                    </div>
                                                    รายละเอียด
                                                </center>
                                            </h4>
                                        </th>
                                    </tr>


                                    @foreach($albums as $album )
                                        <tr>
                                            <form action="Album/{{$album->id}}/" method="post">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="_method" value="PATCH"/>
                                                <td>
                                                    <a><input class="form-control" type="text" name="type_al"
                                                              value="{{$album->type_al}}"
                                                              style="background: #FFFFFF"
                                                              readonly/></a>

                                                </td>

                                                <td>
                                                    <a style="color: #2ca02c" href="#"
                                                       onClick="window.open('{{$album->url_al}}',''); return false;">
                                                        <strong><input class="form-control" type="text"
                                                                       name="url_al"
                                                                       size="30"
                                                                       value="{{$album->url_al}}"
                                                                       readonly/></strong>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a><input class="form-control" type="text" name="url_al" size="35"
                                                              value="{{$album->detail_al}}"
                                                              readonly/></a>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </table>
                            </form>
                        @endif
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>.
                    </div>
                </div>

            </div>

            <!-- ############################# Calendar ...  #####################################################-->
            <div id="tabcalendar" class="tab-pane fade in active"><br/>

                <div class="modal-content col-md-12">
                    <div class="modal-header">
                        <a href="Calendar" id="btnedit" type="button" class="btn btn-default btn-lg">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไขตาราเวลา
                        </a>
                    </div>
                    <br/>

                    <div class="modal-body">

                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
            <!-- ############################# Comment ...  #####################################################-->
            <div id="tabcomment" class="tab-pane fade"><br/>

                <div class="modal-content col-md-12">
                    <div class="modal-header">
                        <a href="/replycomment" id="btnedit" type="button"
                           class="btn btn-default btn-lg">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> ตอบกลับการประเมิน
                        </a>

                        <center><h4>รวมผลการประเมิน</h4>
                            <img src="assets/img/portfolio/like2.png"
                                 width="50" height="50" alt=""><span
                                    class="badge">ชอบ    {{count($like)}}</span>

                            <img src="assets/img/portfolio/unlike2.png"
                                 width="50" height="50" alt="">
                            <span class="badge">ไม่ชอบ  {{count($unlike)}}</span>
                        </center>

                    </div>



                    <div class="modal-body">

                        <table class="col-md-12 table">
                            <thead>
                            <tr>
                                <th>
                                    <h4>
                                        <center><a style="color: #0f7864">
                                                        <span class="glyphicon glyphicon-calendar"
                                                              aria-hidden="true"></span>
                                            </a>วันที่ประเมิน
                                        </center>
                                    </h4>
                                </th>
                                <th>
                                    <h4>
                                        <center><a style="color: #0f7864">
                                                        <span class="glyphicon glyphicon-user"
                                                              aria-hidden="true"></span>
                                            </a>ผู้ประเมิน
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

                            </tr>
                            </thead>

                            <tr>
                            @foreach($comments as $comment )
                                <tr>
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
                                                                    class="label label-warning">คลิกดูข้อความตอบกลับ
                                                                        </span>
                                                        </p>
                                                    </h4>
                                                </div>
                                                <div id="{{$comment->id}}" class="panel-collapse collapse">
                                                    @if($comment->replycomment == null)
                                                        <div class="panel panel-danger">
                                                            <div class="panel-heading">
                                                                <h5> <span class="glyphicon glyphicon-remove-sign"
                                                                           aria-hidden="true"></span>
                                                                    ยังไม่มีข้อความตอบกลับ</h5></div>
                                                        </div>

                                                    @elseif(!$comment->replycomment == null)
                                                        <div class="panel panel-success">
                                                            <div class="panel-heading">
                                                                <h5><span class="glyphicon glyphicon-ok-sign"
                                                                          aria-hidden="true"></span> {{$comment->replycomment}}
                                                                </h5></div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><center>
                                        @if( $comment->like == 1 )<img src="assets/img/portfolio/like2.png"
                                                                       width="50" height="50" alt="">
                                        @else <img src="assets/img/portfolio/unlike2.png" width="50" height="50"
                                                   alt="">
                                        @endif </center>
                                    </td>


                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


</body>
</html>

