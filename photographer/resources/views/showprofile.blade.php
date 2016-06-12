<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project DOTA</title>

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
                defaultDate: '2016-05-12',

                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: 'http://localhost:8000/CalendarShowprofile',
                eventColor: '#008080'

            });

        });

    </script>
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
            font-size: 25px;
            padding: 5px 10px 5px 10px;
            color: #fff;
            font-weight: bold;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
            -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
            text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
            border-bottom: 1px solid rgba(0, 0, 0, 0.25);
            cursor: pointer;
            border-left: none;
            border-top: none;
            margin: 10px 0 10px 0;

        }

        input:hover {
            background: #49C4D4;

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
        <div class="col-lg-12 text-center">
            <ol class="breadcrumb">
                <li><a href="/">หน้าหลัก</a></li>
                <li><a href="search">ค้นหา</a></li>
            </ol>


        </div>

        <!-- #############################  showrofile ... ########################################################-->


        <ul class="nav nav-pills nav-justified">
            @foreach($profiles as $profile)
                <center><h3> ช่างภาพ {{$profile->name}}</h3></center><br/>


                <center><a type="button" class="btn btn-info btn-xs" style="color: #FFFFFF" href="#"
                onClick="window.open('sendreview{{$profile->name}}',''); return false;"
                title="Code PHP Popup"><span class="glyphicon glyphicon-pencil"
                                             aria-hidden="true"></span>ประเมิณ</a></center><br>
            @endforeach




            <li class="active"><a data-toggle="tab" href="#calendars"><h4>ตารางเวลาว่าง</h4></a>
            </li>
            <li><a data-toggle="tab" href="#profile"><h4>ข้อมูลส่วนตัว</h4></a>
            </li>
            <li><a data-toggle="tab" href="#album"><h4>อัลบั้มช่างภาพ</h4></a>
            </li>
            <li><a data-toggle="tab" href="#comment"><h4>ประเมิณช่างภาพ</h4></a>
            </li>


        </ul>

        <div class="tab-content">

            <!-- ############################# Calendar ...  #####################################################-->
            <div id="calendars" class="tab-pane fade in active">

                <div id="input">ตารางปฏิทิน</div>
                <br>

                <div id="calendar"></div>


            </div>

            <!-- ############################# Profile ...  #####################################################-->
            <div id="profile" class="tab-pane fade">
                <div class="tab-content">

                    <div class="col-md-12">
                        <?php echo csrf_field(); ?>

                        <div id="input"> ข้อมูลช่างภาพ</div>
                        <br/><br/>

                        @foreach($profiles as $profile)

                            <center><img src="assets/img/portfolio/{{$profile->image}}" width="200" height="200"
                                         alt=""></center>

                            <div id="styleprofile">
                                <span id="optinforms-form5-name-field" name="FNAME"
                                      style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#002D31">

                                <span class="col-md-3 glyphicon glyphicon-user" aria-hidden="true"> ชื่อติดต่อ</span>
                                    {{$profile->name}} <br><br>

                                <span id="optinforms-form5-name-field" name="FNAME"
                                      style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#0070a3"></span>

                                <span class="col-md-3 glyphicon glyphicon-home" aria-hidden="true"> ที่อยู่</span>
                                    {{$profile->addres}}<br><br>

                                <span class="col-md-3 glyphicon glyphicon-globe" aria-hidden="true"> เว็บไซน์</span>
                                    {{$profile->website}}<br><br>

                                <span class="col-md-3 glyphicon glyphicon-envelope" aria-hidden="true"> อีเมล์</span>
                                    {{$profile->email}}<br><br>

                                <span class="col-md-3 glyphicon glyphicon-phone"
                                      aria-hidden="true"> เบอร์โทรศัพท์</span>
                                    {{$profile->phonenumber}}<br><br>


                                <span class="col-md-3 glyphicon glyphicon-camera" aria-hidden="true"> ราคา</span>
                                ครึ่งวัน : {{$profile->halfprice}}
                                    เต็มวัน : {{$profile->fullprice}} <br/><br/>
                            </span>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- ##############################  Album ... #######################################################-->

            <div class="tab-pane fade" id="album">

                <div id="input">อัลบั้มงาน</div>
                <br>

                <div id="stylealbum">
                    <span id="optinforms-form5-name-field" name="FNAME"
                          style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#002D31">


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
                    </span>
                </div>
            </div>

            <!-- ##############################  Comment ... #######################################################-->

            <div class="tab-pane fade" id="comment">

                <div id="input">ผลการประเมิณ</div>
                <br>

                <div id="stylealbum">
                    <span id="optinforms-form5-name-field" name="FNAME"
                          style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#002D31">


                                <table class="col-md-12 table">
                                    <tr>
                                        <th ><h4> ชื่อผู้ประเมิณ</h4></th>
                                        <th ><h4> รายละเอียด</h4></th>
                                        <th ><h4> สถานะ</h4></th>
                                        <th ><h4> เวลา</h4></th>
                                    </tr>


                                    @foreach($comment as $comment )
                                        <tr>

                                                {!! csrf_field() !!}

                                                <td>
                                                    <input class="form-control " type="text" name="type_al"
                                                           value="{{$comment->name_facebook}}"
                                                           style="background: #98EFFC"
                                                           readonly/>

                                                </td>

                                                <td>
                                                    <input class="form-control " type="text" name="type_al"
                                                           value="{{$comment->detail}}"
                                                           style="background: #98EFFC"
                                                           readonly/>
                                                </td>
                                            <td>
                                                @if( $comment->like == 1 )<img src="assets/img/portfolio/like.jpg"  width="50" height="50"alt="">
                                                @else <img src="assets/img/portfolio/unlike.jpg"  width="50" height="50"alt="">
                                                @endif
                                            </td>
                                            <td>
                                                <input class="form-control " type="text" name="type_al"
                                                       value="{{$comment->created_at}}"
                                                       style="background: #98EFFC"
                                                       readonly/>
                                            </td>

                                        </tr>
                                    @endforeach
                                </table>
                    </span>
                </div>
            </div>

        </div>
    </div>
</section>
</body>


</html>

