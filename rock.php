<?php
include "class/ClientSide.php";
include_once "db/db_class.php";

$song = new ClientSide();


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

	<!--    card css-->
	<link rel="stylesheet" href="css/card.css">
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>
<body>
<div id="fh5co-page">
	<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
	<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

		<h1 id="fh5co-logo"><a href="index.php"><img src="images/logo.png" alt="logo"></a></h1>
		<nav id="fh5co-main-menu" role="navigation">

			<ul>
				<li ><a href="index.php">Home</a></li>
				<li><a href="trap.php">Trap Nation</a></li>
				<li><a href="pop.php">POP</a></li>
				<li class="fh5co-active"><a href="rock.php">Rock</a></li>
			</ul>
		</nav>



	</aside>

	<div id="fh5co-main">

		<div class="fh5co-narrow-content">
			<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft"><div style="color:#da1212;">Rock</div></h2>


		</div>

		<div class="col-md-12 feature-song">
			<div style="border-left: 6px solid #da1212;margin-left: 50px;">
				<h3>Rock</h3>
			</div>
			<?php
            $i=0;
            $getsong=$song->getallRock();
			if ($getsong){
			while ($result = $getsong->fetch_assoc()){
			$i++;
			if($i <= 4) {
			?>
			<div href="#" class="col-md-5 song  list-group-item list-group-item-action">
				<div class="pull-left">
					<p><?php echo substr($result['title'], 0, 18) . '...'; ?>
						<br>
						<?php echo $result['catname']; ?>
					</p>
				</div>
				<div class="pull-right">
					<img src="<?php echo 'admin/images/' . $result['thumbf']; ?>" width="100"
						 height="100" alt="text">
				</div>
				<audio controls>
					<source src="<?php echo 'audio/' . $result['songf']; ?>" type="audio/mpeg">
				</audio>
			</div>
			<?php
                    }
                }
            }
            ?>
			<!--                -->


		</div>

		<!--            -->

		<!--            -->



	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>


	<!-- MAIN JS -->
	<script src="js/main.js"></script>
	<!--        card js-->

</body>
</html>

