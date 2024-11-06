<?php

session_start();
include 'connect.php';
                                             
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM crud WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $row['email'];

        header('Location: display.php'); 
    } else {
        echo "Invalid email or password";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="login.css" rel="stylesheet">
    <title>login</title>
</head>
<body>
    <div class="container" >
        <form method="post">
        <h3 class="ter">sign in</h3>
        <br> 
        <input type="email" class="form-control" placeholder="enter your email" name="email" autocomplete="off">
        <input type="password" class="form-control" placeholder="enter your password" name="password" autocomplete="off">
   
        <button type="submit" class="btn-btn-primary signin" name="signin">signin</button>
        </form>
    </div>
</body>
</html>