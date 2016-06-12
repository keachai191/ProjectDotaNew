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

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- ber -->
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <!-- Calendar -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <style>

        html, body {
            width: 100%;
            height: 100%;
        }

        section.theme {
            margin-top: 30px;
            padding-bottom: 500px;
            background-color: #EEEEEE;
            -moz-background-size: cover;
            -webkit-background-size: cover;
        }

        .navbar.navbar-inverse {
            padding: 5px;

        }

        .city {
            display: none;
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
            <a class="navbar-brand" href="/">photographer dota</a>
        </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
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
                                <li><a href="home">HOME</a></li>
                                <li><a href="auth/logout">ออกจากระบบ</a></li>
                            </ul>
                        </div>
                    </div>

                @endif</li>

            <li><a href="#"></a></li>
        </ul>


    </div>

</nav>


<section class="theme">
    <div class="container">

        <nav class="w3-sidenav w3-info w3-card-2" style="width:130px">
            <div class="w3-container">
                <h5>เมนู</h5>
            </div>
            <a href="#" class="tablink" onclick="openCity(event, '1')">คำร้องขอถึงคุณ</a>
            <a href="#" class="tablink" onclick="openCity(event, '2')">ยอมรับ</a>
            <a href="#" class="tablink" onclick="openCity(event, '3')">ปฏิเสธ</a>
        </nav>

        <div style="margin-left:130px">
            <div class="w3-padding"><h2> คำร้องขอถึงช่างภาพ </h2></div>

            {{--  opacity left zoom--}}
            <div id="1" class="w3-container city w3-animate-left">
                <h5>คำร้องขอที่ยังไม่ได้ดำเนินการ</h5>

                <div class="row">
                    @foreach($requests as $reque)

                        <div class="col-md-6">
                            <p>จากคุณ {{$reque->name_facebook}}</p>

                            <p><img src="{{$reque->facebook_avatar}}"></p>

                            <p>ข้อความ : {{$reque->detail_request}}</p>

                            <p>วันที่ต้องการถ่ายภาพ {{$reque->start}}</p>


                            <form action="/RequestUpdate/{{$reque->id}}/" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}

                                <input type="hidden" name="checkview" value="0">

                                <button style="font-size: 12px;" class="btn btn-success" name="checkreques"
                                        type="submit" value="3"
                                        onclick="return confirmreques();"> ตอบรับคำขอ
                                </button>

                                <button style="font-size: 12px;" class="btn btn-danger" name="checkreques"
                                        type="submit" value="0"
                                        onclick="return confirmDel();"> ปฏิเสธคำขอ
                                </button>
                            </form>

                            <script>
                                function confirmDel() {
                                    var x = confirm
                                    (" <?php echo  "คุณต้องการปฏิเสธคำร้องขอใช่หรือไม่! " ?> ")
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
                        </div>
                    @endforeach
                </div>
                <hr/>
            </div>


            <div id="2" class="w3-container city w3-animate-left">
                <h5>ประวัติคำร้องขอการยอมรับ</h5>

                <div class="row">
                    @foreach($accepts as $accept)
                        <div class="col-md-6">
                            <p>จากคุณ {{$accept->name_facebook}}</p>

                            <p><img src="{{$accept->facebook_avatar}}"></p>

                            <p>ข้อความ : {{$accept->detail_request}}</p>

                            <p>วันที่คุณตอบรับคำขอ {{$accept->updated_at}}</p>

                        </div>
                    @endforeach
                </div>
                <hr/>
            </div>


            <div id="3" class="w3-container city w3-animate-left">
                <h5>ประวัติคำร้องขอการปฏิเสธ</h5>

                <div class="row">
                    @foreach($rejects as $reject)
                        <div class="col-md-6">
                            <h6>จากคุณ {{$reject->name_facebook}}</h6>

                            <p><img src="{{$reject->facebook_avatar}}"></p>

                            <p>ข้อความ : {{$reject->detail_request}}</p>

                            <p>วันที่คุณปฏิเสธ {{$reject->updated_at}}</p>

                        </div>
                    @endforeach
                </div>
                <hr/>
            </div>
        </div>

        <script>
            function openCity(evt, cityName) {
                var i, x, tablinks;
                x = document.getElementsByClassName("city");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < x.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" w3-green", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " w3-green";
            }
        </script>
    </div>
</section>


</body>

</html>
