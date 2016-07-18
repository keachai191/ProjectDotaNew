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

            $('#calendar').fullCalendar({
                defaultDate: '2016-07-12',

                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: 'http://localhost:8000/CalendarShowprofile',
                eventColor: '#008080'

            });

        });


    </script>
    <style>
        html, body {
            width: 100%;
            height: 100%;
        }

        section.intro {
            padding: 20px;
            padding-bottom: 150px;
            background: #FFFFFF;
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

        #calendar {
            max-width: 700px;
            margin: 0 auto;

        }

        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #18bc9c;
            color: white;
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
            <li> @if(!session()->get('FacebookName'))
                    <a href="facebooklogin">
                        <div><img src="assets/img/portfolio/login_Facebook.jpg" width="200" height="40">
                        </div>
                    </a>
                @endif

                @if(session()->get('FacebookName'))
                    <div>
                        <div class="btn-group" role="group">


                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                <img src="{{session()->get('FacebookAvatar')}}" width="30" height="30">
                                {{session()->get('FacebookName')}}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="viewreques">ประวัติคำขอร้อง</a></li>
                                <li><a href="viewcomment">ประวัติการประเมินช่างภาพ</a></li>
                                <li><a href="faq">FAQ : คำตอบที่พบบ่อย</a></li>
                                <li><a href="logoutfacebook">ออกจากระบบ</a></li>
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
<section class="intro">
    <div class="container">
        <div class="col-lg-12 text-center">
            @foreach($profiles as $profile)
                <ol class="breadcrumb">
                    <li><a href="/">หน้าหลัก</a></li>
                    <li><a href="search">ค้นหา</a></li>
                    <li>ช่างภาพ {{$profile->name}}</li>
                </ol>
            @endforeach


        </div>

        <!-- #############################  showrofile ... ########################################################-->


        <ul class="nav nav-pills nav-justified">
            @foreach($profiles as $profile)
                <br/>

                <center><a type="button" class="btn btn-info btn-xs" style="color: #FFFFFF" href="#"
                           onClick="window.open('sendreview{{$profile->name}}',''); return false;"
                           title="Code PHP Popup"><span class="glyphicon glyphicon-pencil"
                                                        aria-hidden="true"></span>ประเมิน</a></center><br>
            @endforeach


            <ul class="nav nav-tabs">
                <li><a data-toggle="tab" href="#tabprofile">ข้อมูลส่วนตัว</a></li>
                <li><a data-toggle="tab" href="#tabalbum">อัลบั้มช่างภาพ</a></li>
                <li class="active"><a data-toggle="tab" href="#tabcalendar">ปฏิทินช่างภาพ</a></li>
                <li><a data-toggle="tab" href="#tabcomment">ผลการประเมิน</a></li>
            </ul>


        </ul>

        <div class="tab-content">


            <!-- ############################# Profile ...  #####################################################-->
            <div id="tabprofile" class="tab-pane fade">
                <div class="tab-content">

                    <div class="row col-md-12">
                        <?php echo csrf_field(); ?>

                        <center><h2>ข้อมูลช่างภาพ</h2></center>
                        <br/>


                        @foreach($profiles as $profile)


                            <center><img src="assets/img/portfolio/{{$profile->image}}" width="200" height="200"
                                         alt=""><br/><br/></center>

                            <div class="row">

                                <div class="col-md-2 col-md-offset-3">
                                    <center><img align="left" src="assets/img/icon/user-38.png" width="30" height="30"
                                                 alt=""></center>
                                    :
                                    <strong> ชื่อติดต่อ</strong></div>
                                <div class="col-md-3"><strong>{{$profile->name}}</strong></div>

                                <br/><br/>

                                <div class="col-md-2 col-md-offset-3">
                                    <center><img align="left" src="assets/img/icon/placeholder.png" width="30"
                                                 height="30"
                                                 alt=""></center>
                                    :
                                    <strong> ที่อยู่ </strong></div>
                                <div class="col-md-3"><strong>{{$profile->addres}}</strong></div>
                                <br/><br/>

                                <div class="col-md-2 col-md-offset-3">
                                    <center><img align="left" src="assets/img/icon/browser.png" width="30" height="30"
                                                 alt=""></center>
                                    :
                                    <strong> เว็บไซน์ </strong></div>
                                <div class="col-md-3"><strong>{{$profile->website}}</strong></div>
                                <br/><br/>

                                <div class="col-md-2 col-md-offset-3">
                                    <center><img align="left" src="assets/img/icon/email.png" width="30" height="30"
                                                 alt=""></center>
                                    :
                                    <strong> อีเมล์</strong></div>
                                <div class="col-md-3"><strong>{{$profile->email}}</strong></div>
                                <br/><br/>

                                <div class="col-md-2 col-md-offset-3">
                                    <center><img align="left" src="assets/img/icon/smartphone.png" width="30"
                                                 height="30"
                                                 alt=""></center>
                                    :
                                    <strong> เบอร์โทรศัพท์</strong></div>
                                <div class="col-md-3"><strong>{{$profile->phonenumber}}</strong></div>
                                <br/><br/>

                                <div class="col-md-2 col-md-offset-3">
                                    <center><img align="left" src="assets/img/icon/price-tag.png" width="30" height="30"
                                                 alt=""></center>
                                    :
                                    <strong> ราคา</strong></div>
                                <div class="col-md-3"><strong>ครึ่งวัน : {{$profile->halfprice}} เต็มวัน
                                        : {{$profile->fullprice}}</strong></div>
                                <br/>


                            </div>




                        @endforeach

                    </div>
                </div>

            </div>

            <!-- ##############################  Album ... #######################################################-->

            <div class="tab-pane fade" id="tabalbum">

                <center><h2>อัลบั้มงาน</h2></center>
                <br/>


                <div id="stylealbum">
                    <span id="optinforms-form5-name-field" name="FNAME"
                          style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#002D31">


                                <table class="col-md-12 table">
                                    <tr>
                                        <th class="col-md-3">
                                            <h4>
                                                <center><a style="color: #0f7864">
                                                        <span class="glyphicon glyphicon-th-large"
                                                              aria-hidden="true"></span>
                                                    </a>ประเภทอัลบั้ม
                                                </center>
                                            </h4>
                                        </th>
                                        <th class="col-md-3">
                                            <h4>
                                                <center><a style="color: #0f7864">
                                                    <span class="glyphicon glyphicon-globe"
                                                          aria-hidden="true"></span>
                                                    </a>ที่อยู่อัลบั้ม
                                                </center>
                                            </h4>
                                        </th>
                                        <th class="col-md-3">
                                            <h4>
                                                <center><a style="color: #0f7864">
                                                    <span class="glyphicon glyphicon-check"
                                                          aria-hidden="true"></span>
                                                    </a>รายละเอียด
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

                <div id="calendar"></div>


            </div>

            <!-- ##############################  Comment ... #######################################################-->

            <div class="tab-pane fade" id="tabcomment">

                <center><h2>ผลการประเมิน</h2></center>
                <br/>

                <center>
                    <img src="assets/img/portfolio/like2.png"
                         width="50" height="50" alt=""><span
                            class="badge">ชอบ {{count($like)}}</span>

                    <img src="assets/img/portfolio/unlike2.png"
                         width="50" height="50" alt="">
                    <span class="badge">ไม่ชอบ {{count($unlike)}}</span>
                </center>


                <span id="optinforms-form5-name-field" name="FNAME"
                      style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#002D31">


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


                                    @foreach($comment as $comment )
                                        <tr>
                                            {!! csrf_field() !!}
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
                                            <td>
                                                <center> @if( $comment->like == 1 )<img
                                                            src="assets/img/portfolio/like2.png"
                                                            width="50" height="50" alt="">
                                                    @else <img src="assets/img/portfolio/unlike2.png" width="50"
                                                               height="50"
                                                               alt="">
                                                    @endif
                                                </center>
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

