<?php
session_start();
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>AgroCulture</title>
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

<?php
//	require 'menu.php';






function dataFilter($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<!-- One -->
<section id="main" class="wrapper style1 align-center">
	<div class="container">
		<h2>Welcome to digital market</h2>

		<?php
		if (isset($_GET['n']) and $_GET['n'] == 1) {
		?>
			<h3>Select Filter</h3>
			<form method="GET" action="productMenu.php?">
				<input type="text" value="1" name="n" style="display: none;" />
				<center>
					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-2">
							<div class="select-wrapper" style="width: auto">
								<select name="type" id="type" required style="background-color:white;color: black;">
									<option value="all" style="color: black;">List All</option>
									<option value="fruit" style="color: black;">Fruit</option>
									<option value="vegetable" style="color: black;">Vegetable</option>
									<option value="grain" style="color: black;">Grains</option>
								</select>
							</div>
						</div>
						<div class="col-sm-2">
							<input class="button special" type="submit" value="Go!" />
						</div>
						<div class="col-sm-4"></div>
					</div>
				</center>
			</form>



			<?php if ($_SESSION['Category'] == 1) { ?>



				<?php
				$cat =  $_SESSION['id'];
				?>

				<section id="two" class="wrapper style2 align-center">
					<div class="container">
						<?php
						if (!isset($_GET['type']) or $_GET['type'] == "all") {
							$sql = "SELECT * FROM fproduct WHERE fid = '$cat'";
						}
						if (isset($_GET['type']) and $_GET['type'] == "fruit") {
							$sql = "SELECT * FROM fproduct WHERE pcat = 'Fruit' and fid = '$cat'";
						}
						if (isset($_GET['type']) and $_GET['type'] == "vegetable") {
							$sql = "SELECT * FROM fproduct WHERE pcat = 'Vegetable'and fid = '$cat'";
						}
						if (isset($_GET['type']) and $_GET['type'] == "grain") {
							$sql = "SELECT * FROM fproduct WHERE pcat = 'Grains'and fid = '$cat'";
						}
						$result = mysqli_query($conn, $sql);

						?>
					<?php } else { ?>

						<section id="two" class="wrapper style2 align-center">
							<div class="container">
								<?php
								if (!isset($_GET['type']) or $_GET['type'] == "all") {
									$sql = "SELECT * FROM fproduct WHERE 1";
								}
								if (isset($_GET['type']) and $_GET['type'] == "fruit") {
									$sql = "SELECT * FROM fproduct WHERE pcat = 'Fruit' ";
								}
								if (isset($_GET['type']) and $_GET['type'] == "vegetable") {
									$sql = "SELECT * FROM fproduct WHERE pcat = 'Vegetable'";
								}
								if (isset($_GET['type']) and $_GET['type'] == "grain") {
									$sql = "SELECT * FROM fproduct WHERE pcat = 'Grains'";
								}

								$result = mysqli_query($conn, $sql);
								?>

							<?php } ?>




							<div class="row">
								<?php

								while ($row = $result->fetch_array()) :
									$picDestination = "images/productImages/" . $row['pimage'];
								?>
									<div class="col-md-4" style="display:block; margin-bottom:20px;">
										<section style="margin:5px; background-color: white; color: black;box-shadow: 2px 2px 10px #383838;border-radius:10px 10px 0px 0px;">
											<a href="review.php?pid=<?php echo $row['pid']; ?>"> <img class="image fit" style="width:356px;height:250px;object-fit: cover;" src="<?php echo $picDestination; ?>" height="220px;" /></a>
											<strong>
												<h1 class="title" style="color:black; "><?php echo $row['product'] . ''; ?></h1>
											</strong>

											<div style="align:left; line-height:25px;padding-bottom:30px;font-size:18px;">
												<?php echo "Type : " . $row['pcat'] . ''; ?><br><?php echo "Price : " . $row['price'] . ' /kg -'; ?><br>

										</section>
									</div>

								<?php endwhile;	?>


							</div>

						<?php } else { ?>

							<!-- section 2					 -->




							<h3>Select Filter</h3>
							<form method="GET" action="productMenu.php?">
								<input type="text" value="1" name="n" style="display: none;" />
								<center>
									<div class="row">
										<div class="col-sm-4"></div>
										<div class="col-sm-2">
											<div class="select-wrapper" style="width: auto">
												<select name="type" id="type" required style="background-color:white;color: black;">
													<option value="all" style="color: black;">List All</option>
													<option value="fruit" style="color: black;">Fruit</option>
													<option value="vegetable" style="color: black;">Vegetable</option>
													<option value="grain" style="color: black;">Grains</option>
												</select>
											</div>
										</div>
										<div class="col-sm-2">
											<input class="button special" type="submit" value="Go!" />
										</div>
										<div class="col-sm-4"></div>
									</div>
								</center>
							</form>



							<?php if ($_SESSION['Category'] == 1) { ?>

								<?php
								$cat =  $_SESSION['id'];
								?>

								<section id="two" class="wrapper style2 align-center">
									<div class="container">
										<?php
										if (!isset($_GET['type']) or $_GET['type'] == "all") {
											$sql = "SELECT * FROM fproduct WHERE 1";
										}
										if (isset($_GET['type']) and $_GET['type'] == "fruit") {
											$sql = "SELECT * FROM fproduct WHERE pcat = 'Fruit'";
										}
										if (isset($_GET['type']) and $_GET['type'] == "vegetable") {
											$sql = "SELECT * FROM fproduct WHERE pcat = 'Vegetable'";
										}
										if (isset($_GET['type']) and $_GET['type'] == "grain") {
											$sql = "SELECT * FROM fproduct WHERE pcat = 'Grains'";
										}
										$result = mysqli_query($conn, $sql);

										?>
									<?php } else { ?>

										<section id="two" class="wrapper style2 align-center">
											<div class="container">
												<?php
												if (!isset($_GET['type']) or $_GET['type'] == "all") {
													$sql = "SELECT * FROM fproduct WHERE 1";
												}
												if (isset($_GET['type']) and $_GET['type'] == "fruit") {
													$sql = "SELECT * FROM fproduct WHERE pcat = 'Fruit' ";
												}
												if (isset($_GET['type']) and $_GET['type'] == "vegetable") {
													$sql = "SELECT * FROM fproduct WHERE pcat = 'Vegetable'";
												}
												if (isset($_GET['type']) and $_GET['type'] == "grain") {
													$sql = "SELECT * FROM fproduct WHERE pcat = 'Grains'";
												}

												$result = mysqli_query($conn, $sql);
												?>

											<?php } ?>




											<div class="row">
												<?php

												while ($row = $result->fetch_array()) :
													$picDestination = "images/productImages/" . $row['pimage'];
												?>
													<div class="col-md-4" style="display:block; margin-bottom:20px;">
														<section style="margin:5px; background-color: white; color: black;box-shadow: 2px 2px 10px #383838;border-radius:10px 10px 0px 0px;">
															<a href="review.php?pid=<?php echo $row['pid']; ?>"> <img class="image fit" style="width:356px;height:250px;object-fit: cover;" src="<?php echo $picDestination; ?>" height="220px;" /></a>
															<strong>
																<h1 class="title" style="color:black; "><?php echo $row['product'] . ''; ?></h1>
															</strong>

															<div style="align:left; line-height:25px;padding-bottom:30px;font-size:18px;">
																<?php echo "Type : " . $row['pcat'] . ''; ?><br><?php echo "Price : " . $row['price'] . ' /kg -'; ?><br>

														</section>
													</div>

												<?php endwhile;	?>


											</div>







										<?php } ?>
										</section>
										</header>

								</section>

								</body>

								</html>