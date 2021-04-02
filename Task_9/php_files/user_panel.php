<?php 
    session_start();
    include 'db.php';
    if(!(isset($_SESSION['user_type']))){
        header('location:login.php');
    }
    if(!($_SESSION['user_type'] == 'USER')){
        return 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Entry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

        <div class="container">
			<center>
            <h1>User Panel</h1><br>
            <a href="user_panel.php" class="btn btn-primary">Home</a>
            <a href="#" class="btn btn-primary">Edit</a>
            <a href="logout.php" class="btn btn-danger">LOGOUT</a>
			</center>
			<br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr.NO</th>
                        <th>User's Name</th>
                        <th>User's Username</th>
                        <th>User's Password</th>
                        <th>Actions</th>
                    </tr>
                <thead>
                <tbody class="customers">
                    <?php
                    $ob = new Db();
                    $id = $_SESSION['user_id'];
                    $result = $ob->user_data($id);
                    $sr = 1;
            
                    while($res = $result->fetch_object()){
                            echo "<tr>
                                        <td>".$sr++."</td>
                                        <td>".$res->full_name."</td>
                                        <td>".$res->username."</td>
                                        <td>".$res->pass."</td>
                                        <td><a href='#' class='btn btn-success'>Edit</a></td>
                                </tr>";
                        }
                    ?>
                </tbody>
        </div>
</body>
</html>

