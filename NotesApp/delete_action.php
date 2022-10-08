<?php
include 'db.php';

$id = $_GET['id'];

$q = "DELETE FROM `notes` WHERE id=$id";
$query = mysqli_query($con, $q);
header('location:index.php');


?>