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

    <!--test-->
    <link href="assets/nou/nouislider.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/freelancer.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>


<body id="page-top" class="index">

<!-- Navigation -->
<--<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!--<a class="navbar-brand" href="#page-top">เว็บแอปพลิเคชันจัดหาช่างภาพ</a>-->
                <a class="navbar-brand" href="index.blade.php">เว็บแอปพลิเคชันจัดหาช่างภาพ</a>
        </div>

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


<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <ol class="breadcrumb">
                    <li><a href="laravel/">หน้าหลัก</a></li>
                    <li class="active">ค้นหา</li>
                    <li><a href="#">เลือกช่างภาพ</a></li>
                </ol>


                <h2>ค้นหาช่างภาพ</h2>
                <h4>ขั้นตอนที่ 1 ค้นหาจากเงื่อนไขที่ต้องการ</h4>
                <hr class="star-primary">
            </div>
        </div>
        <form method="get" action='s'>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row control-group" align="center">
                        <div class="form-inline" col-xs-4 >
                            &nbsp;&nbsp;&nbsp;<h7>วันที่ต้องการเริ่มถ่ายภาพ</h7>&nbsp;&nbsp;&nbsp;
                            <input class="form-control" type="date" name="date" required>

                            &nbsp;&nbsp;&nbsp;<h7>ระยะเวลาถ่าย</h7>&nbsp;&nbsp;&nbsp;
                            <select class="form-control" name="time">
                                <option value="1">ครึ่งวัน</option>
                                <option value="2">เต็มวัน</option>
                            </select>

                            &nbsp;&nbsp;&nbsp;<h7>ช่วงเวลา</h7>&nbsp;&nbsp;&nbsp;
                            <select class="form-control" name="time2" >
                                <option >ช่วงเช้า</option>
                                <option value="1">ช่วงเช้า</option>
                                <option value="2">ช่วงบ่าย</option>
                                <option value="2">ช่วงเย็น</option>
                            </select>



                        </div>
                    </div>
                    <br>
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group" align="center" >
                            <div class="form-inline" col-xs-4 >
                                &nbsp;&nbsp;&nbsp;<h7>งบประมาณ</h7>&nbsp;&nbsp;&nbsp;
                                <input class="form-control" type="text" placeholder="งบประมาณ" name="money" required>





                            </div>
                        </div>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12" align="center">

                                <br><button class="btn btn-success">ค้นหา</button>
                           <button type="reset" class="btn btn-success">ล้างข้อมูล</button>


                            

                        </div>
                    </div>
                </form>
            </div>
        </div>
            </form>
    </div>

</section>

<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Location</h3>
                    <p>University Of Phayao</p>
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
                    <h3>About The Website</h3>
                    <p>Use for fine Photoghraper. My fanpage<a href="https://www.facebook.com/photographerMatching/?ref=hl">PhotographerMatching Community</a>.</p>
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

<script src="assets/nou/nouislider.min.js"></script>

</body>

</html>
