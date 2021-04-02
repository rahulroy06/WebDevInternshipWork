<?php 
    session_start();
    include 'db.php';
    if(!(isset($_SESSION['user_type']))){
        header('location:login.php');
    }
    if(!($_SESSION['user_type'] == 'ADMIN')){
        return 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

        <div class="container">
			<center>
            <h1>Users</h1><br>
            <a href="index.php" class="btn btn-primary">Home</a>
            <a href="insert.php" class="btn btn-primary">Insert</a>
			</center>
			<br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr.NO</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                <thead>
                <tbody class="user">
                    <?php
                    $ob = new Db();
                    $user = 'USER';
                    $result = $ob->view_user($user);
                    $sr = 1;

                    while($res = $result->fetch_object()){
                            echo "<tr>
                                        <td>".$sr++."</td>
                                        <td>".$res->full_name."</td>
                                        <td>".$res->username."</td>
                                        <td>".$res->pass."</td>
                                        <td>
                                            <a href='edit.php?id=".$res->id."' class='btn btn-success'>Edit</a>
                                            <a href='delete.php?id=".$res->id."' class='btn btn-danger'>Delete</a>
                                        </td>
                                </tr>";
                        }
                    ?>
                </tbody>
        </div>
</body>
</html>
