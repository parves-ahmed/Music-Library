<?php
include "../db/Session.php";
Session::checkSession();
include "../class/Category.php";

$cat = new Category();
// add category
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $catName = $_POST['catname'];
    $addCat = $cat->addCategory($catName);
}

//  delete category
if (isset($_GET['delcat'])){
    $id = $_GET['delcat'];
    $delcat = $cat->deleteCategory($id);
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
                    <li class="fh5co"><a href="dashboard.php">Create</a></li>
<!--                    <li class="fh5co"><a href="update.php">Upadate</a></li>-->
                    <li><a href="all.php">All Music</a></li>
                    <li class="fh5co-active"><a href="category.php">Category</a></li>

                </ul>
			</nav>
            <div class="fh5co-footer">
                <ul>
                    <li>Hello,<?php echo Session::get('adminName');?></li>
                    <li><a href="?action=logout">LogOut</a></li>
                </ul>
            </div>


		</aside>

		<div id="fh5co-main">

			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Add Category</h2>


                <?php
                if (isset($addCat)){
                    echo $addCat;
                }
                ?>

			</div>

            <!--form start-->
			<div class="form-class col-md-8">
				<form class="form-horizontal" action="category.php" method="post">
					<div class="form-group">
						<label class="col-sm-2 control-label">Category Name</label>
						<div class="col-sm-10">
							<input class="form-control" name="catname" placeholder="Title">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" name="submit" class="btn btn-info">Create</button>
						</div>
					</div>
				</form>
<!--                end form  -->
<!--                category list   -->
                <div class="lists">
                    <h3>Category List</h3>
                    <div class="list-group">
                        <?php
                            $getcat = $cat->getCategory();
                            $i = 0;
                            if ($getcat){

                                while ($result = $getcat->fetch_assoc()){
                                    $i++;

                                    ?>
                                    <div class="list-group-item list-group-item-action">
                                        <div class="catitem">
                                            <span class="pull-left"><?php echo $i;?>.</span>
                                            <?php
                                            echo $result['catname'];
                                            ?>
                                            <a href="?delcat=<?php echo $result['catid']; ?>" class="pull-right">X</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>


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

