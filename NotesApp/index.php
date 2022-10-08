<?php
include 'db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Notes App</title>
    <style>
        body{
            background-color: lightsalmon;
        }
        form , .card{
            width:80%;
            margin-left:10%;
        }
        p{
            padding-left:20px; 
            padding-right:20px;
        }
    </style>
</head>
<body>

  <h1 align="center"><u>Notes Taking App</u></h1>
  <p align="center">This is a dynamic note taking app that is public. Do not provide confidential details in this site since it 
     is directly connected to the database and shows all the information dynamically to all the users.
  </p>
  <form method="post" action="add_data.php">

  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title of your Note</label>
  <input type="text" required class="form-control" id="title" placeholder="My Note..." name="title">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label ">Main Text for your note</label>
  <textarea class="form-control" required id="content" name="content" placeholder="This is my note...." rows="4"></textarea>
</div>
<input type="submit" class="btn btn-success" value="Add note" name="done">

  </form> 
  <hr size="5">
 <!-- Output part of the project -->
 <h1 align="center"><u>Your Notes</u></h1>
 <p align="center">Take a look at your notes. It not only show your notes also the notes of others.
     So, don't share any confidential information here.
 </p>
<?php
$q = "SELECT * FROM notes";
$query = mysqli_query($con, $q);
$num = mysqli_num_rows($query);
 if($num == 0){
     ?>
    <div class="card">
    <h5 class="card-header">Empty!!</h5>
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text">Add your notes to see them downward!</p>
    </div>
  </div>
  <?php
 }


while($result = mysqli_fetch_array($query)){
    ?>
 <div class="card">
  <h5 class="card-header">Notes</h5>
  <div class="card-body">
    <h5 class="card-title"><?php echo $result['title'];  ?></h5>
    <p class="card-text"><?php echo $result['content'];  ?></p>
    <a href="update_action.php?id=<?php echo $result['id']; ?>" class="btn btn-primary">Edit/Update</a>
    <a href="delete_action.php?id=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a>
  </div>
</div>
<?php
}
?>
</body>
</html>
