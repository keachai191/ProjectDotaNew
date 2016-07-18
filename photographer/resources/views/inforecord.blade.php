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
            margin-bottom: 0px;
            background: #FFFFFF;
        }

        section.theme {
            margin-top: -450px;
            margin-bottom: -100px;
            padding-top: 0px;
            height: 100%;
            min-height: 100%;
            background: url("/assets/img/background/bg.jpg") center center;
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
            <a href="/"><img src="/assets/img/portfolio/Logo3.png" width="400" height="70"></a>
        </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">

            <br>
            <li> @if(!session()->get('FacebookName'))
                    <a href="facebooklogin">
                        <div><img src="/assets/img/portfolio/login_Facebook.jpg" width="200" height="40">
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
                                <li><a href="faq">FAQ:คำตอบที่พบบ่อย</a></li>
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
        <a href="/viewreques" style="text-align: left" class="btn btn-warning" type="submit">ย้อนกลับ</a>

        @foreach($info as $infos)
            @foreach($profile as $profiles)
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p style="display: inline"><big>รหัสแบบฟอร์มบันทึก :</big> <strong
                                        style="color: #c87f0a">#RQ0{{$infos->id}}</strong> </p><br/>


                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <p style="display: inline"><big>ช่างภาพ :</big><strong
                                                style="color: #0e6f5c">{{$infos->name_user}}</strong>  </p><br/>

                                    <p style="display: inline"><big></big>
                                    <center><img
                                                src="/assets/img/portfolio/{{$profiles->image}}" width="150"
                                                height="150"
                                                alt=""></center>
                                    </p><br/>


                                    <p style="display: inline"><big>เบอร์โทรศัพท์ :</big> <strong
                                                style="color: #0e6f5c">{{$profiles->phonenumber}}</strong></p>
                                    <br/>

                                    <p style="display: inline"><big>สามารถติดต่อได้ :</big><strong
                                                style="color: #0e6f5c">{{$profiles->website}}</strong></p>
                                    <br/>

                                    <p style="display: inline"><big>ที่อยู่ :</big><strong
                                                style="color: #0e6f5c">{{$profiles->addres}}</strong></p><br/>

                                    <p style="display: inline"><big>ราคา :</big><strong
                                                style="color: #0e6f5c">เต็มวัน {{$profiles->fullprice}}
                                            ครึ่งวัน {{$profiles->halfprice}}</strong></p><br/><br/>

                                </div>
                                <div class="col-md-6">

                                    <p style="display: inline"><big>ผู้จ้าง :</big><strong
                                                style="color: #0e6f5c">{{$infos->name_facebook}}</strong>  </p><br/><br/>

                                    <p style="display: inline"><big>สถานะ :</big>
                                        @if($infos->checkreques == 1 )
                                            <strong style="color: #0066bb">รอคำตอบ</strong>
                                        @endif
                                        @if($infos->checkreques == 0)
                                            <strong style="color: #C20000">ถูกปฏิเสธ</strong>

                                        @endif
                                        @if($infos->checkreques == 3)
                                            <strong style="color: #3D7700">ตอบรับ</strong>
                                        @endif
                                        <br/><br/></p>

                                    <p style="display: inline"><big>วันที่ :</big><input type="datetime"
                                                                                         style=" border: 2px solid #3498db"
                                                                                         min="<?php echo date("Y-m-d");?>"
                                                                                         value="{{$infos->start}}"
                                                                                         readonly>
                                        <big>ช่วง
                                            :</big> @if(!$infos->morning==null  and  !$infos->afternoon==null and  !$infos->evening==null)
                                            <input type="text"
                                                   style=" border: 2px solid #3498db"
                                                   value="เต็มวัน"
                                                   readonly>
                                        @else   <input type="text"
                                                       style=" border: 2px solid #3498db"
                                                       value=" {{$infos->morning}} {{$infos->afternoon}} {{$infos->evening }}"
                                                       readonly> @endif

                                    </p>
                                    <br/><br/>

                                    <p style="display: inline"><big>รายละเอียดงาน :</big><textarea
                                                style=" border: 2px solid #3498db"
                                                class="form-control" name="detail_request"
                                                rows="3"
                                                cols="40"
                                                readonly>{{$infos->detail_request}}</textarea></p>
                                    <br/>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach

    </div>
    <br/><br/><br/>


</section>


<!-- jQuery -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-off-canvas-nav.js"></script>


</body>

</html>
