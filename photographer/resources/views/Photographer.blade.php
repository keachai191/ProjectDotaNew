<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freelancer - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS  -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/freelancer.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <!-- nav nav-tabs -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!-- Calendar -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href='assets/css/fullcalendar.css' rel='stylesheet'/>
    <link href='assets/css/fullcalendar.print.css' rel='stylesheet' media='print'/>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
    <script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
    <script src='assets/js/fullcalendar.js'></script>

    <script>

        $(document).ready(function () {

            $('#calendar').fullCalendar({
                defaultDate: '2016-04-12',

                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: 'http://localhost:8000/CalendarsendHome',
                eventColor: '#008080'

            });

        });


    </script>

    <style>

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

        #stylealbum {
            max-width: 900px;
            margin: 0 auto;;
        }


    </style>
    <style>

        #calendar {
            max-width: 600px;
            margin: 0 auto;
        }

        #stylealbum {
            max-width: 900px;
            margin: 0 auto;;
        }

        #styleprofile {
            max-width: 900px;
            margin: 0 auto;

        }

        #input {

            background: #2daebf;
            text-align: center;
            font-family: Tahoma, Geneva, sans-serif;
            font-size: 15px;
            padding: 5px 10px 5px 10px;
            font-weight: bold;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            cursor: pointer;
            border-left: none;
            border-top: none;
            margin: 10px 0 10px 0;

        }

        input:hover {
            background: #49C4D4;

        }

        #styleprofile {
            max-width: 900px;
            margin: 0 auto;

        }

    </style>
</head>

<body id="page-top" class="index">

<!-- Navigation -->

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="/"><img src="assets/img/portfolio/Logo3.png" width="500" height="100"></a>


            <!--<a class="navbar-brand" href="#page-top">����ͻ���पѹ�Ѵ�Ҫ�ҧ�Ҿ</a>-->

        </div>

        @if(Auth::check())

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>คุณ {{Auth::user()->name}}</a></li>
                <li><a href="auth/logout"><span class="glyphicon glyphicon-log-in"></span> ออกจากระบบ </a></li>
            </ul>

            @endif

                    <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <!--<li class="page-scroll">
                        <a href="#portfolio">�Ѵ�ѹ�Ѻ��ҧ�Ҿ</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">��ҧ�Ҿ��к�</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<br/><br/><br/><br/>


