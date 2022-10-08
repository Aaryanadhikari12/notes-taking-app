<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App!</title>
</head>
<body>
    
</body>
</html>

<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "notesapp";

$con = mysqli_connect($server, $user, $pass, $db);

if(!$con){
    echo "Connection to the database failed due to ". mysqli_connect_error();
}
else{
    
}
?>