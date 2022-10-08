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
<?php   
    $id = $_GET['id'];
    $q = "SELECT * FROM notes WHERE id=$id";
    $query = mysqli_query($con, $q);
    $result = mysqli_fetch_array($query);
?>
  <h1 align="center"><u>Update your note</u></h1>
  <p align="center">This is a dynamic note taking app that is public. Do not provide confidential details in this site since it 
     is directly connected to the database and shows all the information dynamically to all the users.
  </p>
  <form method="post">

  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title of your Note</label>
  <input type="text" required class="form-control" id="title" placeholder="My Note..." name="title" value="<?php echo $result['title'];  ?>">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label ">Main Text for your note</label>
  <textarea class="form-control" required id="content" name="content" placeholder="This is my note...." rows="4" ><?php echo $result['content'];  ?></textarea>
</div>
<input type="submit" class="btn btn-success" value="Update Note" name="done">

  </form> 
  <hr size="5">

</body>
</html>
<?php
if(isset($_POST['done'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $q = " UPDATE notes SET id=$id, title='$title', content ='$content' WHERE id = $id ";
    $query = mysqli_query($con, $q);

    if(!$query){
        echo"
<script> alert('Data is not updated!'); </script>
        ";
    }
    else{
        echo"
        <script> alert('Data is updated successfully!'); </script>
                ";
    }
    header('location:index.php');
}


?>
