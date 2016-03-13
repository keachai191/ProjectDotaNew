<?php
header('Content-Type: text/html; charset=utf-8');
$weekDay = array('อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสฯ', 'ศุกร์', 'เสาร์');
$thaiMon = array("01" => "มกราคม", "02" => "กุมภาพันธ์", "03" => "มีนาคม", "04" => "เมษายน",
        "05" => "พฤษภาคม", "06" => "มิถุนายน", "07" => "กรกฎาคม", "08" => "สิงหาคม",
        "09" => "กันยายน", "10" => "ตุลาคม", "11" => "พฤศจิกายน", "12" => "ธันวาคม");



//Sun - Sat
$month = isset($_GET['month']) ? $_GET['month'] : date('m'); //ถ้าส่งค่าเดือนมาใช้ค่าที่ส่งมา ถ้าไม่ส่งมาด้วย ใช้เดือนปัจจุบัน
$year = isset($_GET['year']) ? $_GET['year'] : date('Y'); //ถ้าส่งค่าปีมาใช้ค่าที่ส่งมา ถ้าไม่ส่งมาด้วย ใช้ปีปัจจุบัน

//วันที่
$startDay = $year . '-' . $month . "-01";   //วันที่เริ่มต้นของเดือน

$timeDate = strtotime($startDay);   //เปลี่ยนวันที่เป็น timestamp
$lastDay = date("t", $timeDate);   //จำนวนวันของเดือน

$endDay = $year . '-' . $month . "-" . $lastDay;  //วันที่สุดท้ายของเดือน

$startPoint = date('w', $timeDate);   //จุดเริ่มต้น วันในสัปดาห์

//echo "<br>\$data ";
//print_r($data);
//echo "<hr>";
?><!DOCTYPE html>
<html lang="en">

<head>

    <title>testcalender</title>
    <script type='text/javascript'>
        function goTo(month, year) {
            window.location.href = "day_of_week.php?year=" + year + "&month=" + month;
        }
    </script>
    <style>
        th, td {
            width: 50px;
            height: 50px;
            text-align: center
        }

        th {
            background-color: #98EFFC;
        }

        #tb_calendar, #main {
            width: 800px;
        }

        #main {
            border: 2px solid #002D31;
        }

        #nav {
            background-color: #149c82;
            min-height: 20px;
            padding: 10px;
            text-align: center;
            color: #080808;
        }
    </style>


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
            <a class="navbar-brand" href="/">เว็บแอปพลิเคชันจัดหาช่างภาพ</a>

            <!--<a class="navbar-brand" href="#page-top">เว็บแอปพลิเคชันจัดหาช่างภาพ</a>-->

        </div>
        @if(Auth::check())

            <a class="col-md-offset-4" href="home">{{Auth::user()->name}} : กำลังใช้งาน</a><br/>
            <a class="col-md-offset-4" href="auth/logout">ออกจากระบบ</a>


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

<br><br><br><br><br><br>

<div class="container">
    <?php
    $title = "<h3> ป / ด / ว </h3>  <h3>" . $endDay . "</h3>";


    echo '<div id="main">';
    echo '<div id="nav">

  <div class="title">' . $title . '</div>

 </div>
 <div style="clear:both"></div>';
    echo "<table id='tb_calendar' border='1'>"; //เปิดตาราง
    echo "<tr>
  <th>อาทิตย์</th>
  <th>จันทร์</th>
  <th>อังคาร</th>
  <th>พุธ</th>
  <th>พฤหัสฯ</th>
  <th>ศุกร์</th>
  <th>เสาร์</th>
</tr>";

    echo "<tr>";


    $col = $startPoint;          //ให้นับลำดับคอลัมน์จาก ตำแหน่งของ วันในสับดาห์
    if ($startPoint < 7) {         //ถ้าวันอาทิตย์จะเป็น 7
        echo str_repeat("<td> </td>", $startPoint); //สร้างคอลัมน์เปล่า กรณี วันแรกของเดือนไม่ใช่วันอาทิตย์
    }
    for ($i = 1; $i <= $lastDay; $i++) { //วนลูป ตั้งแต่วันที่ 1 ถึงวันสุดท้ายของเดือน
        $col++;
            //นับจำนวนคอลัมน์ เพื่อนำไปเช็กว่าครบ 7 คอลัมน์รึยัง

        echo "<td>", $i, '<br>


      <div class="checkbox">
      <input type="checkbox"> เช้า <br/>
      <input type="checkbox"> เย็น <br/>



  </div>', "</td>";  //สร้างคอลัมน์ แสดงวันที่
        if ($col % 7 == false) {   //ถ้าครบ 7 คอลัมน์ให้ขึ้นบรรทัดใหม่
            echo "</tr><tr>";   //ปิดแถวเดิม และขึ้นแถวใหม่
            $col = 0;     //เริ่มตัวนับคอลัมน์ใหม่
        }
    }

    if ($col < 7) {         // ถ้ายังไม่ครบ7 วัน
        echo str_repeat("<td> </td>", 7 - $col); //สร้างคอลัมน์ให้ครบตามจำนวนที่ขาด
    }
    echo '</tr>';
    echo '</table>';
    echo '</main>';

    ?>
</div>
</div>


<br><br><br><br><br><br><br><br><br><br>


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


