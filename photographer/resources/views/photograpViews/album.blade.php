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
            <a class="navbar-brand" href="http://se.ict.up.ac.th/photographerMatching">เว็บแอปพลิเคชันจัดหาช่างภาพ</a>

            <!--<a class="navbar-brand" href="#page-top">เว็บแอปพลิเคชันจัดหาช่างภาพ</a>-->

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

<br><br><br><br><br><br>

<center><h1> Created New Section </h1></center>
<!--<form  action="control" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
        <center> Enter sectionName : <input type="text" name="section_name"/><br/>
            Enter sectionURL : <input type="text" name="section_url"/><br/>

            <button type="submit">ส่งข้อมูล</button>
        </center>
        <br/>

</form>-->

<center>{!! Form::open(["url"=>"control","files"=>"true"]) !!}
    Enter sectionName : {!! Form::text("section_name") !!}<br/>
    Enter SrctionURL : {!! Form::text("section_url") !!}<br/>
    {!! Form::submit("ส่งข้อมูล",["class"=>"btn btn-info"]) !!}
    {!! Form::close() !!}</center>


<table class="col-md-12 table">
    <tr>
        <th class="col-md-3">Section Name</th>
        <th class="col-md-3">Section Url</th>
        <th class="col-md-1">Update</th>
        <th class="col-md-1">Delete</th>
    </tr>
    @foreach($sections as $section )
        <tr>

            <!--<form action="control/{{$section->id}}/" method="post">
                {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="PATCH"/>
                    <td>
                        <input type="text" name="section_name" value="{{$section->section_name}}"/>
                </td>
                <td>
                    <input type="text" name="section_url" value="{{$section->section_url}}"/>
                </td>
                <td>
                    <button type="submit"> แก้ไข</button>
                </td>
            </form>-->

            {!! Form::open(["url"=>"control/$section->id","method"=>"patch"]) !!}
            <td>
                {!! Form::text("section_name","$section->section_name") !!}
            </td>
            <td>
                {!! Form::text("section_url","$section->section_url") !!}
            </td>
            <td>
            {!! Form::submit("แก้ไข",["class"=>"btn btn-success"]) !!}
            </td>
            {!! Form::close() !!}

            <!--<td>
                <form action="control/{{$section->id}}/" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE"/>
                    <button type="submit"> ลบ</button>

                </form>
            </td>-->

            <td>
                {!! Form::open(["url"=>"control/$section->id","method"=>"delete"]) !!}
                {!! Form::submit("ลบ",["class"=>"btn btn-danger"]) !!}
                {!! Form::close() !!}
            </td>

        <td>
            <a href="Album/{{$section->id}}" class="btn btn-default">Show</a>
        </td>




    @endforeach
</table>


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
