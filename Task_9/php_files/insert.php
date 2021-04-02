<?php 
    session_start();
    include 'db.php';
    if(!(isset($_SESSION['user_type']))){
        header('location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Entry</title>
    <link rel="stylesheet" href="style.css">

    <!--JQUERY AND CSS LINKS FOR SWEET ALERT-->
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>

        <div class="container">
			<center>
            <h1>Insert Users</h1><br>
            <a href="index.php" class="btn btn-primary">Home</a>
            <a href="insert.php" class="btn btn-primary">Insert</a>
			</center>
			<br>
			<div>
				<form action="insert.php" method="post">
					<label>Name </label>
					<input type="text" name="full_name" class="form-control">
                    <label>User Type</label>
                        <select id="user_type" class="form-control" name="user_type" required="">
                            <opiton value="">Choose User Type</option>
                            <option value="USER">USER</option>
                        </select>
					<label>Username</label>
                    <input type="text" name="username" class="form-control" required="">
                    <label>Password</label>
					<input type="text" name="pass" class="form-control">
					<br>
					<input type="submit" value="Insert" name="insert" class="btn btn-success">
				</form>
			</div>
		</div>
</body>
</html>
<?php
if(isset($_POST['insert'])){
        $full_name = $_POST['full_name'];
        $user_type = $_POST['user_type'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $status = 'pending';

        if($user_type == ""){
            echo"Plese choose a category";
            return 0;
        }
        
        $ob = new Db();
        $insert = $ob->insert($full_name,$user_type,$username,$pass,$status);
        if($insert){ 
            echo "<script> alert('Your data has been successfully updated')</script>";
            header('location:index.php');
        }else{
            echo "Error in insertion";
        }
    }
?>