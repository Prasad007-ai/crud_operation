<?php

session_start();
include 'connect.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: loginn.php');
    exit;
}
$sql = "SELECT * FROM crud";
$result = mysqli_query($con, $sql);




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <button class="btn btn-primary my-5"> <a href="user.php" class="text-light">Add user</a>
        </button>
        <form method="post" action="loginn.php" >
        <button style="float: right; margin: -87px;"class="btn btn-danger ">
            <a href="logout.php" class="text-light">Logout</a>
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">sl no</th>
                    <th scope="col">Name</th>
                    <th scope="col"> email</th>
                    <th scope="col"> password</th>
                    <th scope="col"> category</th>
                    <th scope="col">operation</th>    
                </tr>
            </thead>
            <tbody>

                <?php

                $sql = "select * from `crud`";
                $result = mysqli_query($con, $sql);

                if ($result) { 
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $password = $row['password'];
                        $category = $row['category'];

                        echo '<tr>
                    <th scope="row">' . $id . '</th>
                    <td>' . $name . '</td>
                    <td>' . $email . '</td>
                    <td>' . $password . '</td>
                    <td>' . $category . '</td>

                    <td>
                    <button class= "btn btn-primary"><a href="update.php?
                    updateid='.$id.'"
                    class="text-light">update</a></button>
                    <button class="btn btn-danger"><a href="delete.php?
                    delete_id='.$id.'"
                    class="text-light">delete</a></button>
                
                    </td>
                </tr>';
                    }
                }


                ?>

</form>


            </tbody>
        </table>
    </div>

</body>

</html>