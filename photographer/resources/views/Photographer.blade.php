<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>photographer</title>

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
            margin-top: -500px;
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
            background: #EEEEEE;
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


<section class="theme">
</section>

<section class="box">
    <div class="container">
        <a href="/messagebox" type="button" class=" btn btn-danger btn-sm pull-right">
            กล่องข้อความ <span class="badge">{{count($requests)}}</span>
        </a>
    </div>
</section>


<section class="phofile">
    <div class="container">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tabprofile">ข้อมูลส่วนตัว</a></li>
            <li><a data-toggle="tab" href="#tabalbum">อัลบั้มช่างภาพ</a></li>
            <li><a data-toggle="tab" href="#tabcanlendar">ปฏิทินช่างภาพ</a></li>
        </ul>

        <!-- ############################# Profile ...  #####################################################-->
        <div class="tab-content">
            <div id="tabprofile" class="tab-pane fade in active">
                <center><h2>ข้อมูลส่วนตัว</h2></center>
                <br/>
                <a href="edit" id="btnedit" type="button" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไขข้อมูล
                </a><br><br>

                <div class="row col-md-4">
                    <div class="panel-body">
                        <center><img src="assets/img/portfolio/{{Auth::user()->image}}" width="240" height="240"
                                     alt="">
                        </center>
                    </div>
                </div>

                <div class="row col-md-8">
                    <div class="panel panel-info">
                        <div class="panel-body">

                            <div class="col-md-3">
                                <center><img align="left" src="assets/img/icon/user-38.png" width="30" height="30"
                                             alt=""></center>
                                ชื่อติดต่อ
                            </div>

                            <p>{{Auth::user()->name}}</p><br>


                            <div class="col-md-3">
                                <img align="left" src="assets/img/icon/placeholder.png" width="30" height="30"
                                     alt="">
                                ที่อยู่
                            </div>

                            <p>{{Auth::user()->addres}}</p>
                            <br>


                            <div class="col-md-3">
                                <img align="left" src="assets/img/icon/browser.png" width="30" height="30"
                                     alt="">
                                ติดต่อได้ที่
                            </div>
                            <p>{{Auth::user()->website}}</p><br>


                            <div class="col-md-3">
                                <img align="left" src="assets/img/icon/email.png" width="30" height="30"
                                     alt="">
                                อีเมล์
                            </div>

                            <p>{{Auth::user()->email}}</p><br>


                            <div class="col-md-3">
                                <img align="left" src="assets/img/icon/smartphone.png" width="30" height="30"
                                     alt="">
                                เบอร์โทรศัพท์
                            </div>

                            <p> 0{{Auth::user()->phonenumber}}</p><br>

                            <div class="col-md-3">
                                <img align="left" src="assets/img/icon/price-tag.png" width="30" height="30"
                                     alt="">
                                ราคา
                            </div>

                            ครึ่งวัน : {{Auth::user()->halfprice}}
                            เต็มวัน : {{Auth::user()->fullprice}} <br/><br/>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ############################# Album ...  #####################################################-->
            <div id="tabalbum" class="tab-pane fade">
                <center><h2>อัลบั้มรูปภาพ</h2></center>
                <br/>

                @if(Auth::check())

                    <a href="Album{{Auth::user()->id}}" id="btnedit" type="button" class="btn btn-default btn-lg">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไขอัลบั้มภาพ
                    </a><br><br>


                    <form action="Album" method="get" enctype="multipart/form-data">

                        {!! csrf_field() !!}

                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


                        <table class="col-md-12 table">
                            <tr>
                                <th class="col-md-3"><h4><img align="left" src="assets/img/icon/album.png" width="40"
                                                              height="40"
                                                              alt=""><br/> ประเภทอัลบั้ม</h4></th>
                                <th class="col-md-3"><h4><img align="left" src="assets/img/icon/picture.png" width="40"
                                                              height="40"
                                                              alt=""><br/> ที่อยู่อัลบั้ม</h4></th>
                                <th class="col-md-3"><h4><img align="left" src="assets/img/icon/photo-camera.png"
                                                              width="40"
                                                              height="40"
                                                              alt=""><br/> รายละเอียด</h4></th>
                            </tr>


                            @foreach($albums as $album )
                                <tr>
                                    <form action="Album/{{$album->id}}/" method="post">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="PATCH"/>
                                        <td>
                                            <input class="form-control" type="text" name="type_al"
                                                   value="{{$album->type_al}}"
                                                   style="background: #98EFFC"
                                                   readonly/>

                                        </td>

                                        <td>
                                            <input class="form-control" type="text" name="url_al" size="30"
                                                   value="{{$album->url_al}}"
                                                   readonly/>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="url_al" size="35"
                                                   value="{{$album->detail_al}}"
                                                   readonly/>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </table>
                    </form>
                @endif
            </div>

            <!-- ############################# Profile ...  #####################################################-->
            <div id="tabcanlendar" class="tab-pane fade">
                <center><h2>ตารางเวลา</h2></center>
                <br/>

                <a  href="Calendar" id="btnedit" type="button" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไขตาราเวลา
                </a>
                <br><br>

                <div id='calendar'></div>
            </div>
        </div>
    </div>

</section>


</body>
</html>

