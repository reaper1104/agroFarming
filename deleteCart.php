<?php

session_start();
require 'db.php';
$id = $_SESSION['id'];


$sql = "call blog($id)";
$retval = mysqli_query($conn,    $sql);
if (!$retval) {
    echo "Deleted data successfully\n";
}
header("Location:myCart.php");
