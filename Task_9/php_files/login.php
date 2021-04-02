<?php
    session_start();
    include 'db.php';
    if(isset($_SESSION['user_type'])){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">

<style>
.login-form {
    margin: 20px;
    width: 400px;
    border: 1px solid;
    border-radius: 25px;
    padding: 30px;
    margin-left: 30%;
    position: relative;
}
.login-form h3 {
    color: #fff;
    margin: 0px auto 20px;
    background: #af1b1b;
    padding: 17px 30px;
    text-align: center;
    font-family: auto;
}
</style>
</head>
<body>

        <div class="container">
            <div class="login-form">
                <form action="login.php" method="post">
                    <h3>LOGIN</h3>
                    <label>Username</label></br>
                    <input type="text" name="username" class="form-control" id="username" required="" />
                    </br>
                    <label>Password</label></br>
                    <input type="password" name="pass" id="pass" class="form-control" required="" />
                    </br>
                    <input type="submit" name="login" class="btn btn-primary" id="submit" value="LOGIN" />
                    </br>
                    <h4><a href="insert_user.php" name="register" class="btn btn-primary" id="register" />REGISTER</a></h4>
                    </br>
                </form>
            </div>
        </div>


<body>
</html>
<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];


        $ob = new Db();
        $result = $ob->userlogin($username,$pass);
        $res = $result->fetch_object();
            if($res->username == $username && $res->pass == $pass){
                $_SESSION['user_id'] = $res->id;
                $_SESSION['user_type'] = $res->user_type;
                $_SESSION['username'] = $res->full_name;

                if($_SESSION['user_type'] == 'ADMIN'){
                    header('location:index.php');
                }if($_SESSION['user_type'] == 'USER'){
                    header('location:user_panel.php');
                }
            }else if(!($res->username == $username && $res->pass == $pass)){
                echo "<script> alert('You entered data does not match with any account in our record')</script>";
                return header('location:login.php');
            }
    }
?>



