<?php
session_start();
require 'db.php';
if (!isset($_SESSION['logged_in']) or $_SESSION['logged_in'] == 0) {
	$_SESSION['message'] = "You need to first login to access this page !!!";
	header("Location: Login/error.php");
}
$bid = $_SESSION['id'];
if (isset($_GET['flag'])) {
	$pid = $_GET['pid'];

	$sql = "INSERT INTO mycart (bid,pid)
               VALUES ('$bid', '$pid')";
	$result = mysqli_query($conn, $sql);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>AgroCulture: My Cart</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="bootstrap\js\bootstrap.min.js"></script>
	<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="login.css" />
	<script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
	</noscript>
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>

<body class>

	<?php

	function dataFilter($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>

	<!-- navbar -->

	<?php
	if (isset($_SESSION['logged_in']) and $_SESSION['logged_in'] == 1) {
		$loginProfile = "My Profile: " . $_SESSION['Username'];
		$logo = "glyphicon glyphicon-user";
		// if($_SESSION['Category']!= 1)
		// {
		$link = "./profileView.php";
		// }
		// else {
		// 		$link = "../profileView.php";
		// }
	} else {
		$loginProfile = "Login";
		$link = "../index.php";
		$logo = "glyphicon glyphicon-log-in";
	}
	?>

	<!DOCTYPE html>
	<header id="header">
		<h1><a href="index.php">AmanZon</a></h1>
		<nav id="nav">
			<ul>
				<li><a href="./Login/profile.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<?php if ($_SESSION['Category'] != '1') { ?>

					<li><a href="./myCart.php"><span class="glyphicon glyphicon-shopping-cart"> MyCart</a></li>
				<?php } ?>
				<li><a href="<?= $link; ?>"><span class="<?php echo $logo; ?>"></span><?php echo " " . $loginProfile; ?></a></li>
				<li><a href="./market.php"><span class="glyphicon glyphicon-grain"> Digital-Market</a></li>
				<li><a href="./blogView.php"><span class="glyphicon glyphicon-comment"> BLOG</a></li>
			</ul>
		</nav>
	</header>

</body>

</html>


<!-- restcode -->

<!-- One -->
<section id="main" class="wrapper style1 align-center">
	<div class="container">
		<h2 style="color:#383838;">My Cart</h2>

		<section id="two" class="wrapper style2 align-center">
			<div class="container">
				<div class="row">
					<?php
					$sql = "SELECT * FROM mycart WHERE bid = '$bid'";
					$result = mysqli_query($conn, $sql);
					while ($row = $result->fetch_array()) :
						$pid = $row['pid'];
						$sql = "SELECT * FROM fproduct WHERE pid = '$pid'";
						$result1 = mysqli_query($conn, $sql);
						$row1 = $result1->fetch_array();
						$picDestination = "images/productImages/" . $row1['pimage'];
					?>
						<div class="col-md-4" style="display:block; margin-bottom:20px;">
							<section style="margin:5px; background-color: white; color: black;box-shadow:3px 3px 4px #c4c4c4;border-radius:10px 10px 0px 0px;">
								<a href="review.php?pid=<?php echo $row1['pid']; ?>"> <img class="image fit" style="width:356px;height:250px;object-fit: cover;" src="<?php echo $picDestination; ?>" alt="" /></a>
								<strong>
									<h1 class="title" style="color:black;"><?php echo $row1['product'] . ''; ?></h1>
								</strong>

								<div style="align:left; line-height:25px;padding-bottom:30px;font-size:18px;">
									<?php echo "Type : " . $row1['pcat'] . ''; ?><br><?php echo "Price : " . $row1['price'] . ' /kg -'; ?><br>

							</section>
						</div>

					<?php endwhile;	?>


				</div>
				<div style="display:flex;flex-direction:row;justify-content:center; ">
					<div class="6u 12u$(large)">
						<a href="buyNowCart.php" class="btn btn-primary" style="text-decoration: none;">Buy Now</a>
					</div>
					<div class="6u 12u$(large)">
						<a href="deleteCart.php" class="btn btn-primary" style="text-decoration: none;">Delete All</a>
					</div>
				</div>

		</section>
		</header>

</section>

</body>

</html>