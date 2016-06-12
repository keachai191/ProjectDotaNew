<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Adim</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/freelancer.css" rel="stylesheet">


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
        body {
            margin: 0;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 16%;
            background-color: #e4f1fb;
            position: fixed;
            height: auto;
            overflow: auto;
        }

        li a {
            display: block;
            color: #0066bb;
            padding: 8px 0 8px 16px;
            text-decoration: none;
        }

        .libar a:hover:not(.active) {
            background-color: #149c82;
            color: white;
        }


    </style>


</head>


<body id="page-top" class="index">

<!-- Navigation -->
<--
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">

            <a href="/"><img src="assets/img/portfolio/Logo3.png" width="500" height="100"></a>

            <!--<a class="navbar-brand" href="#page-top">เว็บแอปพลิเคชันจัดหาช่างภาพ</a>-->

        </div>

        @if(Auth::check())


            <div align="right">
                <div class="btn-group" role="group">

                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <img src="assets/img/portfolio/{{Auth::user()->image}}" width="30" height="30">
                        ช่างภาพ {{Auth::user()->name}}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="home">HOME</a></li>
                        <li><a href="auth/logout">ออกจากระบบ</a></li>
                    </ul>
                </div>
            </div>

            @endif


                    <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <!--<li class="page-scroll">
                        <a href="#portfolio">จัดอันดับช่างภาพ</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">ช่างภาพในระบบ</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<br/><br/><br/><br/>


<section>
    <div class="container">

        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a data-toggle="tab" href="#user">ช่างภาพ</a></li>
            <li><a data-toggle="tab" href="#facebook">ผู้ใช้เฟซบุ๊ก</a></li>
        </ul>


        <div style="margin-left:25%;padding:1px 16px;height:1000px;">

            <!-- ############################# User ...  #####################################################-->
            <div class="tab-content">
                <div id="user" class="tab-pane fade in active">
                    <h3>Photographer</h3><br/>

                    <div class="row">
                        @foreach($users as $user)
                            <form action="/adminUpdate/{{$user->id}}" method="post">
                                {!! csrf_field() !!}
                            <div class="col-md-6 col-md-4"><img src="assets/img/portfolio/{{$user->image}}"
                                                                width="150"
                                                                height="150"><br/>
                                <strong>ชื่อ : {{$user->name}} </strong> <br/>
                                <strong>{{$user->email}}</strong> <br/>
                                <strong>{{$user->id}}</strong> <br/>


                                    @if($user->status == null )
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <strong>สถานะ: </strong>
                                        <select style="background: #98EFFC" name="status">
                                            <option>{{$user->status}}</option>
                                            <option>admin</option>
                                            <option>ban</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-xs">บันทึก</button>
                                </form>
                                <br/><br/>

                                @elseif($user->status == 'admin' )
                                    <strong>สถานะ: </strong>
                                    <select style="background: #18bc9c" name="status">
                                        <option>{{$user->status}}</option>
                                        <option>photographer</option>
                                        <option>ban</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-xs">บันทึก</button>
                                    <br/><br/>

                                @elseif($user->status == 'ban' )
                                    <strong>สถานะ: </strong>
                                    <select style="background: #18bc9c" name="status">
                                        <option>{{$user->status}}</option>
                                        <option>admin</option>
                                        <option>photographer</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-xs">บันทึก</button>
                                    <br/><br/>
                                @endif
                            </div>
                        @endforeach
                        <br/>
                    </div>


                    {{--<img src="assets/img/portfolio/{{$user->image}}" width="100" height="100"><br>
                    <strong>ชื่อช่างภาพ</strong> {{$user->name}} <br/>
                    <strong>อีเมล์</strong>&nbsp;&nbsp;{{$user->email}}
                    <br/><br/>--}}


                </div>

                <!-- ############################# User ...  #####################################################-->

                <div id="facebook" class="tab-pane fade">
                    <h3>Facebook</h3>

                    @foreach($facebooks as $facebook)
                        <div class="col-md-6 col-md-4"><img src="{{$facebook->avatar}}" width="150" height="150"><br/>
                            <strong>ชื่อ : {{$facebook->name}} </strong> <br/>
                            <strong>{{$facebook->email}}</strong> <br/>
                            <strong>สถานะ: </strong>
                            <select style="background: #98EFFC" name="#">
                                <option>userfacebook</option>
                                <option>ban</option>
                            </select><br/><br/>

                        </div>
                    @endforeach


                </div>
            </div>
        </div>

    </div>
</section>


<!-- jQuery -->
<script src="assets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="assets/js/classie.js"></script>
<script src="assets/js/cbpAnimatedHeader.js"></script>

<!-- Contact Form JavaScript -->
<script src="assets/js/jqBootstrapValidation.js"></script>
<script src="assets/js/contact_me.js"></script>

<!-- Custom Theme JavaScript -->
<script src="assets/js/freelancer.js"></script>

</body>

</html>
