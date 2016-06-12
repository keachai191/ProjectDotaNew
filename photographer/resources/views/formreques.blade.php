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
            margin-top: 20px;
            padding-bottom: 600px;
            height: 100%;
            min-height: 100%;
            background-color: #11866f;
            -moz-background-size: cover;
            -webkit-background-size: cover;
        }

        .navbar-inverse {
            padding: 0px;
        }

        .btn {
            text-align: center;

        }

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-bottom: 2px solid red;
        }


    </style>

</head>

<body class="off-canvas-nav-left" style="padding-top:30px;">

<!-- Static navbar -->
<nav class="navbar navbar-inverse  navbar-fixed-top">

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
            <a class="navbar-brand" href="#">photographer dota</a>
        </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li> @if(!session()->get('FacebookName'))
                    <a href="facebooklogin">
                        <div><img src="assets/img/portfolio/login_Facebook.jpg" width="200" height="40">
                            <img></div>
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


<section class="intro">
    <div class="container">
        <div class="class row">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="RequestStore" method="post" enctype="multipart/form-data">
                        <div class="modal-header">

                         <img align="right" src="assets/img/icon/closed-envelope.png" width="60" height="60"
                                 alt="">
                           <center> <img src="assets\img\background\3.png" width="550" height="210"></center>
                            <h4 class="modal-title">แบบฟอร์มขอจ้างงาน </h4><br/>
                            วันที่ :<?php echo date("d-m-Y");?>

                        </div>

                        {!! csrf_field() !!}

                        <div class="modal-body">


                            <div class="col-md-4 col-md-offset-1">
                                <h4>ผู้ส่ง</h4><br/>

                                <div><img src="{{session()->get('FacebookAvatar')}}"></div>
                                <br/>


                                <label>คุณ {{session()->get('FacebookName')}}</label><br/>

                            </div>


                            <input type="hidden" name="checkreques" value="1">
                            <input type="hidden" name="checkview" value="1">
                            <input type="hidden" name="title" value={{session()->get('FacebookName')}}>
                            <input type="hidden" name="name_facebook" value="{{session()->get('FacebookName')}}">
                            <input type="hidden" name="avatar" value="{{session()->get('FacebookAvatar')}}">

                            <h4>ถึงช่างภาพ {{session()->get('UserName')}}</h4><br/>

                            <label>วันที่ต้องการจ้างงาน
                                <input type="date" class="form-control" min="<?php echo date("Y-m-d");?>"
                                       name="start"
                                       value="{{session()->get('data')}}" readonly>
                            </label><br/><br/>

                            <strong>ช่วงเวลา</strong> :
                            <label class="checkbox-inline"><input name="morning" type="checkbox"
                                                                  value="ช่วงเช้า"
                                                                  checked>ช่วงเช้า</label>
                            <label class="checkbox-inline"><input name="afternoon" type="checkbox"
                                                                  value="ช่วงบ่าย">ช่วงบ่าย</label>
                            <label class="checkbox-inline"><input name="evening" type="checkbox"
                                                                  value="ช่วงเย็น">ช่วงเย็น</label><br/><br/>

                            <label>รายละเอียด <textarea class="form-control" name="detail_request" rows="3"
                                                        cols="40"
                                                        required></textarea></label>
                            <br/>


                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" data-dismiss="modal">ส่งคำขอ</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</section>


<!-- jQuery -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-off-canvas-nav.js"></script>

</body>

</html>
