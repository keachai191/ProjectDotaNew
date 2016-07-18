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
            <a href="../"><img src="assets/img/portfolio/Logo3.png" width="400" height="70"></a>
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

                <h2>รายงานบันทึกคำขอจ้างงาน</h2>


            </div>
            <br/>
            <table class="table table-hover">

                <thead>
                <tr>
                    <th>
                        <h4>
                            <center><a style="color: #0f7864">
                                </a>รหัส
                            </center>
                        </h4>
                    </th>
                    <th>
                        <h4>
                            <center><a style="color: #0f7864">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </a>ช่างภาพ
                            </center>
                        </h4>
                    </th>
                    <th>
                        <h4>
                            <center><a style="color: #0f7864">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                </a>วันที่ร้องขอ
                            </center>
                        </h4>
                    </th>
                    <th>
                        <h4>
                            <center><a style="color: #0f7864">
                                    <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                                </a>รายละเอียดงาน
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

                    </th>
                    <th>
                        <h4>
                            <center><a style="color: #0f7864">
                                    <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span>
                                </a>ข้อมูลคำร้อง
                            </center>
                        </h4>
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($requests as $reque)

                    <tr>

                        <td>
                            <center>
                                <strong>
                                    #RQ0{{$reque->id}}
                                </strong>
                            </center>
                        </td>

                        <td>
                            <center>
                            <center></center>
                            <a style="color: #2ca02c" href="#"
                               onClick="window.open('ShowProfile{{$reque->name_user}}',''); return false;">
                                <strong>
                                    {{$reque->name_user}}
                                </strong>
                            </a>
                            </center>
                        </td>


                        <td>
                            <center>
                                <center></center>
                                <strong><input type="date" min="<?php echo date("Y-m-d");?>" name="start"
                                               value="{{$reque->start}}" readonly><br/>
                                </strong>
                            </center>
                        </td>


                        <td>
                            <center>
                                <strong> {{$reque->detail_request}}</strong>
                            </center>
                        </td>

                        <td>
                            <center>
                                <!-- ############################################ กำลังรอคำตอบ ...  #################################-->
                                @if($reque->checkreques == 1 )
                                    <span style="color: #0066bb"><h4>รอคำตอบ</h4></span>

                                    <br/><br/>


                                    @endif
                                            <!-- ############################################ คำขอได้ถูกปฏิเสธ ...  #################################-->
                                    @if($reque->checkreques == 0)
                                        <span style="color: #C20000"><h4>ถูกปฏิเสธ</h4></span>

                                        <br/><br/>

                                        @endif

                                                <!-- ############################################ ตอบรับคำร้องขอ ...  #################################-->
                                        @if($reque->checkreques == 3)
                                            <span style="color: #3D7700"><h4>ตอบรับ</h4></span>

                                            <br/><br/>
                            @endif
                        </td>
                        </center>
                        <td>
                            <center>

                                @if($reque->checkreques == 1 )

                                    <form action="/Requestdestroy/{{$reque->id}}/" method="post"
                                          enctype="multipart/form-data">
                                        {!! csrf_field() !!}

                                        <input type="hidden" name="id" value="{{$reque->id}}">
                                        <button style="font-size: 12px;" class="btn btn-danger
                                        glyphicon glyphicon-remove btn-xl" type="submit"
                                                onclick="return confirmDel();">

                                        </button>

                                    </form>
                                @endif

                                @if($reque->checkreques == 0)

                                    <form action="/Requestdestroy/{{$reque->id}}/" method="post"
                                          enctype="multipart/form-data">
                                        {!! csrf_field() !!}

                                        <input type="hidden" name="id" value="{{$reque->id}}">
                                        <button style="font-size: 12px;" class="btn btn-danger
                                        glyphicon glyphicon-remove btn-xl" type="submit"
                                                onclick="return confirmDel();">

                                        </button>

                                    </form>
                            @endif

                            @if($reque->checkreques == 3)

                            @endif
                        </td>
                        </center>

                        <td>
                            <center>

                                <!-- ############################################ ดูข้อมูล ...  #################################-->
                                <div style="text-align: center">
                                    <form action="inforecord/{{$reque->id}}" method="post">
                                        {!! csrf_field() !!}
                                        <button style="font-size: 12px;" class="btn btn-info
                                       glyphicon glyphicon-zoom-in" type="submit">
                                        </button>
                                    </form>

                                </div>
                        </td>
                        </center>

                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
        <br/><br/><br/>


        <script>
            function confirmDel() {

                var x = confirm
                (" <?php echo  "คุณต้องการลบคำร้องขอใช่หรือไม่! " ?> ")
                if (x)
                    return true;
                else {
                    return false;
                }
            }
        </script>
    </div>


</section>


<!-- jQuery -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-off-canvas-nav.js"></script>


</body>

</html>
