<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project DOTA</title>
    <link rel="icon" href="assets/img/icon/favicon.ico"/>
    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/freelancer.css" rel="stylesheet">

    <!--test-->
    <link href="assets/nou/nouislider.min.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: rgba(204, 204, 204, 0);
        }

        section.theme {
            margin-top: -600px;
            margin-bottom: -100px;
            padding-top: 0px;
            height: 100%;
            min-height: 100%;
            background: url("assets/img/background/bg.jpg") center center;
            -moz-background-size: cover;
            -webkit-background-size: cover;
        }

        html, body {
            width: 100%;
            height: 100%;
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

<body id="page-top" class="index">

<!-- Navigation -->
<!-- Navigation -->
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

            <a href="../"><img src="assets/img/portfolio/Logo3.png" width="400" height="70"></a>
        </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">


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
<br/><br/><br/>

<section class="theme">
</section>


<section class="intro">
    <div class="container">
        <div class="class row">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">

                        <img align="right" src="assets/img/icon/closed-envelope.png" width="60" height="60"
                             alt="">
                        <center><img src="assets\img\background\3.png" width="550" height="210"></center>
                        <h4 class="modal-title">แบบฟอร์มขอจ้างงาน </h4><br/>
                        วันที่ :<?php echo date("d-m-Y");?>

                        @if(!empty (session()->get('checkday')))

                            <div class="alert alert-danger">
                                <center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <strong>ข้อผิดพลาด!</strong>
                                    เนื่องจากวันที่ {{session()->get('time')}}
                                    ช่วงเวลาดังกล่าว
                                    <br/>
                                    คุณ {{session()->get('UserName')}} ได้ตอบรับงานผู้อื่นแล้ว

                                </center>
                            </div>


                            <?php
                            session()->forget('checkday');
                            session()->forget('time');
                            session()->forget('morn');
                            session()->forget('after');
                            session()->forget('even');
                            ?>

                        @endif

                        @if(!empty (session()->get('checkindex')))

                            <div class="alert alert-success">
                                <center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <strong>เรียบร้อย!</strong>
                                    คุณได้ส่งคำขอเรียบร้อยแล้ว
                                </center>
                            </div>


                            <?php
                            session()->forget('checkindex')
                            ?>

                        @endif

                    </div>


                    <div class="modal-body">


                        @if(session()->get('data')== null)
                            <center><h3>คำขอได้ถูกดำเนินการหมดแล้ว</h3><br/><br/>
                                <a href="viewreques" type="button" class="btn btn-primary" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                                    ดูประวัติคำร้องขอ
                                </a></center>

                        @elseif(!session()->get('data')== null)
                            @foreach(session()->get('data') as $index => $data  )


                                <form action="MutiRequestStore" method="post" enctype="multipart/form-data">

                                    {!! csrf_field() !!}

                                    <div class="panel-group" id="accordion" role="tablist"
                                         aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="head">
                                                <h6 class="panel-title">


                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                       data-parent="#accordion" href="#{{$index}}"
                                                       aria-expanded="false"
                                                       aria-controls="collapseTwo">

                                                        <h5>
                                                            @if($data== null)
                                                                <br/>
                                                                {{$index+1}}. คุณไม่ได้กำหนดวันที่
                                                            @else()

                                                                <h5>{{$index+1}}. วันที่ {{$data}} <span
                                                                            class="glyphicon glyphicon-zoom-in"
                                                                            aria-hidden="true"></span></h5>
                                                            @endif
                                                        </h5>
                                                    </a>
                                                </h6>
                                            </div>

                                            <div id="{{$index}}" class="panel-collapse collapse" role="tabpanel"
                                                 aria-labelledby="head">
                                                <div class="panel-body">


                                                    <div class="col-md-4 col-md-offset-1">
                                                        <h4>ผู้ส่ง</h4><br/>

                                                        <div><img src="{{session()->get('FacebookAvatar')}}"></div>
                                                        <br/>
                                                        <label>คุณ {{session()->get('FacebookName')}}</label><br/>

                                                        <input type="hidden" name="index" value="{{$index}}">
                                                        <input type="hidden" name="url" value="/seeinfo">
                                                        <input type="hidden" name="checkreques" value="1">
                                                        <input type="hidden" name="checkview" value="1">
                                                        <input type="hidden" name="title"
                                                               value={{session()->get('FacebookName')}}>
                                                        <input type="hidden" name="name_facebook"
                                                               value="{{session()->get('FacebookName')}}">
                                                        <input type="hidden" name="avatar"
                                                               value="{{session()->get('FacebookAvatar')}}">

                                                    </div>

                                                    <div><label>ถึงช่างภาพ
                                                            : {{session()->get('UserName')}}</label><br/>


                                                        <label>รหัสสมาชิก :
                                                            #P0{{session()->get('UserPrimary')}}</label>
                                                    </div>

                                                    @if($data== null)
                                                        <label style="align-content: inherit">วันที่ :
                                                            <input type="date" style=" border: 2px solid #3498db"
                                                                   min="<?php echo date("Y-m-d");?>"
                                                                   name="start" value="" required> </label>

                                                    @else()
                                                        <label style="align-content: inherit">วันที่ :
                                                            <input type="date" style=" border: 2px solid #3498db"
                                                                   min="<?php echo date("Y-m-d");?>"
                                                                   name="start" value="{{$data}}" readonly></label>

                                                    @endif


                                                    <div style="align-content: inherit">
                                                        <label> ช่วงเวลา :
                                                            @if(session()->get('helf')[$index] == 2)
                                                                <input
                                                                        type="checkbox"
                                                                        checked disabled>
                                                                เต็มวัน
                                                                <input name="morning" type="hidden" value="ช่วงเช้า">
                                                                <input name="afternoon" type="hidden" value="ช่วงบ่าย">
                                                                <input name="evening" type="hidden" value="ช่วงเย็น">

                                                            @elseif(session()->get('helf1')[$index] == "0")
                                                                <label>
                                                                    <select name="verify" id="prov2">
                                                                        <option value="ช่วงเช้า" selected="selected">
                                                                            ช่วงเช้า
                                                                        </option>
                                                                        <option value="ช่วงบ่าย">ช่วงบ่าย</option>
                                                                        <option value="ช่วงเย็น">ช่วงเย็น</option>
                                                                        <option value="เต็มวัน">เต็มวัน</option>
                                                                    </select>
                                                                </label>

                                                            @elseif(session()->get('helf1')[$index] == "morning"
                                                            or session()->get('helf1')[$index] == "afternoon"
                                                            or session()->get('helf1')[$index] == "evening")



                                                                @if( session()->get('helf1')[$index] == 'morning')<input
                                                                        type="checkbox"
                                                                        checked
                                                                        disabled>
                                                                ช่วงเช้า
                                                                <input name="morning" type="hidden" value="ช่วงเช้า">


                                                                @elseif( session()->get('helf1')[$index] == 'afternoon')
                                                                    <input
                                                                            type="checkbox"
                                                                            checked disabled>
                                                                    ช่วงบ่าย
                                                                    <input name="afternoon" type="hidden"
                                                                           value="ช่วงบ่าย">

                                                                @elseif( session()->get('helf1')[$index] == 'evening')
                                                                    <input
                                                                            type="checkbox"
                                                                            checked disabled>
                                                                    ช่วงเย็น
                                                                    <input name="evening" type="hidden"
                                                                           value="ช่วงเย็น">



                                                                @endif
                                                            @endif

                                                        </label>
                                                        <br/>

                                                        <label>รายละเอียด </label><br/>

                                                        <div class="col-md-5 col-md-offset5"><textarea
                                                                    style=" border: 2px solid #3498db"
                                                                    class="form-control" name="detail_request"
                                                                    rows="3"
                                                                    cols="40"
                                                                    placeholder="(สถานที่ถ่ายภาพ หรือ เบอร์โทรศัพท์ที่สามารถติดต่อกลับได้)"
                                                                    required></textarea></div>


                                                    </div>
                                                    <br/><br/><br/><br/><br/><br/>

                                                    <div class="modal-footer">
                                                        <button style="background-color: #5bc0de" type="submit"
                                                                class="btn btn-default" data-dismiss="modal"
                                                                onclick="return confirmsend();">ส่งคำขอ
                                                        </button>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        @endif
                        <script>
                            function confirmsend() {

                                var x = confirm
                                (" <?php echo  "คุณต้องการส่งคำร้องขอใช่หรือไม่! " ?> ")
                                if (x)
                                    return true;
                                else {
                                    return false;
                                }
                            }
                        </script>

                    </div>


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
