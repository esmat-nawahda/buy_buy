<?php session_start(); ?>
<?php include_once("language/ar.php");?>

<?php
include_once("server/DB.php");
$GLOBALS['db']=new DB($host,$username,$password,$database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Need</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
<!--datepicker-->
</head><!--/head-->

<body>

    <!--Header-->
    <?php include_once("views/header.php"); ?>
    <!--End Header-->

    //post abu ali
<div style="width:350px; height:200px;" >
<select name="title" id="title_post">

    <option >car</option>
    <option>mobile</option>
    <option> clothes </option>
    <option> labtop</option>
    <option> tablet</option>

</select>

<textarea name="content_post" id="content_post" placeholder="Write your Post here !!!"></textarea>
    <div class="form-actions">


        <button type="submit" id="pup_post" name="pup_post" class="btn green pull-left">
            Publish <i class="m-icon-swapright m-icon-white"></i>
        </button>

    </div>
    </div>

    <!--Slider-->
    <div id="main_slider">
        <?php include_once("views/slider.php"); ?>
    </div>
    <!--End Slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
                    <!--Left Sidebar-->
                    <?php include_once("views/left_sidebar.php"); ?>
                    <!--End Left Sidebar-->
                </div>
				
				<div class="col-sm-9 padding-right" id="main_container">
                    <!--Body-->
                    <?php include_once("views/body.php"); ?>
                    <!--End Body-->



				</div>

			</div>
		</div>
	</section>



    <!--Footer-->
    <?php include_once("views/footer.php"); ?>
    <!--End Footer-->

    <!--Modals-->
    <?php include_once("Modals/updateModal.php"); ?>
    <?php include_once("Modals/galleryModal.php"); ?>
    <?php include_once("Modals/infoModal.php"); ?>
    <!--End Modals-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/views.js"></script>
    <script src="js/main.js"></script>

    <script src="js/functions.js"></script>
    <script src="language/ar.js"></script>
    <script src="routes/modules.js"></script>
    <script src="routes/jquery.routes.js"></script>
    <script src="routes/app.routes.js"></script>

    <!--SWAL-->
    <link href="swal/sweet-alert.css" rel="stylesheet">
    <link href="swal/ie9.css" rel="stylesheet">
    <script src="swal/sweet-alert.js"></script>
    <script src="swal/sweet-alert.min.js"></script>






</body>
</html>