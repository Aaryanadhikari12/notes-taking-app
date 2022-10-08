<?php
include 'db.php';

if(isset($_POST['done'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

$q = "INSERT INTO notes(title, content) VALUES ('$title','$content')";
$query = mysqli_query($con, $q);

if(!$query){
    echo"
    <script> alert('Data is not added to the database!');</script>
    ";
}
else{
    echo"
    <script> alert('Data is successfully added to the database!');</script>
    ";
}
header('location:index.php');
}



?>