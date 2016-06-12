<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freelancer - Start Bootstrap Theme</title>

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
        .pix {
            border: 2px solid #002D31;
            padding: 2px;
        }

        .background {
            background-color: #18bc9c;

        }

        .background2 {
            background: #35DAFA;
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
        @if(session()->get('FacebookName'))
            <div align="right">
                <div class="btn-group" role="group">

                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <img src="{{session()->get('FacebookAvatar')}}" width="30" height="30">
                        {{session()->get('FacebookName')}}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="/">หน้าหลัก</a></li>
                        <li><a href="viewreques">ประวัติคำขอร้อง</a></li>
                        <li><a href="viewcomment">ประวัติการประเมินช่างภาพ</a></li>
                        <li><a href="logoutfacebook">ออกจากระบบ</a></li>
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
<br/><br/><br/><br/><br/>


<section>
    <div class="container">
        <div class="row">

            <div class="alert alert-success alert-fixed-top">
                {{--<img class="pix" src="{{session()->get('FacebookAvatar')}}" width="130" height="130"><br/>--}}

                <img src="assets/img/portfolio/record.png" width="60" height="60" alt="">
                <strong>ประวัติการประเมินช่างภาพ!</strong>


            </div>
            <br/>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>
                        <h4>
                            <center>รายชื่อช่างภาพ</center>
                        </h4>
                    </th>
                    <th>
                        <center><h4>รายละเอียด</h4></center>
                    </th>
                    <th>
                        <h4>
                            <center>สถานะ</center>
                        </h4>
                    </th>
                    <th>
                        <h4>
                            <center>วันที่ประเมิณ</center>
                        </h4>
                    </th>
                    <th>
                        <h4>
                            <center>แก้ไข</center>
                        </h4>
                    </th>
                    <th>
                        <h4>
                            <center>ลบ</center>
                        </h4>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $reque)
                    <tr>
                        <form action="/editComment{{$reque->id}}" method="get">
                            {!! csrf_field() !!}
                            <td>
                                <center><a style="color: #2ca02c" href="#"
                                           onClick="window.open('ShowProfile{{$reque->name_user}}',''); return false;"
                                           title="Code PHP Popup"><h5>{{$reque->name_user}}</h5></a></center>
                            </td>


                            <td>

                                <h5>
                                    <center>{{$reque->detail}} </center>
                                </h5>
                            </td>

                            <td>
                                <center>
                                    @if( $reque->like == 1 )<img src="assets/img/portfolio/like.jpg" width="50"
                                                                 height="50" alt="">
                                    @else <img src="assets/img/portfolio/unlike.jpg" width="50" height="50" alt="">
                                    @endif</center>
                            </td>

                            <td>
                                <center><h5> {{$reque->created_at}}</h5></center>

                            </td>
                            <td>
                                <button class="glyphicon glyphicon-pencil btn btn-success" type="submit"> แก้ไข
                                </button>
                            </td>

                        </form>
                        <td>
                            <form action="/destroyComment/{{$reque->id}}/" method="post">
                                {!! csrf_field() !!}


                                <button class="glyphicon glyphicon-remove btn btn-danger" type="submit"
                                        onclick="return confirmDel();"> ลบ
                                </button>

                            </form>
                        </td>
                    </tr>


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
                </tbody>
            </table>
        </div>
        <br/><br/><br/>


    </div>
    <br/>
    <hr/>


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
