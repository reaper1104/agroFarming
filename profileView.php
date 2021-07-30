<?php
session_start();

if (!isset($_SESSION['logged_in']) or $_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "You have to Login to view this page!";
    header("Location: Login/error.php");
}
?>

<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>Profile: <?php echo $_SESSION['Username']; ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap\js\bootstrap.min.js"></script>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="login.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-xlarge.css" />

</head>


<body>


    <!-- navbar -->

    <?php
    if (isset($_SESSION['logged_in']) and $_SESSION['logged_in'] == 1) {
        $loginProfile = "My Profile: " . $_SESSION['Username'];
        $logo = "glyphicon glyphicon-user";
        // if($_SESSION['Category']!= 1)
        // {
        $link = "./Login/profile.php";
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




<!-- rest code  -->

<section id="one" class="wrapper style1 align">
    <div class="inner">
        <div class="box">
            <header>
                <center>
                    <span><img src="images/profileImages/profile0.png" class="image-circle" class="img-responsive" height="200%"></span>
                    <br>
                    <h2><?php echo $_SESSION['Name']; ?></h2>
                    <h4 style="color: black;"><?php echo $_SESSION['Username']; ?></h4>
                    <br>
                </center>
            </header>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <b>
                        <font size="+1" color="black">RATINGS : </font>
                    </b>
                    <font size="+1"><?php echo $_SESSION['Rating']; ?></font>
                </div>
                <div class="col-sm-3">
                    <b>
                        <font size="+1" color="black">Email ID : </font>
                    </b>
                    <font size="+1"><?php echo $_SESSION['Email']; ?></font>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <br />
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <b>
                        <font size="+1" color="black">Mobile No : </font>
                    </b>
                    <font size="+1"><?php echo $_SESSION['Mobile']; ?></font>
                </div>
                <div class="col-sm-3">
                    <b>
                        <font size="+1" color="black">ADDRESS : </font>
                    </b>
                    <font size="+1"><?php echo $_SESSION['Addr']; ?></font>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="12u$">
                <?php if ($_SESSION['Category'] == '1') { ?>


                    <center>
                        <div class="row uniform">
                            <!-- <div class="3u 12u$(large)">
                                    <a href="changePassPage.php" class="btn btn-danger" style="text-decoration: none;">Change Password</a>
                                </div> -->
                            <div class="4u 12u$(large)">
                                <a href="profileEdit.php" class="btn btn-danger" style="text-decoration: none;">Edit Profile</a>
                            </div>
                            <div class="4u 12u$(xsmall)">
                                <a href="uploadProduct.php" class="btn btn-danger" style="text-decoration: none;">Upload Product</a>
                            </div>
                            <div class="4u 12u$(large)">
                                <a href="Login/logout.php" class="btn btn-danger" style="text-decoration: none;">LOG OUT</a>
                            </div>
                        </div>
                    </center>
                <?php } else { ?>



                    <div class="6u 12u$(large)">
                        <a href="Login/logout.php" class="btn btn-danger" style="text-decoration: none;">LOG OUT</a>
                    </div>



                <?php } ?>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>



</body>

</html>