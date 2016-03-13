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


<script language="javascript">
    function fncCreateElement() {

        var mySpan = document.getElementById('mySpan');

        var myElement1 = document.createElement('<input type="text" name="txt[]">');
        myElement1.setAttribute('id', "txt1");
        mySpan.appendChild(myElement1);

//*** Remove Element ***//
        /*
         var deleteEle = document.getElementById('txt1');
         mySpan.removeChild(deleteEle);
         */

        var myElement2 = document.createElement('<br>');
        mySpan.appendChild(myElement2);
    }
</script>

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

<?php
session_start();
require_once 'facebook/src/Facebook/autoload.php';

use Facebook\FacebookApp;
use Facebook\FacebookRequest;
use Facebook\GraphNodes\GraphUser;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Helpers\FacebookRedirectLoginHelper;

$config = array();
$config['app_id'] = '722732811204912';
$config['app_secret'] = '9f04e68cebc03e5e8b50233e34ff5db3';
$config['default_graph_version'] = 'v2.5';
$fb = new Facebook\Facebook($config);
$app = new FacebookApp($config['app_id'], $config['app_secret']);

$fb = new Facebook\Facebook([
        'app_id' => '722732811204912',
        'app_secret' => '9f04e68cebc03e5e8b50233e34ff5db3',
        'default_graph_version' => 'v2.5',
]);


$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'photos', 'user_photos', 'user_friends']; // optional

try {
    if (isset($_SESSION['facebook_access_token'])) {
        $accessToken = $_SESSION['facebook_access_token'];
    } else {
        $accessToken = $helper->getAccessToken();
    }
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
if (isset($accessToken)) {
    if (isset($_SESSION['facebook_access_token'])) {

        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

    } else {

        // getting short-lived access token
        $_SESSION['facebook_access_token'] = (string)$accessToken;
        // OAuth 2.0 client handler
        $oAuth2Client = $fb->getOAuth2Client();
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string)$longLivedAccessToken;
        // setting default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

    }


    /* $response = $request->execute();
     $graphObject = $response->getGraphObject();
     print_r($graphObject);*/

    // getting basic info about user
    try {

        $response = $fb->get('/me?fields=name,first_name,photos{album},last_name,email,picture,birthday');
        $userNode = $response->getGraphUser();


    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // redirecting user back to app login page
        header("");
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }


} else {
    // replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
    $loginUrl = $helper->getLoginUrl('http://se.ict.up.ac.th/photographerMatching/Wanchalerm2', $permissions);
    echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
}
?>


<script type="text/javascript">
    //<![CDATA[
    function addbox() {
        var b = document.getElementById('inputboxes');
        var el1 = document.createElement("br");
        var el2 = document.createElement("input");
        el2.name = 'link';
        el2.type = 'website';
        el2.value = '';
        el2.size = '25';
        el2.placeholder = "http://";
        b.appendChild(el1);
        b.appendChild(el2);
    }
    //]]>
</script>

<section id="contact">
    <div class="container">


        <form class="col-md-12" method="post" action="updatealbum">
            <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo $album[0]['id'] ?> ">

            <h3 class="glyphicon glyphicon-education"> วันรับปริญญามหาวิทยาลัยพะเยาตั้งแต่วันที่ 10-20 กุมภาพันธ์
                2559</h3><br><br>

            <h4>วันที่ต้องการรับงาน (ระหว่างวันที่ 10-20)</h4>


            ระบุวัน :
            <label class="checkbox-inline"><input type="checkbox" value="">วันที่10</label>
            <label class="checkbox-inline"><input type="checkbox" value="">วันที่11</label>
            <label class="checkbox-inline"><input type="checkbox" value="">วันที่12</label>
            <label class="checkbox-inline"><input type="checkbox" value="">วันที่13</label>
            <label class="checkbox-inline"><input type="checkbox" value="">วันที่14</label>
            <label class="checkbox-inline"><input type="checkbox" value="">วันที่15</label>
            <label class="checkbox-inline"><input type="checkbox" value="">วันที่16</label>
            <label class="checkbox-inline"><input type="checkbox" value="">วันที่17</label>
            <label class="checkbox-inline"><input type="checkbox" value="">วันที่18</label>
            <label class="checkbox-inline"><input type="checkbox" value="">วันที่19</label>
            <label class="checkbox-inline"><input type="checkbox" value="">วันที่20</label>

            <br><br>


            <h4 class="glyphicon glyphicon-camera" aria-hidden="true"> ราคาจ้างงาน </h4><br>
            เต็มวัน : <input type="price" size="10" name="fullprice" value="<?php echo $album[0]['fullprice'] ?>" required>
            ครึ่งวัน : <input type="price" size="10" name="halfprice"  value="<?php echo $album[0]['halfprice'] ?>" required><br><br>



            <h4 class="glyphicon glyphicon-thumbs-up" aria-hidden="true"> ผลงานการถ่ายภาพ</h4>
            <h8>(URL facebook)</h8>
            <input type="submit" name="$addbox" value="เพิ่มตาราง URL" onclick="addbox();return false;"/><br>

            <div id="inputboxes">
                <?php foreach(array(1) as $n): ?>
                <input type="link" size="25" name="url_al" value="<?php echo $album[0]['url_al'] ?>" required>
                <?php endforeach; ?>
            </div>

                <input type="hidden" size="30" name="email" style="background: #C0F9BD"
                       value=" <?php echo $userNode->getField('email');?> " readonly><br><br>



                <br><br>
            <button type="submit" class="btn btn-info " aria-label="Left Align">
                <span class="glyphicon glyphicon-edit glyphicon-align-center"
                      aria-hidden="true">เพิ่มข้อมูลงาน</span> </button>


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
