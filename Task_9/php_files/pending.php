<?php 
    session_start();
    include 'db.php';
    if(!(isset($_SESSION['user_type']))){
        header('location:login.php');
    }
    if(!($_SESSION['user_type'] == 'ADMIN')){
        return 0;
    }

    $ob = new Db();
     $user = 'USER';
     $result = $ob->view_pending($user);
     $check = $result->fetch_object();
     $sr = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Requests</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

</head>
<body>

        <div class="container">
			<center>
            <h1>Signup Requests</h1><br>
            <a href="index.php" class="btn btn-primary">Home</a>
            <a href="insert.php" class="btn btn-primary">Insert</a>
			</center>
            <br>
            
            <?php
                 if($check != ''){
                    echo "<script>alert('New SIGNUP Requests!');</script>";
                 }
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr.NO</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                <thead>
                <tbody class="users">
                    <?php
                        while($res = $result->fetch_object()){
                            echo "<tr>
                                        <td>".$sr++."</td>
                                        <td>".$res->full_name."</td>
                                        <td>".$res->username."</td>
                                        <td>".$res->pass."</td>
                                        <td>
                                            <form action='pending.php' method='post'>
                                                <input type='hidden' name='id' value='".$res->id."' />
                                                <button type='submit' name='Approve' value='Approve' class='btn btn-success'>Approve</button>
                                                <button type='submit' name='Delete' value='Delete' class='btn btn-success'>Delete</button>
                                            </form>
                                            <a href='delete.php?id=".$res->id."' class='btn btn-danger'>Delete</a>
                                        </td>
                                </tr>";
                            }
                    ?>
                </tbody>
        </div>
</body>
</html>

<?php

    if(isset($_POST['id'])){
        if(isset($_POST['Approve'])){
            $id = $_POST['id'];
            $approve = $ob->approve($id);
            if($approve){
                header('location:pending.php');
            }
        }else if(isset($_POST['Delete'])){
            $id = $_POST['id'];
            $delete = $ob->delete($id);
            if($delete){
                header('location:pending.php');
            }
        }
    } 
?>
