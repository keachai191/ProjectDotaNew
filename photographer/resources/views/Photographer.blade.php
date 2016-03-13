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

    <script src="moment.js"></script>
    <script>
        moment().format();
    </script>
</head>

<body id="page-top" class="index">

<!-- Navigation -->
<--
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

            <a class="navbar-brand" href="/">เว็บแอปพลิเคชันจัดหาช่างภาพ</a>


            <!--<a class="navbar-brand" href="#page-top">����ͻ���पѹ�Ѵ�Ҫ�ҧ�Ҿ</a>-->

        </div>


        @if(Auth::check())

            <a class="col-md-offset-4">{{Auth::user()->name}} : กำลังใช้งาน</a><br/>
            <a class="col-md-offset-4" href="auth/logout">ออกจากระบบ</a>


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
<br/><br/><br/>


<!-- Contact Section --> <!--facebook -->
<section id="contact">
    <div class="container">
        <div class="panel-body">


            <ul class="nav nav-tabs">
                <li class="active "><a href="#profile" data-toggle="tab"><h4>ข้อมูลส่วนตัว</h4></a>
                </li>
                <li class=""><a href="#calendar" data-toggle="tab"><h4>ตารางเวลาว่าง</h4></a>
                </li>
                <li class=""><a href="#album" data-toggle="tab"><h4>อัลบั้ม</h4></a>
                </li>
            </ul>

            <!-- #############################  Profile ... ########################################################-->

            <div class="tab-content">
                <div class="tab-pane fade active in" id="profile">

                    <div class="col-md-7">
                        <?php echo csrf_field(); ?>

                        <h3> ข้อมูลช่างภาพ </h3> <br>
                        @if(Auth::check())

                            <span class="col-md-2 glyphicon glyphicon-user" aria-hidden="true">ชื่อติดต่อ</span>
                            <input type="text" size="30" name="email" style="background: #C0F9BD"
                                   value="{{Auth::user()->name}} " readonly><br><br/>

                            <span class="col-md-2 glyphicon glyphicon-home" aria-hidden="true">ที่อยู่</span>
                            <input type="text" size="30" name="addres" value="{{Auth::user()->addres}}" readonly><br>
                            <br>

                            <span class="col-md-2 glyphicon glyphicon-globe" aria-hidden="true">เว็บไซน์</span>
                            <input type="url" size="30" name="website" value="{{Auth::user()->website}}" readonly><br>
                            <br>

                            <span class="col-md-2 glyphicon glyphicon-envelope" aria-hidden="true">อีเมล์</span>
                            <input type="email" size="30" name="email" style="background: #C0F9BD"
                                   value="{{Auth::user()->email}} " readonly><br><br>

                            <span class="col-md-2 glyphicon glyphicon-phone" aria-hidden="true">เบอร์โทรศัพท์</span>
                            <input type="tel" size="30" name="phonenumber" value="{{Auth::user()->phonenumber}}"
                                   readonly><br><br>


                            <span class="col-md-2 glyphicon glyphicon-camera" aria-hidden="true"> ราคา</span>
                            ครึ่งวัน : <input type="text" name="halfprice" size="7"
                                              value="{{Auth::user()->fullprice}}" readonly/>
                            เต็มวัน : <input type="text" name="fullprice" size="7"
                                             value="{{Auth::user()->halfprice}}" readonly/> <br/><br/>

                            <a href="edit" class="btn btn-info " aria-label="Left Align">
                                <span class="glyphicon glyphicon-edit glyphicon-align-center"
                                      aria-hidden="true">แก้ไข้ข้อมูลช่างภาพ</span>
                            </a>
                    </div>


                    @endif


                </div>


                <!-- ############################# Calendar ...  #####################################################-->
                <div class="tab-pane fade" id="calendar">


                    <h1> .. </h1>


                </div>
                <!-- ##############################  Album ... #######################################################-->


                <div class="tab-pane fade" id="album">
                    @if(Auth::check())

                        <form action="Album" method="get" enctype="multipart/form-data">

                            {!! csrf_field() !!}

                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


                            <br/><br/>


                            <table class="col-md-12 table">
                                <tr>
                                    <th class="col-md-3"><h4>ประเภท</h4></th>
                                    <th class="col-md-3"><h4>ที่อยู่อัลบัม</h4></th>
                                    <th class="col-md-3"><h4>รายระเอียดอัลบั้ม</h4></th>

                                </tr>


                                @foreach($albums as $album )
                                    <tr>
                                        <form action="Album/{{$album->id}}/" method="post">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="PATCH"/>
                                            <td>
                                                <input type="text" name="type_al" value="{{$album->type_al}}"
                                                       style="background: #98EFFC"
                                                       readonly/>

                                            </td>

                                            <td>
                                                <input type="text" name="url_al" size="30" value="{{$album->url_al}}"/>
                                            </td>
                                            <td>
                                                <input type="text" name="url_al" size="35" value="{{$album->detail_al}}"/>
                                            </td>

                                        </form>



                                @endforeach

                            </table>

                            <a href="Album{{Auth::user()->id}}" class="btn btn-info " aria-label="Left Align">
                                <span class="glyphicon glyphicon-edit glyphicon-align-center"
                                      aria-hidden="true">แก้ไข้ข้อมูลอัลบัม</span>
                            </a>


                        </form>



                    @endif

                </div>

            </div>
        </div>
    </div>


    </div>


</section>


<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Location</h3>

                    <p>3481 Melrose Place<br>Beverly Hills, CA 90210</p>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Around the Web</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>About Freelancer</h3>

                    <p>Freelance is a free to use, open source Bootstrap theme created by <a
                                href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Your Website 2014
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

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
