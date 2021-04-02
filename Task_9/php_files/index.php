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
    <title>ADMIN PANEL</title>
    <link rel="stylesheet" href="style.css">

<style>
.navbar a.btn {
    font-size: 20px;
    width: 300px;
    margin-left: 118%;
    padding: 17px;
    margin-bottom: 20px;
}
.navbar ul li{
    list-style: none;
}
</style>
</head>
<body>

        <?php
            $ob = new Db();
            $user = 'USER';
            $result = $ob->view_pending($user);
            $res = $result->fetch_object();
            $sr = 1;

            if($res != ''){
                echo "<script>alert('New SIGNUP Requests!');</script>";
            }
        ?>
        <div class="container">
			<center>
            <h1>ADMIN PANEL</h1><br>
            <div class="navbar nav">
                <ul>
                    <li><a href="manage_user.php" class="btn btn-primary">Manage Users</a></li>
                    <li><a href="insert.php" class="btn btn-primary">Insert</a></li>
                    <li><a href="pending.php" class="btn btn-primary">Signup Requests</a></li>
                    <li><a href="logout.php" class="btn btn-danger">LOGOUT</a></li>
                </ul>
            </div>
			</center>
			<br>
            
        </div>
</body>
</html>