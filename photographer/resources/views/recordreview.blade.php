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
    <!-- Boographertstrap core CSS -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <link href='assets/css/fullcalendar.css' rel='stylesheet'/>
    <link href='assets/css/bootstrap-off-canvas-nav.css' rel="stylesheet">

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

        th {
            background-color: #C0F9BD;
            color: black;
        }

        .alert {
            background-color: #99ee99;
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
        <div class="row">

            <div class="alert  alert-fixed-top">
                {{--<img class="pix" src="{{session()->get('FacebookAvatar')}}" width="130" height="130"><br/>--}}

                <img align="right" src="assets/img/portfolio/record.png" width="80" height="80" alt="">

                <h2>ประวัติการประเมิน</h2>

            </div>
            <br/>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>
                        <h4>
                            <center><a style="color: #0f7864">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </a>รายชื่อช่างภาพ
                            </center>
                        </h4>
                    </th>
                    <th>
                        <h4>
                            <center><a style="color: #0f7864">
                                    <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
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
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                </a>วันที่ประเมิน
                            </center>
                        </h4>
                    </th>
                    <th>
                        <h4>
                            <center><a style="color: #0f7864">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </a>แก้ไข
                            </center>
                        </h4>
                    </th>
                    <th>
                        <h4>
                            <center><a style="color: #0f7864">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </a>ลบ
                            </center>
                        </h4>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $reque)
                    <tr>
                        <form action="/editComment{{$reque->id}}" method="get">
                            {!! csrf_field() !!}
                            <td>
                                <center><a style="color: #2ca02c" href="#"
                                           onClick="window.open('ShowProfile{{$reque->name_user}}',''); return false;"
                                           title="Code PHP Popup">
                                        <strong>{{$reque->name_user}}</strong></a></center>
                            </td>


                            <td>

                                <strong>
                                    <center>
                                        <div class="panel-group">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">

                                                        <p data-toggle="collapse"
                                                           href="#{{$reque->id}}">{{$reque->detail}}<span
                                                                    style="float: right"
                                                                    @if(!$reque->replycomment == null)
                                                                    class="label label-warning">ตอบกลับ
                                                                @endif</span>
                                                        </p>

                                                </div>
                                                <div id="{{$reque->id}}" class="panel-collapse collapse">
                                                    <div class="panel-body">{{$reque->replycomment}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </center>
                                </strong>
                            </td>

                            <td>
                                <center>
                                    @if( $reque->like == 1 )<img src="/assets/img/portfolio/like2.png" width="50"
                                                                 height="50" alt="">
                                    @else <img src="/assets/img/portfolio/unlike2.png" width="50" height="50" alt="">
                                    @endif</center>
                            </td>

                            <td>
                                <center><strong>
                                        วันที่ : <input type="text" value="{{$reque->updated_at}}" readonly><br/>
                                    </strong></center>

                            </td>
                            <td>
                                <center>
                                    <button class="glyphicon glyphicon-pencil btn btn-success" type="submit"> แก้ไข
                                    </button>
                                </center>
                            </td>

                        </form>
                        <td>
                            <form action="/destroyComment/{{$reque->id}}/" method="post">
                                {!! csrf_field() !!}


                                <center>
                                    <button class="glyphicon glyphicon-remove btn btn-danger" type="submit"
                                            onclick="return confirmDel();"> ลบ
                                    </button>
                                </center>

                            </form>
                        </td>
                    </tr>


                @endforeach

                <script>
                    function confirmDel() {

                        var x = confirm
                        (" <?php echo  "คุณต้องการลบAlbum  ใช่หรือไม่! " ?> ")
                        if (x)
                            return true;
                        else {
                            return false;
                        }
                    }

                </script>
                <script>
                    function confirmEdit() {

                        var x = confirm
                        (" <?php echo  "คุณต้องแก้ไขAlbum ใช่หรือไม่! " ?> ")
                        if (x)
                            return true;
                        else {
                            return false;
                        }
                    }

                </script>
                </tbody>
            </table>
        </div>
        <br/><br/><br/>

    </div>


</section>


<!-- jQuery -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-off-canvas-nav.js"></script>


</body>

</html>
