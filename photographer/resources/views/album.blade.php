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
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

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
            margin-top: -450px;
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

<!-- Contact Section --> <!--facebook -->
<section class="theme"></section>
<section class="phofile">
    <div class="container"><br/><br/>
        <a href="home" style="text-align: left" class="btn btn-warning" type="submit">ย้อนกลับ</a><br/><br/><br/>

        <a class="w3-btn-floating-large  w3-red"
           data-toggle="modal" data-target="#myModal">
            + <span class="badge"></span>
        </a>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> เพิ่มอัลบัม!! </h4>
                    </div>
                    <div class="modal-body">

                        <center>
                            <h4>ประเภทของอัลบัม</h4>

                            <form action="Album" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}

                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                <label class="radio-inline">
                                    <input type="radio" name="type_al" id="inlineRadio1" value="รับปริญญา" checked>
                                    รับปริญญา
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type_al" id="inlineRadio2" value="ฟรีเวดดิ้ง"> ฟรีเวดดิ้ง
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type_al" id="inlineRadio3" value="งานแต่ง"> งานแต่ง
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type_al" id="inlineRadio3" value="อีเวนต์"> อีเวนต์
                                </label><br/>

                                <h4>ที่อยู่อัลบัม</h4>

                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input class="form-control" type="url" required
                                               size="30" name="url_al"></div>
                                </div>

                                <h4>รายละเอียดอัลบั้ม</h4>

                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                            <textarea class="form-control" type="text" value="" required name="detail_al" rows="5"
                                       cols="60">  </textarea>
                                    </div>
                                    <br/><br/><br/><br/><br/><br/><br/><br/>


                                    <!--<h4>ราคาจ้างงาน</h4>
                                    <span>ครึ่งวัน</span>
                                    <input type="name" size="10" name="halfprice" value="" required>
                                    <span>เต็มวัน</span>
                                    <input type="name" size="10" name="fullprice" value="" required><br><br>-->


                                    <center>
                                        <button class="btn btn-success" type="submit"  onclick="return confirmAlbum();">เพิ่มอัลบัม</button>
                                    </center>
                                    <script>
                                        function confirmAlbum() {

                                            var x = confirm(" <?php echo  "คุณต้องการเพิ้มAlbum ใช่หรือไม่! " ?> ")
                                            if (x)
                                                return true;
                                            else {
                                                return false;
                                            }
                                        }

                                    </script>

                                </div>
                                &nbsp; &nbsp; &nbsp;
                            </form>
                        </center>

                    </div>
                </div>
            </div>
        </div>

        <center><h2>แก้ไขอัลบั้มช่างภาพ</h2></center>
        @if(Auth::check())

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
                    <th class="col-md-1"><h4><br> แก้ไข</h4></th>
                    <th class="col-md-1"><h4><br> ลบ</h4></th>
                </tr>

                @foreach($albums as $album)
                    <tr>
                        <form action="/Albums/{{$album->id}}/" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <td>

                                <select class="form-control" style="background: #98EFFC" name="type_al">
                                    <option> {{$album->type_al}}</option>
                                    <option>ฟรีเวดดิ้ง</option>
                                    <option>งานแต่ง</option>
                                    <option>อีเวนต์</option>
                                    <option>รับปริญญา</option>
                                </select>
                            </td>
                            <td>
                                <input class="form-control" style="background: #fbf9ee" type="text" name="url_al"
                                       size="30"
                                       value="{{$album->url_al}}" required/>
                            </td>
                            <td>
                                <input class="form-control" style="background: #fbf9ee" type="text" name="detail_al"
                                       size="30"
                                       value="{{$album->detail_al}}" required/>
                            </td>
                            <!--<td>
                                ครึ่งวัน : <input type="text" name="halfprice" size="7" value="{{$album->halfprice}}"/>
                                เต็มวัน : <input type="text" name="fullprice" size="7" value="{{$album->fullprice}}"/>
                            </td>-->
                            <td>
                                <button class="glyphicon glyphicon-pencil btn btn-success" type="submit"
                                        onclick="return confirmEdit();"> แก้ไข
                                </button>
                            </td>
                        </form>


                        <td>
                            <form action="/AlbumsDestroy/{{$album->id}}/" method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                <button class="glyphicon glyphicon-remove btn btn-danger" type="submit"
                                        onclick="return confirmDel();"> ลบ
                                </button>

                            </form>
                        </td>


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

            </table>
        @endif
    </div>
</section>
</body>
</html>