<section id="contact">
    <div class="container">


        <!-- ############################# Reques ...  #####################################################-->

        <!-- Large modal -->

        <button type="button" class=" btn btn-danger btn-sm pull-right"
                data-toggle="modal" data-target="#myModal">
            กล่องข้อความ <span class="badge">{{count($requests)}}</span>
        </button>
        <br/><br/><br/>


        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> งานเข้าแว้วววววว!! </h4>
                    </div>
                    <div class="modal-body">
                        @foreach($requests as $reque)

                            <p> ข้อความจากคุณ {{$reque->name_facebook}} </p>

                            <h5> {{$reque->detail_request}}</h5>
                            {{$reque->start}} จนถึง  {{$reque->end}}
                            <br/>

                            <form action="/RequestUpdate/{{$reque->id}}/" method="post" enctype="multipart/form-data">

                                {!! csrf_field() !!}

                                <input type="hidden" name="checkreques" value="0">

                                <button style="font-size: 12px;" class="btn btn-success" name="checkview" type="submit"
                                        value="0" onclick="return confirmreques();"> ตอบรับงาน
                                </button>

                                <form action="/Requestdestroy/{{$reque->id}}/" method="post"
                                      enctype="multipart/form-data">
                                    {!! csrf_field() !!}

                                    <input type="hidden" name="id" value="{{$reque->id}}">
                                    <button style="font-size: 12px;" class="btn btn-danger" type="submit"
                                            onclick="return confirmDel();">
                                        ปฏิเสธคำขอ
                                    </button>

                                </form>
                            </form>

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
                            <script>
                                function confirmreques() {

                                    var x = confirm
                                    (" <?php echo  "คุณตอบรับงานตามคำร้องขอใช่หรือไม่! " ?> ")
                                    if (x)
                                        return true;
                                    else {
                                        return false;
                                    }
                                }
                            </script>
                            <br/>
                            <hr/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        <!-- ############################# Bar ...  #####################################################-->

        <ul class="nav nav-pills nav-justified">
            <li class="active"><a data-toggle="tab" href="#calendars"><h5>ตารางเวลาว่าง</h5></a>
            </li>
            <li><a data-toggle="tab" href="#profile"><h5>ข้อมูลส่วนตัว</h5></a>
            </li>
            <li><a data-toggle="tab" href="#album"><h5>อัลบั้มช่างภาพ</h5></a>
            </li>

        </ul>

        <div class="tab-content">

            <!-- ############################# Calendar ...  #####################################################-->
            <div id="calendars" class="tab-pane fade in active">

                <div id="input">ตารางปฏิทิน</div>
                <br>
                <a href="Calendar" class="btn btn-info " aria-label="Left Align">
                                <span class="glyphicon glyphicon-edit glyphicon-align-center"
                                      aria-hidden="true">เพิ่มและแก้ไขข้อมูลปฏิทิน</span>
                </a><br>

                <div id="calendar"></div>


            </div>

            <!-- ############################# Profile ...  #####################################################-->
            <div id="profile" class="tab-pane fade">
                <div class="tab-content">

                    <div id="input"> ข้อมูลช่างภาพ</div>
                    <br/>
                    <a href="edit" class="btn btn-info " aria-label="Left Align">
                                <span class="glyphicon glyphicon-edit glyphicon-align-center"
                                      aria-hidden="true">เพิ่มและแก้ไขข้อมูลช่างภาพ</span></a><br/>

                    <div class="col-md-6 col-md-offset-3">
                        <?php echo csrf_field(); ?>


                        <br/>

                        @if(Auth::check())
                            <center><img src="assets/img/portfolio/{{Auth::user()->image}}" width="200" height="200"
                                         alt=""></center><br/>

                            <div id="styleprofile">
                                <span id="optinforms-form5-name-field" name="FNAME"
                                      style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#002D31">

                                <span class="col-md-4 glyphicon glyphicon-user" aria-hidden="true"> ชื่อติดต่อ</span>
                                    {{Auth::user()->name}} <br><br>

                                <span id="optinforms-form5-name-field" name="FNAME"
                                      style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#0070a3"></span>

                                <span class="col-md-4 glyphicon glyphicon-home" aria-hidden="true"> ที่อยู่</span>
                                    {{Auth::user()->addres}}<br><br>

                                <span class="col-md-4 glyphicon glyphicon-globe"
                                      aria-hidden="true"> สามารถติดต่อได้ที่</span>
                                    {{Auth::user()->website}}<br><br>

                                <span class="col-md-4 glyphicon glyphicon-envelope" aria-hidden="true"> อีเมล์</span>
                                    {{Auth::user()->email}}<br><br>

                                <span class="col-md-4 glyphicon glyphicon-phone"
                                      aria-hidden="true"> เบอร์โทรศัพท์</span>
                                    {{Auth::user()->phonenumber}}<br><br>


                                <span class="col-md-4 glyphicon glyphicon-camera" aria-hidden="true"> ราคา</span>
                                ครึ่งวัน : {{Auth::user()->halfprice}}
                                    เต็มวัน : {{Auth::user()->fullprice}} <br/><br/>
                            </span>
                            </div>

                    </div>


                </div>
                @endif
            </div>

            <!-- ##############################  Album ... #######################################################-->
            <div class="tab-pane fade" id="album">

                <div id="input">อัลบั้มงาน</div>
                <br>
                <a href="Album{{Auth::user()->id}}" class="btn btn-info" aria-label="Left Align">
                                <span class="glyphicon glyphicon-edit glyphicon-align-center"
                                      aria-hidden="true">เพิ่มและแก้ไขข้อมูลอัลบั้ม</span> </a>
                <br>

                <div id="stylealbum">

                    @if(Auth::check())


                        <form action="Album" method="get" enctype="multipart/form-data">

                            {!! csrf_field() !!}

                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


                            <table class="col-md-12 table">
                                <tr>
                                    <th class="col-md-3"><h4> Album Type</h4></th>
                                    <th class="col-md-3"><h4> Photo Album</h4></th>
                                    <th class="col-md-3"><h4> Album Details</h4></th>
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

                </div>


                @endif

            </div>
        </div>
    </div>
</section>
</body>


</html>

