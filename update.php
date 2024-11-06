<?php
session_start();
include 'connect.php';
$id=$_GET['updateid'];
$sql= "select*from `crud`where id=$id";
$result= (mysqli_query($con,$sql));
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$password = $row['password'];
$category = $row['category'];
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $category=$_POST['category'];


    $sql="update`crud`set id='$id',Name='$name',email='$email',password='$password',category='$category'
    where id=$id";
   

    $result=mysqli_query($con,$sql);
    if($result){
        //echo "update successfully";
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}



?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>form operation</title>
</head>

<body>

    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name"autocomplete="off"value=<?php echo $name; ?> >
            </div>

            <div class="form-group">
                <label>email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email"autocomplete="off"value=<?php echo $email; ?>>
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password"autocomplete="off"value=<?php echo $password; ?>>
            </div>
            <div class="form-group">
                <label>category</label>
                <input type="text" class="form-control" placeholder="Enter your email" name="category"autocomplete="off"value=<?php echo $category; ?>>
            </div>
             <button type="submit"  class="btn btn-primary"name="submit">update</button>
        </form>
    </div>

</body>

</html>