<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $pincode = $_POST['pincode'];
    $addr = $_POST['addr'];
    $bid = $_SESSION['id'];

    $sql = "SELECT * FROM mycart WHERE bid = '$bid'";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_array()) :
        $pid = $row['pid'];
        // $sql = "SELECT * FROM fproduct WHERE pid = '$pid'";
        // $result1 = mysqli_query($conn, $sql);
        // $row1 = $result1->fetch_array();
        $sql = "INSERT INTO transaction (bid, pid, name, city, mobile, email, pincode, addr)
                    VALUES ('$bid', '$pid', '$name', '$city', '$mobile', '$email', '$pincode', '$addr')";
        $result1 = mysqli_query($conn, $sql);
    endwhile;

    if ($result) {
        $_SESSION['message'] = "Order Succesfully placed! <br /> Thanks for shopping with us!!!";
        header('Location: Login/success.php');
    } else {
        echo $result1->mysqli_error();
        //$_SESSION['message'] = "Sorry!<br />Order was not placed";
        //header('Location: Login/error.php');
    }
}
?>





<!DOCTYPE html>
<html>

<head>
    <title>AgroCulture: Transaction</title>
    <meta lang="eng">
    <meta charset="UTF-8">
    <title>AgroCulture</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap\js\bootstrap.min.js"></script>
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <link rel="stylesheet" href="Blog/commentBox.css" />
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>
</head>

<body>

    <!-- navbar start -->

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




<!-- rest code  -->


<section id="main" class="wrapper">
    <div class="container">
        <center>
            <h2>Transaction Details</h2>
        </center>
        <section id="two" class="wrapper style2 align-center">
            <div class="container">
                <center>
                    <form method="post" action="buyNowCart.php" style="border: 1px solid black; padding: 15px;">
                        <center>
                            <div class="row uniform">
                                <div class="6u 12u$(xsmall)">
                                    <input type="text" name="name" id="name" value="" placeholder="Name" required />
                                </div>
                                <div class="6u 12u$(xsmall)">
                                    <input type="text" name="city" id="city" value="" placeholder="City" required />
                                </div>
                            </div>
                            <div class="row uniform">
                                <div class="6u 12u$(xsmall)">
                                    <input type="text" name="mobile" id="mobile" value="" placeholder="Mobile Number" required />
                                </div>

                                <div class="6u 12u$(xsmall)">
                                    <input type="email" name="email" id="email" value="" placeholder="Email" required />
                                </div>
                            </div>
                            <div class="row uniform">
                                <div class="4u 12u$(xsmall)">
                                    <input type="text" name="pincode" id="pincode" value="" placeholder="Pincode" required />
                                </div>
                                <div class="8u 12u$(xsmall)">
                                    <input type="text" name="addr" id="addr" value="" placeholder="Address" style="width:80%" required />
                                </div>
                            </div>
                            <br />
                            <p>
                                <input type="submit" value="Confirm Order" />
                            </p>
                        </center>
                    </form>
                    </fieldset>