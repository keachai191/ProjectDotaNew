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


<!-- Contact Section --> <!--facebook -->
<section id="contact">
    <div class="container"><br/><br/>

        <form action="home" method="get" enctype="multipart/form-data">

            {!! csrf_field() !!}

            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <button class="btn btn-warning" type="submit">ย้อนกลับ</button>
        </form>

        @if(Auth::check())
            <center><h1>เพิ่มอัลบัม</h1><br/>

                <h4>ประเภทของอัลบัม</h4>

                <form action="Album" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                    <label class="radio-inline">
                        <input type="radio" name="type_al" id="inlineRadio1" value="รับปริญญา" checked> รับปริญญา
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
                    <input type="url" size="30" name="url_al"/><br/><br>

                    <h4>รายละเอียดอัลบั้ม</h4>
                    <textarea type="text" value="" name="detail_al" rows="5" cols="60">  </textarea><br/>



                    <!--<h4>ราคาจ้างงาน</h4>
                    <span>ครึ่งวัน</span>
                    <input type="name" size="10" name="halfprice" value="" required>
                    <span>เต็มวัน</span>
                    <input type="name" size="10" name="fullprice" value="" required><br><br>-->


                    <button class="btn btn-success" type="submit">เพิ่มอัลบัม</button>
                    &nbsp; &nbsp; &nbsp;


                    <br/><br/><br/>

                </form>
            </center>




            <table class="col-md-12 table">
                <tr>
                    <th class="col-md-3"><h4>ประเภท</h4></th>
                    <th class="col-md-3"><h4>ที่อยู่อัลบัม</h4></th>
                    <th class="col-md-3"><h4>รายละเอียดอัลบั้ม</h4></th>
                    <th class="col-md-1"><h4>แก้ไข</h4></th>
                    <th class="col-md-1"><h4>ลบ</h4></th>
                </tr>

                @foreach($albums as $album)
                    <tr>
                        <form action="/Albums/{{$album->id}}/" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <td>
                                <input type="text" name="type_al" value="{{$album->type_al}}"
                                       style="background: #98EFFC"
                                       readonly/>
                                <select name="type_al">
                                    <option> {{$album->type_al}}</option>
                                    <option>ฟรีเวดดิ้ง</option>
                                    <option>งานแต่ง</option>
                                    <option>อีเวนต์</option>
                                    <option>รับปริญญา</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="url_al" size="30" value="{{$album->url_al}}"/>
                            </td>
                            <td>
                                <input type="text" name="detail_al" size="30" value="{{$album->detail_al}}"/>
                            </td>
                            <!--<td>
                                ครึ่งวัน : <input type="text" name="halfprice" size="7" value="{{$album->halfprice}}"/>
                                เต็มวัน : <input type="text" name="fullprice" size="7" value="{{$album->fullprice}}"/>
                            </td>-->
                            <td>
                                <button class="btn btn-info" type="submit"> แก้ไข</button>
                            </td>
                        </form>


                        <td>
                            <form action="/AlbumsDestroy/{{$album->id}}/" method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                <button class="btn btn-danger" type="submit"> ลบ</button>

                            </form>
                        </td>



                @endforeach

            </table>
        @endif
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
