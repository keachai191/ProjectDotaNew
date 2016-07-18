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
    <script>
        function confirmEdit() {

            var x = confirm(" <?php echo  "คุณต้องการบันทึกข้อมูล ใช่หรือไม่! " ?> ")
            if (x)
                return true;
            else {
                return false;
            }
        }

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
            padding-bottom: 150px;
            background: #FFFFFF;
        }

        .lii {
            display: block;
            color: #0066bb;
            padding: 8px 0 8px 16px;
            text-decoration: none;
        }

        .libar a:hover:not(.active) {
            background-color: #149c82;
            color: white;
        }

        p {
            display: inline;
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
    <div class="container"><br/>
        <a href="home" style="text-align: left" class="btn btn-warning" type="submit">ย้อนกลับ</a><br/><br/><br/>

        <div class="lii col-md-2">
            <ul class="nav nav-pills nav-stacked">

                <li class="active"><a data-toggle="pill" href="#user">ช่างภาพ</a></li>
                <li><a data-toggle="pill" href="#facebook">ผู้ใช้เฟซบุ๊ก</a></li>

            </ul>
        </div>
        <div style="margin-left:20%;padding:1px 16px;height:1000px;">
            <div class="tab-content">
                <!-- ############################# User ...  #####################################################-->
                <div id="user" class="tab-pane fade in active">

                    <h3>ช่างภาพ</h3>
                    <br/>


                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">ผู้ดูแลระบบ</a></li>
                        <li><a data-toggle="tab" href="#menu1">ช่างภาพ</a></li>
                        <li><a data-toggle="tab" href="#menu2">ผู้ถูกระงับการใช้งาน</a></li>

                    </ul>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <div class="bg-danger"><h3>ผู้ดูแลระบบ</h3><b>หมายเหตุ:</b>

                                        <p>ไม่สามารถแก้ไขผู้มีสถานะแอดมินได้</p></div>
                                    <br/>


                                    @foreach($users as $user)
                                        <form action="/adminUpdate/{{$user->id}}" method="post">
                                            {!! csrf_field() !!}
                                            @if($user->status == 'admin')
                                                <div class="col-md-4"><img src="assets/img/portfolio/{{$user->image}}"
                                                                           width="150"
                                                                           height="150"><br/>
                                                    <strong> <a style="color: #0066bb"
                                                                onClick="window.open('/administrator{{$user->id}}',''); return false;">
                                                            {{$user->name}}

                                                            <span class="glyphicon glyphicon-zoom-in"
                                                                  aria-hidden="true"></span>
                                                        </a>
                                                    </strong> <br/>
                                                    <strong>รหัสช่างภาพ #P0{{$user->id}}</strong> <br/>
                                                    <strong>email : {{$user->email}} </strong> <br/>


                                                    <strong>สถานะ: </strong>
                                                    <select style="background: #18bc9c" name="status">
                                                        <option>{{$user->status}}</option>
                                                        <option>photographer</option>
                                                        <option>ban</option>
                                                    </select>
                                                    <fieldset disabled>
                                                        <button type="submit" class="btn btn-primary btn-xs disabled"  onclick="return confirmEdit">
                                                            บันทึก
                                                        </button>
                                                    </fieldset>

                                                </div>
                                            @endif
                                        </form>
                                    @endforeach
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <h3>ช่างภาพ</h3>
                                    @foreach($users as $user)
                                        <form action="/adminUpdate/{{$user->id}}" method="post">
                                            {!! csrf_field() !!}
                                            @if($user->status == 'photographer')
                                                <div class="col-md-4"><img src="assets/img/portfolio/{{$user->image}}"
                                                                           width="150"
                                                                           height="150"><br/>
                                                    <strong> <a style="color: #0066bb"
                                                                onClick="window.open('/administrator{{$user->id}}',''); return false;">
                                                            {{$user->name}}

                                                            <span class="glyphicon glyphicon-zoom-in"
                                                                  aria-hidden="true"></span>
                                                        </a>
                                                    </strong> <br/>
                                                    <strong>รหัสช่างภาพ #P0{{$user->id}}</strong> <br/>
                                                    <strong>email : {{$user->email}} </strong> <br/>


                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                    <strong>สถานะ: </strong>
                                                    <select style="background: #98EFFC" name="status">
                                                        <option>photographer</option>
                                                        <option>admin</option>
                                                        <option>ban</option>
                                                    </select><br/>
                                                    <button type="submit" class="btn btn-primary btn-xs"  onclick="return confirmEdit">บันทึก</button>

                                                </div>
                                            @endif
                                        </form>
                                    @endforeach
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <h3>ผู้ถูกระงับการใช้งาน</h3>
                                    @foreach($users as $user)
                                        <form action="/adminUpdate/{{$user->id}}" method="post">
                                            {!! csrf_field() !!}
                                            @if($user->status == 'ban')
                                                <div class="col-md-4"><img src="assets/img/portfolio/{{$user->image}}"
                                                                           width="150"
                                                                           height="150"><br/>
                                                    <strong> <a style="color: #0066bb"
                                                                onClick="window.open('/administrator{{$user->id}}',''); return false;">
                                                            {{$user->name}}

                                                            <span class="glyphicon glyphicon-zoom-in"
                                                                  aria-hidden="true"></span>
                                                        </a>
                                                    </strong> <br/>
                                                    <strong>รหัสช่างภาพ #P0{{$user->id}}</strong> <br/>
                                                    <strong>email : {{$user->email}} </strong> <br/>


                                                    <strong>สถานะ: </strong>
                                                    <select style="background: #18bc9c" name="status">
                                                        <option>{{$user->status}}</option>
                                                        <option>admin</option>
                                                        <option>photographer</option>
                                                    </select><br/>
                                                    <button type="submit" class="btn btn-primary btn-xs"  onclick="return confirmEdit">บันทึก</button>

                                                </div>
                                            @endif
                                        </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ############################# Facebook ...  #####################################################-->
                <div id="facebook" class="tab-pane fade">
                    <h3>ผู้ใช้เฟซบุ๊ก</h3>
                    <br/>


                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#menu4">ผู้ใช้เฟซบุ๊ก</a></li>
                        <li><a data-toggle="tab" href="#menu5">ผู้ถูกระงับการใช้งาน</a></li>

                    </ul>

                    <div class="tab-content">
                        <div id="menu4" class="tab-pane fade in active">
                            <h3>ผู้ใช้เฟซบุ๊ก</h3>
                            @foreach($facebooks as $facebook)
                                <form action="/adminUpdateFacebook/{{$facebook->id}}" method="post">
                                    {!! csrf_field() !!}
                                    @if($facebook->status == 'userfacebook' )
                                        <div class="col-md-4"><img src="{{$facebook->avatar}}" width="150"
                                                                   height="150"><br/>
                                            <strong>ชื่อ : {{$facebook->name}} </strong> <br/>
                                            <strong>{{$facebook->email}}</strong> <br/>


                                            <input type="hidden" name="id" value="{{$facebook->id}}">
                                            <strong>สถานะ: </strong>
                                            <select style="background: #98EFFC" name="status">
                                                <option>{{$facebook->status}}</option>
                                                <option>ban</option>
                                            </select><br/>
                                            <button type="submit" class="btn btn-primary btn-xs"  onclick="return confirmEdit();">บันทึก</button>
                                        </div>
                                    @endif
                                </form>
                            @endforeach

                        </div>
                        <div id="menu5" class="tab-pane fade">
                            <h3>ผู้ถูกระงับการใช้งาน</h3>

                            @foreach($facebooks as $facebook)
                                <form action="/adminUpdateFacebook/{{$facebook->id}}" method="post">
                                    {!! csrf_field() !!}
                                    @if($facebook->status =='ban')
                                        <div class="col-md-4"><img src="{{$facebook->avatar}}" width="150"
                                                                   height="150"><br/>
                                            <strong>ชื่อ : {{$facebook->name}} </strong> <br/>
                                            <strong>{{$facebook->email}}</strong> <br/>


                                            <input type="hidden" name="id" value="{{$facebook->id}}">
                                            <strong>สถานะ: </strong>
                                            <select style="background: #98EFFC" name="status">
                                                <option>{{$facebook->status}}</option>
                                                <option>userfacebook</option>
                                            </select><br/>
                                            <button type="submit" class="btn btn-primary btn-xs"  onclick="return confirmEdit();">บันทึก</button>
                                        </div>
                                    @endif
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>


                <!-- tab-->
            </div>
            <!-- content-->
        </div>
        <!-- style-->
    </div>
    <!-- container-->
    </div>
</section>


</body>

</html>
