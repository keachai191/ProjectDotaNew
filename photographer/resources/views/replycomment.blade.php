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
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

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
            padding-bottom: 200px;
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
    <div class="container">
        <a href="home" style="text-align: left" class="btn btn-warning" type="submit">ย้อนกลับ</a>

        <br/><br/>
        <center><h2>ตอบกลับการประเมิน</h2></center>


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
                        <br/>
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
                        <br/>
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
                            @if($comment->replycomment == null)
                                <span class="glyphicon glyphicon-remove-sign"
                                      aria-hidden="true">  ยังไม่ได้ตอบกลับ</span>

                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">

                                            <p data-toggle="collapse" href="#{{$comment->id}}">

                                                {{$comment->detail}}

                                                <span style="float: right"
                                                      class="label label-warning">คลิกเพื่อตอบข้อความกลับ</span></p>

                                        </h4>
                                    </div>

                                    @elseif(!$comment->replycomment == null)
                                        <span class="glyphicon glyphicon-ok-sign"
                                              aria-hidden="true"> ตอบกลับแล้ว</span>
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <p data-toggle="collapse"
                                                       href="#{{$comment->id}}">

                                                        {{$comment->detail}}

                                                        <span style="float: right"
                                                              class="label label-warning">คลิกเพื่อตอบข้อความกลับ</span>
                                                    </p>

                                                    @endif
                                                </h4>
                                            </div>

                                            <div id="{{$comment->id}}" class="panel-collapse collapse">
                                                <form action="updatecomment/{{$comment->id}}" method="post">
                                                    {!! csrf_field() !!}
                                                    <input type="text" class="form-control"
                                                           name="replycomment"
                                                           value="{{$comment->replycomment}}">
                                                    <button style="float: right" type="submit"
                                                            onclick="return confirmEdit();">
                                                        บันทึก
                                                    </button>

                                                </form>
                                            </div>
                                        </div>
                                </div>
                    </td>
                    <td>
                        <br/>
                        <center>
                            @if( $comment->like == 1 )<img src="/assets/img/portfolio/like2.png"
                                                           width="50" height="50" alt="">
                            @else <img src="/assets/img/portfolio/unlike2.png" width="50" height="50"
                                       alt="">
                            @endif
                        </center>
                    </td>


                </tr>
            @endforeach
            <script>
                function confirmEdit() {

                    var x = confirm(" <?php echo  "คุณต้องการบันทึกข้อความตอบกลับ ใช่หรือไม่! " ?> ")
                    if (x)
                        return true;
                    else {
                        return false;
                    }
                }

            </script>

        </table>
    </div>


</section>


</body>
</html>

