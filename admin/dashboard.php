<?php
include "../db/Session.php";
Session::checkSession();
include "../class/Category.php";
include "../class/Songs.php";

$song = new Songs();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $addSong = $song->addCategory($_POST,$_FILES);
}


?>
<!DOCTYPE html>

	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Nitro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">




	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="../js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

			<h1 id="fh5co-logo"><a href="dashboard.php"><img src="../images/logo.png" alt="logo"></a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<h4 align="center">Admin</h4>
                <ul>
                    <li class="fh5co-active"><a href="dashboard.php">Create</a></li>
<!--                    <li class="fh5co"><a href="update.php">Upadate</a></li>-->
                    <li><a href="all.php">All Music</a></li>
                    <li><a href="category.php">Category</a></li>
                </ul>
			</nav>
            <?php
                if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                    Session::destroy();
                }
            ?>
            <div class="fh5co-footer">
                <ul>
                    <li>Hello,<?php echo Session::get('adminName');?></li>
                    <li><a href="?action=logout">LogOut</a></li>
                </ul>
            </div>


		</aside>

		<div id="fh5co-main">

			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Add Song</h2>

                <?php
                    if (isset($addSong)){
                        echo $addSong;
                    }
                ?>
			</div>

            <!--form start-->
			<div class="form-class col-md-8">
				<form class="form-horizontal" action="dashboard.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">Title</label>
						<div class="col-sm-10">
							<input class="form-control" name="title" placeholder="Title">
						</div>
					</div>
					<div class="form-group">
						<label  class="col-sm-2 control-label">Description</label>
						<div class="col-sm-10">
							<input  class="form-control" name="description" placeholder="Small Description">
						</div>
					</div>

                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="catid">
                                <option>Select Category</option>
                                <?php
                                    $cat = new Category();
                                    $getcat = $cat->getCategory();
                                    if ($getcat){
                                        while ($result = $getcat->fetch_assoc()){


                                ?>
                                <option value="<?php echo $result['catid']; ?>"><?php echo $result['catname']; ?></option>


                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="stype">
                                <option><b>Select Type</b></option>
                                <option value="1"><b>Non-Featured</b></option>
                                <option value="2"><b>Featured</b></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Music File</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="songf" placeholder="Music Files">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Thumbnail</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="thumbf" placeholder="Thumbnail File">
                        </div>
                    </div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" name="submit" class="btn btn-info">Create</button>
						</div>
					</div>
				</form>


			</div>
			<!--form end-->


		</div>


</div>




	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- Stellar -->
	<script src="../js/jquery.stellar.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Counters -->
	<script src="../js/jquery.countTo.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="../js/main.js"></script>

	</body>
</html>

